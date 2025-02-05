<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use App\Mail\NotifRegisterAccount;
use App\Models\Companyuser;
use App\Models\About;
use App\Models\Contact;
use App\Models\Socialmedia;
use DB;

class AuthController extends Controller
{
    public function register()
    {
        return view('auth/register');
    }
  
    public function registerSave(Request $request)
    {
        Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed'
        ])->validate();
  
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'level' => 'Admin'
        ]);

        $socialmedia = Socialmedia::orderBy('id', 'ASC')->get();
        $about = About::findOrFail(1);
        $contact = Contact::findOrFail(1);
        $email = $request->email;

        \Mail::to($email)->send(new NotifRegisterAccount($email, $socialmedia, $about, $contact));
  
        return redirect()->route('login')->with('toast_success', 'Account registered successfully');
    }
  
    public function login()
    {
        return view('auth/login');
    }

    public function loginguest()
    {
        return view('auth/loginguest');
    }
  
    public function loginAction(Request $request)
    {
        Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ])->validate();

        $emailLog = $request->input('email');
  
        if (!Auth::attempt($request->only('email', 'password'), $request->boolean('remember'))) {
            throw ValidationException::withMessages([
                'email' => trans('auth.failed')
            ]);
        }
  
        $request->session()->regenerate();
        $active_status = User::where('email', $emailLog)->value('active_status');
        $verified_status = User::where('email', $emailLog)->value('verified_status');
        $role = User::where('email', $emailLog)->value('role');
        $id_company = User::where('email', $emailLog)->value('company_id');
        $active_company = Companyuser::where('id', $id_company)->value('active_status');

        if ($role == 'superuser'){
            return redirect()->route('superusers')->with('toast_success', 'Login successfully');
        } else if ($role == 'executive'){
            return redirect()->route('dashboardexecutives')->with('toast_success', 'Login successfully');
        } else if ($active_company == 1) {
            if ($active_status == 1){
                if ($verified_status == 1 && $role == 'finance') {
                    return redirect()->route('dashboardfinances')->with('toast_success', 'Login successfully');
                } elseif ($verified_status == 1 && $role == 'marketing') {
                    return redirect()->route('dashboardmarketings')->with('toast_success', 'Login successfully');
                } elseif ($verified_status == 1 && $role == 'operation'){
                    return redirect()->route('dashboardoperations')->with('toast_success', 'Login successfully');
                } elseif ($verified_status == 1 && $role == 'admin') {
                    return redirect()->route('dashboardadmins')->with('toast_success', 'Login successfully');
                } else {
                    return redirect()->route('login')->with('toast_info', 'Your account need verified');
                }
    
            } else {
                return redirect()->route('login')->with('toast_info', 'Your account is Inactive');
            }

        } else {
            return redirect()->route('login')->with('toast_info', 'Your company is Inactive');

        }

    }
  
    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
  
        return redirect()->route('login')->with('toast_success', 'Logout successfully');
    }
 
    public function profile()
    {
        $company_id = auth()->user()->company_id;
        $companyuser = Companyuser::findOrFail($company_id);
        $active_status = Companyuser::where('id','=',$company_id)->value('active_status');
        $service_id = Companyuser::where('id','=',$company_id)->value('service_id');

        return view('profile.profile', compact('companyuser','active_status','service_id'));
    }

    public function password()
    {
        $company_id = auth()->user()->company_id;
        $active_status = Companyuser::where('id','=',$company_id)->value('active_status');
        $service_id = Companyuser::where('id','=',$company_id)->value('service_id');
        return view('profile.password',compact('active_status','service_id'));
    }

}