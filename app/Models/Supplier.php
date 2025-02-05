<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;
 
    protected $fillable = [
        'name',
        'description',
        'address',
        'phonenumber',
        'date_registration',
        'price',
        'id_company',
        'id_medicinestock',
    ];
}
