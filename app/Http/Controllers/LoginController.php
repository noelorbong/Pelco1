<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function authenticate(Request $request)
    {
        if (Auth::attempt(['applicant_mobile_no' => $request->applicant_mobile_no, 'password' => $request->password])) {
            // Authentication passed...
            return redirect()->intended('dashboard');
        }
    }
}
