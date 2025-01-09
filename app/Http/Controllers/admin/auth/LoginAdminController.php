<?php

namespace App\Http\Controllers\admin\auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginAdminController extends Controller
{
    function login()
    {
        return view('admin.auth.login');
    }

    function submit(Request $request)
    {
        $credential = $request->only('email', 'password');
        // dd($data);
        if (Auth::guard('admin')->attempt($credential)) {
            return redirect()->route('showDashboard');
        } else {
            return redirect()->back()->with('warning', 'Email atau Password salah');
        }
    }

    function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }
}
