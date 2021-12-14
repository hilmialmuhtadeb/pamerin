<?php

namespace App\Http\Controllers;

use App\Models\Commission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommissionController extends Controller
{
    public function show()
    {
        return view('commissions.show');
    }
    public function store()
    {
        // $exhibition = Exhibition::where('id', request('exhibitions_id'))->first();
        // Commission::create([
        //     'commissions_id' => Auth::user()->commission->id,
        //     'exhibitions_id' => request('exhibitions_id'),
        //     'price' => $exhibition->price,
        // ]);

        return redirect(route('commissions.show'));
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



