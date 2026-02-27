<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
   public function prosesLogin(Request $request){
     $credential = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);
    $remember = $request->has('remember');
    if (auth()->attempt($credential, $remember)) {
        $request->session()->regenerate();
        $user = auth()->user();
        if($user->role === 'admin') {
        return redirect()->route('admin.dashboard');
        }
        if($user->role === 'bendahara') {
        return redirect()->route('bendahara.dashboard');
        }
        if($user->role === 'anggota') {
        return redirect()->route('anggota.dashboard');
        }
    }
    return back()->withError([
        'email' => 'Email atau password salah',
    ])->onlyInput('email');
    
    
   }
   public function logout(Request $request){
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect()->route('login');
   }

}
