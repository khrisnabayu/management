<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Toothcheckup extends Model
{
    use HasFactory;
 
    protected $fillable = [
        'id_invoice',
        'id_service',
        'id_company',
        'tooth_category',
        'generate_status',
        'status',
    ];
}
