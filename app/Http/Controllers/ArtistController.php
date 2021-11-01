<?php

namespace App\Http\Controllers;

use App\Models\Artwork;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArtistController extends Controller
{
    public function index()
    {
        return view('users.artists.dashboard');
    }

    public function artwork()
    {
        return view('users.artists.artworks.index', [
            'artist' => Auth::user(),
            'artworks' => Artwork::where('user_id', Auth::user()->id)->get(),
        ]);
    }

    public function sell()
    {
        $artworks = Artwork::where('user_id', Auth::user()->id)->where('price', '!=', null)->get();
        return view('users.artists.artworks.sell', compact('artworks'));
    }
}
