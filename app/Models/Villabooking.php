<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Villabooking extends Model
{
    use HasFactory;
 
    protected $fillable = [
        'name',
        'email',
        'phonenumber',
        'villa_type',
        'check_in',
        'check_out',
        'payment_status',
        'check_in_status',
        'check_out_status',
    ];
}
