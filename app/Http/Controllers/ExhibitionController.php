<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\Exhibition;
use App\Models\Tickdt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExhibitionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $exhibitions = Exhibition::paginate(9);
        return view('exhibitions.index', compact('exhibitions'));
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
    // public function ticket(Request $request)
    // {
    //     $ticket = Ticket::find($request->ticket_id);
    //     return view('tickets.detail');
    // }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Exhibition  $exhibition
     * @return \Illuminate\Http\Response
     */
    public function show(Exhibition $exhibition)
    {
        return view('exhibitions.show', compact('exhibition'));
    }
    

    public function detail(Request $request)
    {
    
        $exhibition = Exhibition::where('id', request('exhibition_id'))->first();
        Tickdt::create([
            'ticket_id' => Auth::user()->ticket->id,
            'exhibition_id' => request('exhibition_id'),
            'price' => $exhibition->price,
        ]);
        return view('exhibitions.detail', compact('exhibition'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Exhibition  $exhibition
     * @return \Illuminate\Http\Response
     */
    public function edit(Exhibition $exhibition)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Exhibition  $exhibition
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Exhibition $exhibition)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Exhibition  $exhibition
     * @return \Illuminate\Http\Response
     */
    public function destroy(Exhibition $exhibition)
    {
        //
    }
}
