<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
 
    protected $fillable = [
        'id_customer',
        'date_registration',
        'email_status',
        'id_company',
    ];
}
