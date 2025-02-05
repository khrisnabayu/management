<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Featureservice extends Model
{
    use HasFactory;
 
    protected $fillable = [
        'name',
        'description',
        'icon_name',
    ];
}
