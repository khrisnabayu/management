<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Companyuser;
use App\Models\Accountservice;

class CompanyController extends Controller
{
    
    public function edit(string $id)
    {
        $company = Companyuser::findOrFail($id);
        $active_status = Companyuser::where('id','=',$id)->value('active_status');
        $service_id = Companyuser::where('id','=',$id)->value('service_id');
        return view('companies.edit', compact('company', 'active_status','service_id'));
    }
  
    public function update(Request $request, string $id)
    {
        $company = Companyuser::findOrFail($id);
        $company->update($request->all());

        if ($image_path = $request->file('image_path')) {
            $destinationPath = 'image_company/';
            $profileImage = date('YmdHis') . "." . $image_path->getClientOriginalExtension();
            $image_path->move($destinationPath, $profileImage);
            $input['image_path'] = "$profileImage";
            $company->update($input);
        }
  
        return redirect()->route('companydatas.edit',$id)->with('toast_success', 'Company data updated successfully');
    }

}