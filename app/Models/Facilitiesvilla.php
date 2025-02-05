<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facilitiesvilla extends Model
{
    use HasFactory;
 
    protected $fillable = [
        'name',
        'description',
        'id_villa',
    ];
}
