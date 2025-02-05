<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    use HasFactory;
 
    protected $fillable = [
        'voucher',
        'voucher_code',
        'voucher_description',
        'voucher_limit',
        'voucher_status',
        'period_start',
        'period_end',
    ];
}
