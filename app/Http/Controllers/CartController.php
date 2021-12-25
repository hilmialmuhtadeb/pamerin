<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Detail;
use App\Models\User;
use App\Models\Artwork;
use App\Models\Auction;
use App\Models\AuctionUser;
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
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        $details = Detail::where('cart_id', $cart->id)->where('status', 1)->latest()->get();

        # check ongkir detail tidak boleh kosong
        $ongkir = (float)1;
        # 1. looping data
        for ($i=0; $i < count($details); $i++) {
            # 2. cleaning data is null
            if ($details[$i]->shipping == NULL){
                # 3. Handling missing value
                $details[$i]->shipping = 0;
            }
            # multiplication total
            $ongkir *= (float)$details[$i]->shipping;
        }
        // var_dump($ongkir);

        return view('carts.show', compact('cart', 'details', 'ongkir'));
    }

    public function show_myorder(Cart $cart)
    {
        $id=Auth()->user()->id;
        $user=User::find($id); 
        # 2 -> menunggu pembayaran
        # 3 -> pembayaran sedang diproses
        # 4 -> transaksi selesai
        $details = Detail::where('cart_id', $cart->id)->latest()->get();

        // var_dump($details);
        return view('carts.myorder', compact('cart', 'details', 'user'));
    }

    public function waiting_myorder(Cart $cart)
    {
        $id=Auth()->user()->id;
        $user=User::find($id); 
        # 2 -> menunggu pembayaran
        # 3 -> pembayaran sedang diproses
        # 4 -> transaksi selesai
        $details = Detail::where('cart_id', $cart->id)->where('status', 2)->latest()->get();

        // var_dump($details);
        return view('carts.myorder_waiting', compact('cart', 'details', 'user'));
    }

    public function proses_myorder(Cart $cart)
    {
        $id=Auth()->user()->id;
        $user=User::find($id); 
        # 2 -> menunggu pembayaran
        # 3 -> pembayaran sedang diproses
        # 4 -> transaksi selesai
        $details = Detail::where('cart_id', $cart->id)->where('status', 3)->latest()->get();

        // var_dump($details);
        return view('carts.myorder_proses', compact('cart', 'details', 'user'));
    }

    public function selesai_myorder(Cart $cart)
    {
        $id=Auth()->user()->id;
        $user=User::find($id); 
        # 2 -> menunggu pembayaran
        # 3 -> pembayaran sedang diproses
        # 4 -> transaksi selesai
        $details = Detail::where('cart_id', $cart->id)->where('status', 4)->latest()->get();

        // var_dump($details);
        return view('carts.myorder_selesai', compact('cart', 'details', 'user'));
    }

    public function lelang()
    {
        $id=Auth()->user()->id;
        $user=User::find($id); 
        // # 1 -> sedang lelang
        // # 2 -> menunggu pembayaran
        // # 3 -> pembayaran sedang diproses

        $auction_user = $user->auction()->where('status', 2)->orWhere('status', 3)->orWhere('status', 4)->latest()->get();

        return view('bayar_lelang.lelang', compact('user', 'auction_user'));
    }

    
    public function tunggu_bayar()
    {
        $id=Auth()->user()->id;
        $user=User::find($id); 
        // # 1 -> sedang lelang
        // # 2 -> menunggu pembayaran
        // # 3 -> pembayaran sedang diproses
        
        $auction_user = $user->auction()->Where('status', 2)->latest()->get();
        
        return view('bayar_lelang.tunggu_bayar', compact('user', 'auction_user'));
    }

    public function bayar_lelang(Request $request)
    {
        $request->validate([
            'bayar' => 'required|mimes:jpg,jpeg,png|max:2500',
        ],[
            'bayar.required' => 'Anda belum mengupload bukti pembayaran',
        ]);

        $id = Auth()->user()->id;
        $user = User::find($id); 

        $gambar = $request->bayar;
        // menmabhakan gambar ke dalam database 
        $new_gambar = time() . ' - ' . $gambar->getClientOriginalName();
        // update data di relasi many to many dan mengubah status id menjadi 2
        AuctionUser::where('id', $request->id_auctionUser)->where('auction_id', $request->id_auction)->where('user_id', $user->id)->update(['bukti'=>$new_gambar, 'status'=>3]);
        // menambahkan gambar ke dalam folder lokal di public/buktipembayaran 
        $gambar->move('/', $new_gambar);

        return redirect(route('bayar_lelang.tunggu_bayar', Auth::user()->cart))->with('success', 'Pesanan sedang diproses');
    }

    public function lelang_waiting()
    {
        $id=Auth()->user()->id;
        $user=User::find($id); 
        // # 1 -> sedang lelang
        // # 2 -> menunggu pembayaran
        // # 3 -> pembayaran sedang diproses

        $auction_user = $user->auction()->where('status', 3)->orWhere('status', 3)->orWhere('status', 4)->latest()->get();

        return view('bayar_lelang.lelang', compact('user', 'auction_user'));
    }
    

    public function selesai_bayar()
    {
        $id=Auth()->user()->id;
        $user=User::find($id); 
        // # 1 -> sedang lelang
        // # 2 -> menunggu pembayaran
        // # 3 -> pembayaran sedang diproses

        $auction_user = $user->auction()->where('status', 4)->latest()->get();

        return view('bayar_lelang.selesai_bayar', compact('user', 'auction_user'));
    }






    public function bayar_pesanan(Request $request, $user_id, $artwork_id)
    {
        $request->validate([
            'bayar' => 'required|mimes:jpg,jpeg,png|max:2500',
        ],[
            'bayar.required' => 'Anda belum mengupload bukti pembayaran',
        ]);

        $user = User::find($user_id); 
        $artwork = Artwork::find($artwork_id);

        $upload_data = $artwork->user()->attach($artwork->id,['user_id'=>$user->id, 'artwork_id'=>$artwork->id, 'code'=>$request->code]);

        $gambar = $request->bayar;
        // menmabhakan gambar ke dalam database 
        $new_gambar = time() . ' - ' . $gambar->getClientOriginalName();
        // update data di relasi many to many dan mengubah status id menjadi 2
        $user->artwork()->updateExistingPivot($artwork,['bukti'=>$new_gambar]);
        // menambahkan gambar ke dalam folder lokal di public/buktipembayaran 
        $gambar->move('/', $new_gambar);


        # status detail = 3 -> pesanan sedang diproses
        Detail::where('id_pesanan', $request->code)
            ->update([
                'status' => 3,
            ]);

        return redirect(route('carts.show_myorder', Auth::user()->cart))->with('success', 'Pesanan sedang diproses');
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

    public function cart_checkout($cart_id, Request $request)
    {
        $details = Detail::where('cart_id', $cart_id)->get();
        # edit status detail
        for ($i=0; $i < count($details); $i++) {
            $detail_id = $details[$i]->id;

            # status detail = 2 -> menunggu pembayaran
            Detail::where('id', $detail_id)
            ->update([
                'status' => 2,
            ]);
        }

        # edit status artwork
        for ($i=0; $i < count($details); $i++) {
            $artwork_id = $details[$i]->artwork->id;

            Artwork::where('id', $artwork_id)
            ->update([
                'isReady'=>2,
            ]);
        }

        Cart::where('id', $cart_id)
            ->update([
                'subtotal' => 0,
                'ongkir' => 0,
                'unique_number' => 0,
                'summary' => 0,
                'status' => 0,
            ]);
            
        return redirect(route('carts.show_myorder', Auth::user()->cart))->with('success', 'Silahkan melakukan pembayaran');
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
            $request->validate([
                'alamat_default' => 'required',
                'kota_default' => 'required',
                'provinsi_default' => 'required',
                'kodepos_default' => 'required',
    
            ],[
                'alamat_default.required' => 'Data alamat anda kosong !',
                'kota_default.required' => 'Data kota/kabupaten anda kosong !',
                'provinsi_default.required' => 'Data provinsi anda kosong !',
                'kodepos_default.required' => 'Data kodepos anda kosong !',
            ]);

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
