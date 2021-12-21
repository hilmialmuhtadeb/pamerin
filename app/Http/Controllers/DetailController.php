<?php

namespace App\Http\Controllers;

use App\Models\Detail;
use App\Models\Cart;
use App\Models\Artwork;
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

        # cart
        $check_cartId = Auth::user()->cart->id;
        $details = Detail::where('cart_id', $check_cartId)->get();
        
        $subtotal = 0;
        for ($item=0; $item < count($details); $item++) {
            $subtotal += (float)$details[$item]->price;
        }
        
        $unique = random_int(590, 599);
        $summary = $subtotal + (float)$unique;
        
        
        Cart::where('id', $check_cartId)
            ->update([
                'subtotal' => $subtotal,
                'unique_number' => $unique,
                'summary' => $summary,
                'status' => 1,
            ]);

        
        return redirect(route('artworks.index'))->with('success', 'Yeay, karya seni berhasil dimasukkan keranjang');
    }
    
    public function destroy(Detail $detail)
    {
        # 1. cari cart_id pada db_detail
        $check_cartId = $detail->cart_id;
        
        # 2. hapus detail pada db dengan cart_id yang sudah ditentukan pada route
        $detail->delete();
        
        # 3. ambil data cart_id yang masih ada
        $details = Detail::where('cart_id', $check_cartId)->get();

        # 4. looping data yang masih ada
        $subtotal = 0;
        for ($item=0; $item < count($details); $item++) {
            $subtotal += (float)$details[$item]->price;
        }

        #5. update data pada cart setelah dilakukan looping
        # 5.1 hapus data ketika data tidak kosong
        if (count($details))
        {
            $old_unique = request('unique_number');
            $summary = $subtotal + (float)$old_unique;
            
            Cart::where('id', $check_cartId)
                ->update([
                    'subtotal' => $subtotal,
                    'unique_number' => $old_unique,
                    'summary' => $summary,
                    'status' => 1,
                ]);
        } else {
            Cart::where('id', $check_cartId)
            ->update([
                'subtotal' => 0,
                'unique_number' => 0,
                'summary' => 0,
                'status' => 0,
                ]);
        }


        # 5.2 hapus data ketika data kosong

        return redirect(route("carts.show", Auth::user()->cart))->with('success', 'Barang berhasil dihapus');
    }


}
