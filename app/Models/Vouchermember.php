<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vouchermember extends Model
{
    use HasFactory;
 
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phonenumber',
        'livinginfo',
        'id_voucher',
        'status_claim',
        'desc_voucher',
        'period_start',
        'period_end',
    ];
}
