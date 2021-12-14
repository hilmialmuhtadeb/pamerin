<?php

namespace App\Http\Controllers;

use App\Models\Exhibition;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    public function show()
    {
        return view('tickets.show');
    }
    // public function store()
    // {
    //     // $exhibition = Exhibition::where('id', request('exhibitions_id'))->first();
    //     // Ticket::create([
    //     //     'tickets_id' => Auth::user()->ticket->id,
    //     //     'exhibitions_id' => request('exhibitions_id'),
    //     //     'price' => $exhibition->price,
    //     // ]);

    //     return redirect(route('tickets.show'));
    // }

    public function confirm()
    { 
        return view('tickets.confirm');
        
    }

    public function join()
    {
        return redirect(route('tickets.join'));
    }

    public function destroy(Ticket $ticket)
    {
        $ticket->delete();
        // dd($detail);
        return redirect(route('tickets.show'))->with('success', 'Tiket berhasil dihapus');
    }
}

