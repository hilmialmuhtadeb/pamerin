<?php

namespace App\Http\Controllers;

use App\Models\Artwork;
use App\Models\Auction;
use App\Models\Exhibition;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function PHPUnit\Framework\returnSelf;

class ArtistController extends Controller
{
    public function index()
    {
        $exhibitions = Exhibition::where('user_id', Auth::user()->id)->count();
        $artworks = Artwork::where('user_id', Auth::user()->id)->count();
        $auctions = Auction::where('user_id', Auth::user()->id)->count();

        return view('users.artists.dashboard', compact('exhibitions', 'artworks', 'auctions'));
    }

    public function artwork()
    {
        return view('users.artists.artworks.index', [
            'artist' => Auth::user(),
            'artworks' => Artwork::where('user_id', Auth::user()->id)->latest()->paginate(10),
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
        $artworks = Artwork::where('user_id', Auth::user()->id);
        return view('users.artists.sale.lelang', compact('artworks'));
    }
    public function porto()
    {
        
        $artworks=Artwork::where('user_id',Auth::user()->id)->get();
        //dd($artworks);
        return view('users.artists.porto',compact('artworks'));
    }
    public function create()
    {
        return view('users.artists.sale.create');
    }
}
