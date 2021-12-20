<?php

namespace App\Http\Controllers;

use App\Models\Commission;
use App\Models\Detail;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommissionController extends Controller
{
    public function show(Detail $detail, $id)
    {
        $user=User::find($id);
        return view('commissions.show');
    }
    public function store()
    {
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



