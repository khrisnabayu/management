<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Companyrecord extends Model
{
    use HasFactory;
 
    protected $fillable = [
        'name',
        'record',
        'icon_name',
    ];
}
