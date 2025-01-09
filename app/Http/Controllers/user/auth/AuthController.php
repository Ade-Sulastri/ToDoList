<?php

namespace App\Http\Controllers\user\auth;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    function showRegistration()
    {
        return view('user.auth.registrasi');
    }

    function submitRegistration(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('showLogin');
    }

    // LOGIN
    function showLogin()
    {
        return view('user.auth.login');
    }

    function submitLogin(Request $request)
    {
        $data = $request->only('email', 'password');
        if (Auth::attempt($data)) {
            $request->session()->regenerate();

            return redirect()->route('showTasks');
        } else {
            return redirect()->back()->with('warning', 'Email atau password salah');
        }
    }

    // LOG OUT
    function logout()
    {
        Auth::logout();

        return redirect()->route('showLogin');
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')->user();
        $finduser = User::where('google_id', $user->id)->first();

        if ($finduser) {
            Auth::login($finduser);
        } else {
            $newUser = User::updateOrCreate([
                'email' => $user->email,
            ], [
                'name' => $user->name,
                'google_id' => $user->id,
                'password' => Hash::make(Str::random(8)), 
            ]);

            Auth::login($newUser);
        }

        return redirect()->route('showTasks');
    }
}
