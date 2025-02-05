<?php
  
namespace App\Exports;
  
use App\Models\Supplier;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\DB;
  

class SuppliersRowsExport implements FromCollection, WithHeadings
{
    protected $selectedIds;

    public function __construct($selectedIds)
    {
        $this->selectedIds = $selectedIds;
    }

    public function collection()
    {
        
        return Supplier::select('id','name','description','address','phonenumber')->whereIn('id', $this->selectedIds)->get();
    }

    public function headings(): array
    {
        return ["id", "name", "description", "address", "phonenumber"]; // Replace with actual column names
    }
}