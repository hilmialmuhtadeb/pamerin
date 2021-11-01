<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArtistLoginController extends Controller
{
    public function show() {
        return view('auth.login', [
            'user' => 'Seniman',
            'link' => 'artists.register'
        ]);
    }
}
