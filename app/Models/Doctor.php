<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;
 
    protected $fillable = [
        'name',
        'position',
        'description',
        'image_path',
        'twitter',
        'facebook',
        'instagram',
        'linkedin',
    ];
}
