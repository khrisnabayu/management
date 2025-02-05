<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicinestock extends Model
{
    use HasFactory;
 
    protected $fillable = [
        'name',
        'description',
        'stock',
        'price',
        'produced_date',
        'expired_date',
        'id_supplier',
        'id_company',
    ];
}
