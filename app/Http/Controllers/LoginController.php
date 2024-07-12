<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    //
    public function login(Request $request)
    {
        if ($request->isMethod('post')) {

            $validated = $request->validate([
                'email' => 'required',
                'password' => 'required'
            ]);
            if (Auth::attempt($validated)) {
                $request->session()->regenerate();
                return redirect('/')->with('masuk', 'Berhasil Login');
            }
            return back()->with('error', 'akun atau username salah');
        }
        return view('login.login');
    }
    public function register(Request $request)
    {
        if ($request->isMethod('post')) {
            $validated = $request->validate([
                'name' => 'required|max:255|min:6',
                'email' => 'unique:users|required',
                'password' => 'required|min:8|max:255'
            ]);
            $validated['password'] = bcrypt($validated['password']);
            User::create($validated);
            return redirect('/login')->with('datachange', 'Akun telah dibuat');
        }
        return view('login.register');
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
