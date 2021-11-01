<?php

namespace App\Http\Controllers;

use App\Models\Artwork;
use App\Models\ShippingCost;
use Illuminate\Http\Request;

class ShippingCostController extends Controller
{
    public function create(Artwork $artwork)
    {
        return view('artworks.shipping', compact('artwork'));
    }

    public function store(Artwork $artwork, Request $request)
    {
        $attr = $request->all();
        $attr['artwork_id'] = $artwork->id;
        
        ShippingCost::create($attr);
        return redirect(route('artists.artworks'))->with('success', 'berhasil menambahkan karya seni');
    }
}
