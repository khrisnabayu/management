<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ProfileController extends Controller
{
  
    public function updateprofile(Request $request, string $id)
    {
        $user = User::findOrFail($id);
        $user->update($request->all());
  
        return redirect()->route('profile')->with('toast_success', 'Profile updated successfully');
    }

    public function updatephotoprofile(Request $request, string $id)
    {  
        if ($image_path = $request->file('image_path')) {
            $destinationPath = 'image_profile/';
            $profileImage = date('YmdHis') . "." . $image_path->getClientOriginalExtension();
            $image_path->move($destinationPath, $profileImage);
            $input['image_path'] = "$profileImage";

            $user = User::findOrFail($id);
            $user->update($input);
        }else{
            unset($input['image_path']);
        }
  
        return redirect()->route('profile')->with('toast_success', 'Photo updated successfully');
    }
  

}