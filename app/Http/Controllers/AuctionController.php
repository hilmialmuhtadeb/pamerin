<?php

namespace App\Http\Controllers;

use App\Models\Auction;
use App\Models\bid;
use App\Models\User;
use Illuminate\Http\Request;

class AuctionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $auctions = Auction::paginate(9);
        return view('auctions.index', compact('auctions'));
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
        $id=Auth()->user()->id;
        $name=Auth()->user()->name;
        $auction=Auction::find($id);
        $user=User::find($id); 

        $tampil = $auction->user()->attach($request->auction_id,['user_id'=>$id, 'auction_id'=>$request->auction_id, 'bidder'=>$request->bidder, 'name'=>$name]);
        
        return redirect(route("auctions.show", $request->slug_auctions));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Auction  $auction
     * @return \Illuminate\Http\Response
     */
    public function show(Auction $auction)
    {
        $id=Auth()->user()->id;
        $user=User::find($id); 
        $bidder = User::find($id)->auction()->orderBy('created_at', 'DESC')->first();
        // dd($bidder);
        return view('auctions.show', compact('auction', 'bidder', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Auction  $auction
     * @return \Illuminate\Http\Response
     */
    public function edit(Auction $auction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Auction  $auction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Auction $auction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Auction  $auction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Auction $auction)
    {
        //
    }
    public function bid(Request $request)
    {
        
    }
}
