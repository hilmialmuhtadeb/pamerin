<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function show() {
        return view('auth.login', [
            'user' => 'Pengunjung',
            'link' => 'register'
        ]);
    }

    public function store(Request $request) {
        $attr = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($attr)) {
            if (Auth::user()->type === 3) {
                return redirect(route('home'));
            }
            if (Auth::user()->type === 2) {
                return redirect(route('artists.index'));
            }
            if (Auth::user()->type === 1) {
                return redirect(route('admin.index'));
            }
        }
        
        throw ValidationException::withMessages([
            'password' => 'Email atau password anda salah.',
        ]);
    }
}
