<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Supplier;
use App\Models\Medicinestock;
use App\Models\Companyuser;
use App\Models\Exportdata;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\SuppliersExport;
use App\Exports\SuppliersRowsExport;
use Illuminate\Support\Facades\Storage;
use PDF;

class SupplierController extends Controller
{

    public function index()
    {
        $company_id = auth()->user()->company_id;
        $supplier = Supplier::orderBy('created_at', 'DESC')->where('id_company','=',$company_id)->get();
        $active_status = Companyuser::where('id','=',$company_id)->value('active_status');
        $service_id = Companyuser::where('id','=',$company_id)->value('service_id');
        $medicinestock = Medicinestock::orderBy('id', 'ASC')->where('id_company','=',$company_id)->get();
        $id_medicinefilter = 0;

      
        $start_date = Carbon::now()->toDateString();
        $end_date = Carbon::now()->toDateString();

        $summary = Supplier::select(DB::raw("SUM(price) as income"))->where('suppliers.id_company','=',$company_id)->value('income');
        $files = Storage::disk('public')->files('exports');

        $exportdata = Exportdata::orderBy('id', 'ASC')->where('id_company','=',$company_id)->get();
        $lastThreeExportData = Exportdata::orderBy('id', 'DESC')->where('id_company','=',$company_id)->limit(3)->get();

        return view('suppliers.index', compact('supplier','medicinestock','active_status','service_id','summary','start_date','end_date','id_medicinefilter','files','exportdata','lastThreeExportData'));
    }

    public function filter(Request $request){

        $start_date = $request->start_date;
        $end_date = $request->end_date;
        $id_medicine = $request->id_medicinestock;

        
        if($id_medicine == 0){
            $id_medicinestocks = Supplier::pluck('id')->toArray();
            $id_medicinefilter = 0;

        }else{
            $id_medicinestocks = [$id_medicine];
            $id_medicinefilter = $id_medicine;
            

        }

        $company_id = auth()->user()->company_id;
        $active_status = Companyuser::where('id','=',$company_id)->value('active_status');
        $service_id = Companyuser::where('id','=',$company_id)->value('service_id');
        $medicinestock = Medicinestock::orderBy('id', 'ASC')->where('id_company','=',$company_id)->get();
        $exportdata = Exportdata::orderBy('id', 'ASC')->where('id_company','=',$company_id)->get();

        $supplier = Supplier::whereDate('date_registration','>=',$start_date)->whereDate('date_registration','<=',$end_date)->whereIn('id_medicinestock',$id_medicinestocks)->where('id_company','=',$company_id)->get();
        $summary = Supplier::select(DB::raw("SUM(price) as income"))->whereDate('date_registration','>=',$start_date)->whereDate('date_registration','<=',$end_date)->whereIn('id_medicinestock',$id_medicinestocks)->where('suppliers.id_company','=',$company_id)->value('income');

        $files = Storage::disk('public')->files('exports');
        $exportdata = Exportdata::orderBy('id', 'ASC')->where('id_company','=',$company_id)->get();
        $lastThreeExportData = Exportdata::orderBy('id', 'DESC')->where('id_company','=',$company_id)->limit(3)->get();
        

        return view('suppliers.index',compact('supplier','medicinestock','active_status','service_id','summary','start_date','end_date','id_medicinefilter','files','exportdata','lastThreeExportData'));
    }

    public function exportexcel(){

        $company_id = auth()->user()->company_id;
        $fileName = 'supplier_export_' . now()->format('Y-m-d_H-i-s') . '.xlsx';
        $filePath = 'exports/' . $fileName;

        Excel::store(new SuppliersExport, $filePath, 'public');
        $dataexport = [
            ['path' => $fileName ,'date_time' => now()->format('Y-m-d_H-i-s'), 'id_company' => $company_id],
        ];

        Exportdata::insert($dataexport);
        // return Excel::download(new SuppliersExport,$fileName);

        return Excel::download(new SuppliersExport,$fileName); // Send the file to the browser
    }

    public function exportSelectedRows(Request $request){

        $company_id = auth()->user()->company_id;
        $fileName = 'supplier_export_' . now()->format('Y-m-d_H-i-s') . '.xlsx';
        $filePath = 'exports/' . $fileName;

        $data = $request->validate([
            'markId' => 'required|string|min:1',
        ]);

        $data = $request->input('markId');
        $dataselected = explode(',', str_replace(' ', '', $data)); 

        Excel::store(new SuppliersRowsExport($dataselected), $filePath, 'public');
        $dataexport = [
            ['path' => $fileName ,'date_time' => now()->format('Y-m-d_H-i-s'), 'id_company' => $company_id],
        ];
        
        Exportdata::insert($dataexport);
        return Excel::download(new SuppliersRowsExport($dataselected),$fileName);
    }

    // Show Print Page
    public function printExcel()
    {
        $suppliers = (new SuppliersExport)->collection(); // Fetch data
        return view('suppliers.print', compact('suppliers'));
    }


    public function generatePDF()

    {
        $company_id = auth()->user()->company_id;
        $suppliers = Supplier::orderBy('created_at', 'DESC')->where('id_company','=',$company_id)->get();

        $users = User::get();
        $data = [

            'title' => 'Welcome to ItSolutionStuff.com',
            'date' => date('m/d/Y'),
            'users' => $users
        ]; 

        
        // $pdf = PDF::loadView('suppliers.myPDF', $data);
        // return $pdf->download('itsolutionstuff.pdf');

        $pdf = Pdf::loadView('suppliers.myPDF', $data);

        // Preview the PDF in the browser and allow download
        return $pdf->stream('itsolutionstuff.pdf');

    }

    public function create()
    {
        $company_id = auth()->user()->company_id;
        $active_status = Companyuser::where('id','=',$company_id)->value('active_status');
        $service_id = Companyuser::where('id','=',$company_id)->value('service_id');
        return view('suppliers.create',compact('active_status','service_id'));
    }
  
    public function store(Request $request)
    {
        Supplier::create($request->all());
        return redirect()->route('suppliers')->with('toast_success', 'Supplier added successfully');
    }
  
    public function show(string $id)
    {
        $supplier = supplier::findOrFail($id);
        return view('suppliers.show', compact('supplier'));
    }
  
    public function edit(string $id)
    {
        $supplier = Supplier::findOrFail($id);
        $company_id = auth()->user()->company_id;
        $active_status = Companyuser::where('id','=',$company_id)->value('active_status');
        $service_id = Companyuser::where('id','=',$company_id)->value('service_id');
        return view('suppliers.edit', compact('supplier','active_status','service_id'));
    }
  
    public function update(Request $request, string $id)
    {
        $supplier = Supplier::findOrFail($id);
        $supplier->update($request->all());
  
        return redirect()->route('suppliers')->with('toast_success', 'Supplier updated successfully');
    }
  
    public function destroy(string $id)
    {
        $supplier = Supplier::findOrFail($id);
        $supplier->delete();
  
        return redirect()->route('suppliers')->with('toast_success', 'Supplier deleted successfully');
    }
}