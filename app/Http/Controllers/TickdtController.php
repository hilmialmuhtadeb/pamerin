<?php

namespace App\Http\Controllers;

use App\Models\Exhibition;
use App\Models\Tickdt;
use App\Models\User;
use Webpatser\Uuid\Uuid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class TickdtController extends Controller
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
        $id=$request->exhibition_id;
        $exhibition=Exhibition::find($id);
        $id_tiket= Str::random(8);

        $user=auth()->user()->id;
        
        $post= $exhibition->user()->attach($user,['code' =>$id_tiket,'subtotal'=>$request->price,'unique'=>$request->unique,'summary'=>$request->total,'status_id'=>1]);

        return redirect(route('exhibitions.index'))->with('success', 'Silahkan melanjutkan ke pembayaran');
    }

    public function unggahBayar(Request $request, $id , $idtiket)
    {
        $this->validate($request, [
            'bayar' => 'required|mimes:jpg,jpeg|max:2500'
        ]);

        $id_user=Auth()->user()->id;
        $user = User::find($id_user); 

        $exhibition=Exhibition::find($idtiket);

        $gambar = $request->bayar;

        // menmabhakan gambar ke dalam database 
        $new_gambar = time() . ' - ' . $gambar->getClientOriginalName();
        // update data di relasi many to many dan mengubah status id menjadi 2
        $user->exhibition()->updateExistingPivot($exhibition,['bukti'=>$new_gambar,'status_id'=>2]);

        // menambahkan gambar ke dalam folder lokal di public/buktipembayaran 
        $gambar->move('/', $new_gambar);

        return redirect()->back()->with('success', 'Silahkan melanjutkan ke pembayaran');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tickdt  $tickdt
     * @return \Illuminate\Http\Response
     */
    public function show(Tickdt $tickdt)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tickdt  $tickdt
     * @return \Illuminate\Http\Response
     */
    public function edit(Tickdt $tickdt)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tickdt  $tickdt
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tickdt $tickdt)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tickdt  $tickdt
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tickdt $tickdt)
    {
        
        $tickdt->delete();
        return redirect(route('tickets.show'))->with('success', 'Barang berhasil dihapus');

    }

public static function boot()
{
    parent::boot();
    self::creating(function ($model) {
        $model->ticket_id = Tickdt::where('exhibition_id', $model->exhibition_id)->max('ticket_id') + 1;
    });
}
}
