<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Toothcondition extends Model
{
    use HasFactory;
 
    protected $fillable = [
        'name',
        'description',
        'id_company',
    ];
}
