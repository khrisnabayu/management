<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galleriesvilla extends Model
{
    use HasFactory;
 
    protected $fillable = [
        'image_path',
        'id_taggallery',
        'id_villa',
        
    ];
}
