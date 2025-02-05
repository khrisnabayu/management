<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Email;

class EmailController extends Controller
{

    public function index()
    {
        $email = Email::orderBy('id', 'DESC')->get();
        return view('emails.index', compact('email'));
    }

    public function destroy(string $id)
    {
        $email = Email::findOrFail($id);
        $email->delete();
        return redirect()->route('emails')->with('toast_success', 'Email deleted successfully');
    }
  
}