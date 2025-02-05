<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exportdata extends Model
{
    use HasFactory;
 
    protected $fillable = [
        'path',
        'date_time',
    ];
}
