<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Detail;
use App\Models\User;
use App\Models\Artwork;
use App\Models\Commission;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\redirect;
use Illuminate\Support\Facades\Auth;

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
        // $kepo = Cart::all();
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
        
        $details = Detail::where('cart_id', $cart->id)->latest()->get();
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

    public function edit_alamat($cart_id, $artwork_id, Request $request)
    {
        $request->validate([
            'address_type' => 'required',
            'flexRadioDefault' => 'required',

        ],[
            'flexRadioDefault.required' => 'Anda belum mengisi ongkos kirim',
            'address_type.required' => 'Anda belum memilih alamat pengiriman',
        ]);
        
        # 1. Tambah alamat dan ongkos kirim
        if($request->address_type == 'default'){
            Detail::where('cart_id', $cart_id)->where('artwork_id', $artwork_id)
                ->update([
                    'street'=>$request->alamat_default,
                    'city'=>$request->kota_default,
                    'region'=>$request->provinsi_default,
                    'zipcode'=>$request->kodepos_default,
                    'shipping'=>$request->flexRadioDefault,
            ]);

            // # 2. Tambah value ongkos kirim didalam TOTAL
            $cart_df = Cart::where('id', $cart_id)->get();
            $ongkir_df = 0;
            for ($i=0; $i < count($cart_df); $i++) {
                $ongkir_df += (float)$cart_df[$i]->ongkir;
            }
            $ongkir_df_total = $ongkir_df + (float)$request->flexRadioDefault;
            
            $summary_df = 0;
            for ($i=0; $i < count($cart_df); $i++) {
                $summary_df += (float)$cart_df[$i]->summary;
            }
            $summary_df_total = $summary_df + $ongkir_df_total;
           
            Cart::where('id', $cart_id)
                ->update([
                   'ongkir' => $ongkir_df_total,
                   'summary' => $summary_df_total,
            ]);
        }
        else {
            $request->validate([
                'alamat' => 'required',
                'kabupaten' => 'required',
                'provinsi' => 'required',
                'kodepos' => 'required',
    
            ],[
                'alamat.required' => 'Anda belum mengisi alamat',
                'kabupaten.required' => 'Anda belum mengisi kabupaten',
                'provinsi.required' => 'Anda belum mengisi provinsi',
                'kodepos.required' => 'Anda belum mengisi kodepos',
            ]);
            
            Detail::where('cart_id', $cart_id)->where('artwork_id', $artwork_id)
            ->update([
                'street'=>$request->alamat,
                'city'=>$request->kabupaten,
                'region'=>$request->provinsi,
                'zipcode'=>$request->kodepos,
                'shipping'=>$request->flexRadioDefault,
            ]);

            // # 2. Tambah value ongkos kirim didalam TOTAL
            $cart_cs = Cart::where('id', $cart_id)->get();
            $ongkir_cs = 0;
            for ($i=0; $i < count($cart_cs); $i++) {
                $ongkir_cs += (float)$cart_cs[$i]->ongkir;
            }
            $ongkir_cs_total = $ongkir_cs + (float)$request->flexRadioDefault;
            
            $summary_cs = 0;
            for ($i=0; $i < count($cart_cs); $i++) {
                $summary_cs += (float)$cart_cs[$i]->summary;
            }
            $summary_cs_total = $summary_cs + $ongkir_cs_total;
           
            Cart::where('id', $cart_id)
                ->update([
                   'ongkir' => $ongkir_cs_total,
                   'summary' => $summary_cs_total,
            ]);
        }  
        return redirect(route("carts.show", Auth::user()->cart))->with('success', 'Sukses menambahkan alamat');
    }

    public function editAlamat($id, $cart_id, $artwork_id)
    {
        $id_user= Auth()->user()->id;
        $artwork= Artwork::find($artwork_id);
        $user=User::find($id_user);

        $cart = Cart::find($cart_id);
        $details = Detail::find($id);

        return view('carts.edit', compact('artwork','user', 'cart', 'details'));
    }

}
