<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function login(LoginRequest $request)
    {
        $user = User::firstWhere('email', $request->email);
        if ($user && Hash::check($request->password, $user->password)) {
            Session::put('user', $user);
            session()->get('user');
            return redirect(url('employees'));
        }
        return redirect()->back()->with(['error' => 'Invalid password!']);
    }

    public function loginPage()
    {
        if (session()->has('user'))
            return redirect(route('employees'));
        return view('login');
    }

    public function logout()
    {
        if (session()->has('user'))
            session()->forget('user');
        return redirect(route('loginPage'));
    }
}
