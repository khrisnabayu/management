<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;
use App\Models\Medicinestock;
use App\Models\Companyuser;

class MedicinestockController extends Controller
{

    public function index()
    {
        $company_id = auth()->user()->company_id;
        $medicinestock = Medicinestock::orderBy('id', 'ASC')->where('id_company','=',$company_id)->get();
        $supplier = Supplier::orderBy('id', 'ASC')->where('id_company','=',$company_id)->get();
        $active_status = Companyuser::where('id','=',$company_id)->value('active_status');
        $service_id = Companyuser::where('id','=',$company_id)->value('service_id');
        return view('medicinestocks.index', compact('medicinestock','supplier','active_status','service_id'));
    }
  
    public function create()
    {
        $company_id = auth()->user()->company_id;
        $supplier = Supplier::orderBy('id', 'ASC')->where('id_company','=',$company_id)->get();
        $active_status = Companyuser::where('id','=',$company_id)->value('active_status');
        $service_id = Companyuser::where('id','=',$company_id)->value('service_id');
        return view('medicinestocks.create', compact('supplier','active_status','service_id'));
    }
  
    public function store(Request $request)
    {
        Medicinestock::create($request->all());
        return redirect()->route('medicinestocks')->with('toast_success', 'Medicine stock added successfully');
    }
  
    public function show(string $id)
    {
        $medicinestock = Medicinestock::findOrFail($id);
        return view('medicinestocks.show', compact('medicinestock'));
    }
  
    public function edit(string $id)
    {
        $company_id = auth()->user()->company_id;
        $medicinestock = Medicinestock::findOrFail($id);
        $supplier = Supplier::orderBy('id', 'ASC')->where('id_company','=',$company_id)->get();
        $active_status = Companyuser::where('id','=',$company_id)->value('active_status');
        $service_id = Companyuser::where('id','=',$company_id)->value('service_id');
        return view('medicinestocks.edit', compact('medicinestock','supplier','active_status','service_id'));
    }
  
    public function update(Request $request, string $id)
    {
        $medicinestock = Medicinestock::findOrFail($id);
        $medicinestock->update($request->all());
  
        return redirect()->route('medicinestocks')->with('toast_success', 'Medicine stock updated successfully');
    }
  
    public function destroy(string $id)
    {
        $medicinestock = Medicinestock::findOrFail($id);
        $medicinestock->delete();
  
        return redirect()->route('medicinestocks')->with('toast_success', 'Medicine stock deleted successfully');
    }
}