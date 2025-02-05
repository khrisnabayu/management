<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Companyuser extends Model
{
    use HasFactory;
 
    protected $fillable = [
        'name',
        'address',
        'email',
        'phonenumber',
        'owner',
        'service_id',
        'image_path',
        'active_status',
        'emailnotifysubs_status',
        'facebook_link',
        'instagram_link',
        'start_date',
        'end_date',
    ];

    public function users(){
        return $this->belongsToMany(User::class,'company_id');
    }
}
