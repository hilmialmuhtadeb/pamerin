<?php

namespace App\Http\Controllers;

use App\Models\Exhibition;
use App\Models\Tickdt;
use Illuminate\Http\Request;

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
    public function store()
    {
        $exhibition = Exhibition::where('id', request('exhibition_id'))->first();
        Tickdt::create([
            'ticket_id' => Auth::user()->ticket->id,
            'exhibition_id' => request('exhibition_id'),
            'price' => $exhibition->price,
        ]);

        return redirect(route('exhibitions.index'))->with('success', 'Yeay, karya seni berhasil dimasukkan keranjang');
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
        {
            $tickdt->delete();
            return redirect(route('tickets.show'))->with('success', 'Barang berhasil dihapus');
        }
    }
}
