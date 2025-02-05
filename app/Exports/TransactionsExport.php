<?php
  
namespace App\Exports;
  
use App\Models\Customer;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;
  
class TransactionsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $company_id = auth()->user()->company_id;
        $a = DB::table("toothcheckups")->select('invoices.date_registration','toothcheckups.status as status','customers.name as customer','customers.phonenumber as phonenumber','customers.address as address','toothcheckups.quantity as quantity','toothservices.name as service','toothservices.price')->leftjoin('invoices', 'invoices.id', '=', 'toothcheckups.id_invoice')->leftjoin('toothservices', 'toothservices.id', '=', 'toothcheckups.id_service')->leftjoin('customers', 'invoices.id_customer', '=', 'customers.id')->where('toothcheckups.id_company','=',$company_id)->get();
        $b = DB::table("medicinecheckups")->select('invoices.date_registration','medicinecheckups.status as status','customers.name as customer','customers.phonenumber','customers.address','medicinecheckups.quantity as quantity','medicinestocks.name as service','medicinestocks.price')->leftjoin('invoices', 'invoices.id', '=', 'medicinecheckups.id_invoice')->leftjoin('medicinestocks', 'medicinestocks.id', '=', 'medicinecheckups.id_medicine')->leftjoin('customers', 'invoices.id_customer', '=', 'customers.id')->where('medicinecheckups.id_company','=',$company_id)->get();
        $c = DB::table("purchasetools")->select('purchasetools.date_registration','purchasetools.status as status','suppliers.name as customer','suppliers.phonenumber','suppliers.address','purchasetools.quantity as quantity','purchasetools.name as service','purchasetools.price')->leftjoin('suppliers', 'suppliers.id', '=', 'purchasetools.id_supplier')->where('purchasetools.id_company','=',$company_id)->get();
        $transaction = $a->merge($b)->merge($c);
        return $transaction;
    }
}