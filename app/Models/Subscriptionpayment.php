<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscriptionpayment extends Model
{
    use HasFactory;
 
    protected $fillable = [
        'id_company',
        'notify_date',
        'payment_date',
        'attachment',
        'status',
    ];
}
