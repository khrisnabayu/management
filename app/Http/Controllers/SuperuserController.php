<?php

namespace App\Http\Controllers;
use App\Mail\NotifVerifiedAccount;
use App\Mail\NotifInactiveAccount;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Userrole;
use App\Models\Companyuser;
use App\Models\Socialmedia;
use App\Models\About;
use App\Models\Contact;

class SuperuserController extends Controller
{

    public function index()
    {
        $company_id = auth()->user()->company_id;
        $active_status = Companyuser::where('id','=',$company_id)->value('active_status');
        $service_id = Companyuser::where('id','=',$company_id)->value('service_id');

        $user = User::orderBy('created_at', 'DESC')->where('id','!=',14)->get();
        $companyuser = Companyuser::orderBy('id', 'ASC')->get();
        $userrole = Userrole::orderBy('id', 'ASC')->get();
        return view('superusers.index', compact('user','companyuser',"active_status","service_id","userrole"));
    }
  
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        $userrole = Userrole::orderBy('id', 'ASC')->get();
        $companyuser = Companyuser::orderBy('id', 'ASC')->get();
        return view('superusers.edit', compact('user','userrole','companyuser'));
    }
  
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);
        $user->update($request->all());

        $socialmedia = Socialmedia::orderBy('id', 'ASC')->get();
        $about = About::findOrFail(1);
        $contact = Contact::findOrFail(1);
        $email = $request->input('email');

        if ( $request->input('verified_status') == 1  ) {
            \Mail::to($email)->send(new NotifVerifiedAccount($email, $socialmedia, $about, $contact));
            return redirect()->route('superusers')->with('toast_success', 'Verified User info updated successfully');
        } elseif ( $request->input('verified_status') == 0 ) {
            \Mail::to($email)->send(new NotifInactiveAccount($email, $socialmedia, $about, $contact));
            return redirect()->route('superusers')->with('toast_success', 'Inactive User info updated successfully');
        } else {
            return redirect()->route('superusers')->with('toast_success', 'User info updated successfully');
        }

    }

}