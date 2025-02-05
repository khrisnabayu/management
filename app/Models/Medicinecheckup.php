<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicinecheckup extends Model
{
    use HasFactory;
 
    protected $fillable = [
        'id_invoice',
        'id_company',
        'id_service',
        'id_medicine',
        'status',
        'quantity',
    ];
}
