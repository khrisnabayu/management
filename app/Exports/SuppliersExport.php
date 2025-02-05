<?php
  
namespace App\Exports;
  
use App\Models\Customer;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\DB;
  
class SuppliersExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $company_id = auth()->user()->company_id;
        $supplier = DB::table("suppliers")->select('id','name','description','address','phonenumber')->where('suppliers.id_company','=',$company_id)->get();
        return $supplier;
    }
    public function headings(): array
    {
        return [
            'id',
            'name',
            'description',
            'address',
            'phonenumber',
        ];
    }
}