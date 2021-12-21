<?php

namespace App\Http\Controllers;

use App\Models\Artwork;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function PHPUnit\Framework\returnSelf;

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
    public function accept()
    {
        return view('users.artists.artworks.accept');
    }
    public function send()
    {
        return view('users.artists.artworks.send');
    }
    public function finish()
    {
        return view('users.artists.artworks.finish');
    }
    public function pengajuan()
    {
        return view('users.artists.fair.pengajuan');
    }
    public function selesai()
    {
        return view('users.artists.fair.selesai');
    }
    public function berlangsung()
    {
        return view('users.artists.fair.berlangsung');
    }
    public function publikasi()
    {
        return view('users.artists.fair.publikasi');
    }
    public function done()
    {
        return view('users.artists.sale.done');
    }
    public function kirim()
    {
        return view('users.artists.sale.kirim');
    }
    public function terima()
    {
        return view('users.artists.sale.terima');
    }
    public function lelang()
    {
        return view('users.artists.sale.lelang');
    }
    public function porto()
    {
        
        $artworks=Artwork::where('user_id',Auth::user()->id)->get();
        //dd($artworks);
        return view('users.artists.porto',compact('artworks'));
    }
}
