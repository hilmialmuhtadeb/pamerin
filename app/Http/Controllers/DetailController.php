<?php

namespace App\Http\Controllers;

use App\Models\Artwork;
use App\Models\Detail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DetailController extends Controller
{
    public function store()
    {
        $artwork = Artwork::where('id', request('artwork_id'))->first();
        Detail::create([
            'cart_id' => Auth::user()->cart->id,
            'artwork_id' => request('artwork_id'),
            'price' => $artwork->price,
        ]);

        return redirect(route('artworks.index'))->with('success', 'Yeay, karya seni berhasil dimasukkan keranjang');
    }

    public function destroy()
    {
        dd('destroyed');
    }
}
