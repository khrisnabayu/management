<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Companyuser;
use App\Models\Subscriptionpayment;
use App\Models\Accountservice;
use App\Models\Socialmedia;
use App\Models\About;
use App\Models\Contact;
use App\Mail\NotifPaySubscription;
use Carbon\Carbon;

class CompanyuserController extends Controller
{

    public function index()
    {
        $companyuser = Companyuser::orderBy('id', 'ASC')->get();
        // $accountservice = Accountservice::orderBy('id', 'ASC')->get();
        
        return view('companyusers.index', compact('companyuser'));
    }
  
    public function create()
    {
        return view('companyusers.create');
    }
  
    public function store(Request $request)
    {
        $input = $request->all();
        if ($image = $request->file('image_path')) {
            $destinationPath = 'image_company/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image_path'] = "$profileImage";
        }
    
        Companyuser::create($input);
        return redirect()->route('companyusers')->with('toast_success','Company user added successfully.');

    }
  
    public function show(string $id)
    {
        $companyuser = Companyuser::findOrFail($id);
        return view('companyusers.show', compact('companyuser'));
    }
  
    public function edit(string $id)
    {
        $companyuser = Companyuser::findOrFail($id);
        return view('companyusers.edit', compact('companyuser'));
    }
  
    public function update(Request $request, string $id)
    {
        $companyuser = Companyuser::findOrFail($id);
        $companyuser->update($request->all());

        if ($image_path = $request->file('image_path')) {
            $destinationPath = 'image_company/';
            $profileImage = date('YmdHis') . "." . $image_path->getClientOriginalExtension();
            $image_path->move($destinationPath, $profileImage);
            $input['image_path'] = "$profileImage";
            $companyuser->update($input);
        }
  
        return redirect()->route('companyusers')->with('toast_success', 'Company user updated successfully');
    }
  
    public function destroy(string $id)
    {
        $companyuser = Companyuser::findOrFail($id);
        $companyuser->delete();
  
        return redirect()->route('companyusers')->with('toast_success', 'Company user deleted successfully');
    }

    public function notifysubscription(string $id)
    {
        $companyuser = Companyuser::findOrFail($id);
        $emailadmin = Contact::where('id', 1)->value('email');
        $email = Companyuser::where('id', $id)->value('email');
        $service_id = Companyuser::where('id', $id)->value('service_id');
        $price = Accountservice::where('id', $service_id)->value('price');
        $service = Accountservice::where('id', $service_id)->value('name');

        $data = [
            'emailadmin' => $emailadmin,
            'email' => $email,
            'service' => $service,
            'price' => $price,
        ];

        $now = new DateTime();
        $curentTime = $now;
        $input = [
            'id_company' => $id,
            'notify_date' =>$curentTime,
        ];

        Subscriptionpayment::create($input);

        $socialmedia = Socialmedia::orderBy('id', 'ASC')->get();
        $about = About::findOrFail(1);
        $contact = Contact::findOrFail(1);

        $companyuser->update(['emailnotifysubs_status'=>1]);

        \Mail::to($email)->send(new NotifPaySubscription($data, $socialmedia, $about, $contact));
        
        return redirect()->route('companyusers')->with('toast_success', 'Email notify paying subcription sended');
    }
}