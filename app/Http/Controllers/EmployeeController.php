<?php

namespace App\Http\Controllers;
use App\Mail\NotifVerifiedAccount;
use App\Mail\NotifInactiveAccount;
use App\Mail\NotifActiveAccount;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Userrole;
use App\Models\Companyuser;

use App\Models\Socialmedia;
use App\Models\About;
use App\Models\Contact;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{

    public function index()
    {
        $company_id = auth()->user()->company_id;
        $employee = User::orderBy('created_at', 'DESC')->where('company_id','=',$company_id)->get();
        $companyuser = Companyuser::orderBy('id', 'ASC')->get();
        $active_status = Companyuser::where('id','=',$company_id)->value('active_status');
        $service_id = Companyuser::where('id','=',$company_id)->value('service_id');
        return view('employees.index', compact('employee','active_status','service_id'));
    }
  
    public function edit(string $id)
    {
        $employee = User::findOrFail($id);
        $company_id = auth()->user()->company_id;
        $companyuser = Companyuser::findOrFail($company_id);
        $userrole = Userrole::orderBy('id', 'ASC')->get();
        $active_status = Companyuser::where('id','=',$company_id)->value('active_status');
        $service_id = Companyuser::where('id','=',$company_id)->value('service_id');

        return view('employees.edit', compact('employee','companyuser','userrole','active_status','service_id'));
    }
  
    public function update(Request $request, string $id)
    {
        $company_id = auth()->user()->company_id;
        $employee = User::findOrFail($id);
        $employee->update($request->all());

        $email = DB::table('users')->where('id', $id)->value('email');
        $active_status = DB::table('users')->where('id', $id)->value('active_status');

        $companyuser = Companyuser::findOrFail($company_id);

        if ($active_status == 0){
            \Mail::to($email)->send(new NotifInactiveAccount($email, $companyuser));
        } else if ($active_status == 1) {
            \Mail::to($email)->send(new NotifActiveAccount($email, $companyuser));
        }

        // $socialmedia = Socialmedia::orderBy('id', 'ASC')->get();
        // $about = About::findOrFail(1);
        // $contact = Contact::findOrFail(1);

        return redirect()->route('employees')->with('toast_success', 'Employee info updated successfully');


    }

    public function create()
    {
        $company_id = auth()->user()->company_id;
        $active_status = Companyuser::where('id','=',$company_id)->value('active_status');
        $service_id = Companyuser::where('id','=',$company_id)->value('service_id');
        return view('employees.registeremployee', compact('active_status','service_id'));
    }

    public function registeremployee(Request $request)
    {
        $company_id = auth()->user()->company_id;

        Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed'
        ])->validate();
  
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'verified_status' => '1',
            'company_id' => $company_id,
        ]);

        return redirect()->route('employees')->with('toast_success', 'Account registered successfully');
    }

}