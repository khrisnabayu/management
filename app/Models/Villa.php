<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Villa extends Model
{
    use HasFactory;
 
    protected $fillable = [
        'name',
        'description',
        'price',
        'location',
        'rate',
        'image_path',
    ];
}
