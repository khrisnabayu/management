<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Companyuser;
use App\Mail\NotifForgotPassword;
  
use DB; 
use Carbon\Carbon; 
use Mail; 
use Hash;
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller
{

    public function showForgetPasswordForm()
    {
        return view('ForgotPasswords.index');
    }

    public function submitForgetPasswordForm(Request $request)
    {
        $email = $request->input('email');
        $companyuser = Companyuser::findOrFail(1);

        if (User::where('email', '=', $email)->exists()) {
            $data = [
                'email_name' => $email,
            ];

            $token = Str::random(64);
            DB::table('password_reset_tokens')->insert([
                'email' => $request->email, 
                'token' => $token, 
                'created_at' => Carbon::now()
            ]);
            $data = $token;

            \Mail::to($email)->send(new NotifForgotPassword($data, $email, $companyuser));
            return redirect()->route('login')->with('toast_success', 'Reset password send to email');
        } else {
            return redirect()->route('forgotpassword')->with('toast_error', 'Email is not matched');

        }

    }

    public function showResetPasswordForm($token) { 
        return view('ForgotPasswords.resetpassword', ['token' => $token]);
    }

    public function submitResetPasswordForm(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
        ]);

        $updatePassword = DB::table('password_reset_tokens')
                            ->where([
                              'email' => $request->email, 
                              'token' => $request->token
                            ])
                            ->first();

        if(!$updatePassword){
            return back()->withInput()->with('error', 'Invalid token!');
        }

        $user = User::where('email', $request->email)
                    ->update(['password' => Hash::make($request->password)]);

        DB::table('password_reset_tokens')->where(['email'=> $request->email])->delete();

        return redirect('login')->with('toast_success', 'Password updated successfully');
    } 
}