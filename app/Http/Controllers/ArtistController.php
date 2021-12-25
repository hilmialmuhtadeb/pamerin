<?php

namespace App\Http\Controllers;

use App\Models\Artwork;
use App\Models\Auction;
use App\Models\Exhibition;
use App\Models\User;
use App\Models\AuctionUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

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
        $exhibitions = Exhibition::where('user_id', Auth::user()->id)->orderBy('created_at', 'DESC')->get();

        return view('users.artists.fair.pengajuan', compact('exhibitions'));
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
        // $artworks = Artwork::where('user_id', Auth::user()->id);
        $auctions = Auction::where('user_id',Auth::user()->id)->get();
        return view('users.artists.sale.lelang', compact( 'auctions'));
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
    
    public function daftar()
    {
        $auctions = Auction::where('user_id',Auth::user()->id)->orderByDesc('created_at')->get();
        return view('users.artists.sale.daftar', compact('auctions'));
    }

       
   public function confirm_lelang(Request $request)
   {
        AuctionUser::where('id', $request->id_auctionUser)->where('auction_id', $request->id_auction)->where('user_id', $request->id_user)->update(['status' => 2]);

       return redirect(route('artists.sale.confirm'))->with('success', 'Pesanan sedang diproses');
   } 

    public function store(Request $request)
    {
        
        $attr = $request->validate([
            'name' => 'required',
            'date' => 'required',
            'start' => 'required',
            'end' => 'required',
            'price' => 'required',
            'description' => 'required',
            'thumbnail' => 'required',
        ]);
        $gambar = $request->thumbnail;
        // menmabhakan gambar ke dalam database 
        $new_gambar = time() . ' - ' . $gambar->getClientOriginalName();

        // menambahkan gambar ke dalam folder lokal di public/buktipembayaran 
        $gambar->move('/',$new_gambar);

        $attr['user_id']=Auth::user()->id;
        $attr['slug'] = Str::slug($request->name);
        $attr['thumbnail'] = $new_gambar;
        Auction::create($attr);
        return redirect(route('artists.sale.lelang'))->with('success', 'Berhasil Menambahkan Karya Lelang');

    }
}
