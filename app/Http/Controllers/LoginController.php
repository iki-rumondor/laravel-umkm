<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException as Valid;

class LoginController extends Controller
{
    public function index()
    {
        $kategori = Category::all()->take(5);
        $app = Setting::all()->first();
        return view('auth.index',compact('kategori','app'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credential = $request->only('email','password');

        if(Auth::attempt($credential))
        {
            $user = Auth::user();
            if ($user->status === 'inactive') {
                throw Valid::withMessages(['message' => 'Maaf, akun Anda tidak aktif.']);
            }
            $request->session()->regenerate();
            return redirect()->route('dashboard');
        }
        throw Valid::withMessages(['message' => 'Maaf Email Dan Password Anda Tidak Terdaftar']);

    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success','Berhasil Logout');
    }


}
