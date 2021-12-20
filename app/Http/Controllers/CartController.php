<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Detail;
use App\Models\User;
use App\Models\Artwork;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\redirect;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return view('commissions.show');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        
        $details = Detail::where('cart_id', $cart->id)->get();
        return view('carts.show', compact('cart', 'details'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        // $ship = ShippingCost::where('artwork_id', $artwork->id)->get();
        $id=Auth()->user()->id;
        $user=User::find($id); 
        return view('carts.edit', compact('cart','user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        //
    }

    public function edit_alamat($id, Request $request)
    {
        // $detail = Detail::where('cart_id', $id)->get();

        if($request->address_type == 'default'){
            Detail::where('artwork_id', $id)
                ->update([
                    'street'=>$request->alamat_default,
                    'city'=>$request->kota_default,
                    'region'=>$request->provinsi_default,
                    'zipcode'=>$request->kodepos_default,
                    'shipping'=>$request->flexRadioDefault,
            ]);
        }
        else {
            Detail::where('artwork_id', $id)
            ->update([
                'street'=>$request->alamat,
                'city'=>$request->kabupaten,
                'region'=>$request->provinsi,
                'zipcode'=>$request->kodepos,
                'shipping'=>$request->flexRadioDefault,
        ]);

        // $check_cartId = Auth::user()->cart->id;
        
        // # 3. ambil data cart_id yang masih ada
        // $details = Detail::where('cart_id', $check_cartId)->get();

        // $ongkir = 0;
        // for ($item=0 ; $item < count($details); $item++) {
        //     $ongkir += (float)$details[$item]->shipping;
        // }

        //   #5. update data pada cart setelah dilakukan looping
        // # 5.1 hapus data ketika data tidak kosong
        // if (count($details))
        // {   
        //     Cart::where('id', $check_cartId)
        //         ->update([
        //             'ongkir' => $ongkir,
        //         ]);
        // } else {
        //     Cart::where('id', $check_cartId)
        //     ->update([
        //         'ongkir' => 0,
        //         ]);
        // }


        }  

        return redirect()->back()->with('success', 'Sukses menambahkan alamat');
    }

    public function editAlamat($id)
    {
        $id_user= Auth()->user()->id;
        $artwork= Artwork::find($id);
        $user=User::find($id_user);

        return view('carts.edit', compact('artwork','user'));
    }

}
