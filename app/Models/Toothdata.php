<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Toothdata extends Model
{
    use HasFactory;
 
    protected $fillable = [
        'id_toothcondition',
        'tooth_sequence',
        'tooth_part',
        'id_toothcheckup',
        'id_company',
    ];
}
