<?php

namespace App\Http\Controllers;


use App\Http\Requests\RegistrationRequest;
use App\Models\Address;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class ArtistRegistrationController extends Controller
{
    public function create() {
        return view('auth.artist-registration');
    }

    public function store(RegistrationRequest $request)
    {
        if ($request->password !== $request->repassword) {
            throw ValidationException::withMessages([
                'repassword' => 'Password yang Anda masukkan tidak sama.',
            ]);
        }

        $attr = $request->all();
        $attr['password'] = Hash::make($request->password);

        $user = User::create($attr);
        Auth::login($user);

        Address::create(['user_id' => Auth::user()->id]);

        return redirect(route('artists.bank'));
    }
}
