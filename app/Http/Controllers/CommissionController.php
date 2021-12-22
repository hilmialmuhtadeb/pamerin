<?php

namespace App\Http\Controllers;

use App\Models\Commission;
use App\Models\Detail;
use App\Models\Cart;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommissionController extends Controller
{
    public function show(Cart $cart)
    {
        $details = Detail::where('cart_id', $cart->id)->get();
        dd($details);

        // var_dump($details);
        return view('commissions.show', compact('cart', 'details'));
    }
    public function store(Request $request)
    {
        // $detail = Detail::find($id);
        // $cart = Detail::where('cart_id', $detail->cart_id)->get();
        return view('commissions.show');
        // dd($cart);
    }


    public function confirm()
    {
        
        return view('commissions.confirm');
        
    }

    public function destroy(Commission $commission)
    {
        $commission->delete();
        // dd($detail);
        return redirect(route('commissions.show'))->with('success', 'Pesanan berhasil dihapus');
    }
}



