<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\About;
use App\Models\Contact;
use App\Models\Email;
use App\Models\Villa;
use App\Models\Facilitiesvilla;
use App\Models\Accountservice;
use App\Models\Service;
use App\Models\Pricing;
use App\Models\Question;
use App\Models\Blog;
use App\Models\Comment;
use App\Models\Socialmedia;
use App\Models\Testimonial;
use App\Models\Categoriesblog;
use App\Models\Villabooking;
use App\Models\infosubscription;
use App\Models\Termcondition;
use App\Models\Gallery;
use App\Models\Categoriestag;
use App\Models\Galleriesvilla;
use App\Models\Featureservice;
use App\Models\Companyrecord;
use App\Models\Doctor;
use App\Models\Why;

use App\Mail\NotifEmailProfileCompany;
use App\Mail\NotifCommentBlog;
use App\Mail\NotifInfoSubscription;
use App\Mail\NotifBookingReservation;

class ProfilecompanyController extends Controller
{

    public function index()
    {
        
        return view('profilecompany.index');
    }





}