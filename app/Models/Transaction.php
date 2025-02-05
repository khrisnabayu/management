<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
 
    protected $fillable = [
        'customer',
        'service',
        'price',
        'id_company',
        'date_registration',
    ];
}
