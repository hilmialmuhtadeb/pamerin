<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use Illuminate\Auth\Events\Validated;
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
    public function forget(user $user)
    {

        return view('auth.forget');
    }
    public function ubah($id)
    {
        return view('auth.ganti', compact('id'));
    }
    public function ganti(Request $request)
    {
        $request->validate([
            'name' =>['required'],
            'email' => ['required', 'email'],
            'phone' => ['required'],
        ]);
        
        $user = User::where('email', $request->email)
        ->where('name', $request->name)
        ->where('phone', $request->phone)
        ->first();
        if($user)
        {
            return redirect()->route('ubah', $user->id);
        }else{
            return redirect()->route('forget')->with('error', 'Name, Email atau No.Handphone anda salah.');
        }
    }

    public function lali(Request $request)
    {
        $request->validate([
            'password' => ['required'],
            'password_confirm' => ['required']
        ]);

        $user = User::where('id', $request->id)->first();
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect()->route('login')->with('success', 'Password berhasil diubah.');
    }
}

