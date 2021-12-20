<?php

namespace App\Http\Controllers;

use App\Models\Tickdt;
use App\Models\Ticket;
use App\Models\User;
use App\Models\Exhibition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    public function show(Ticket $ticket, $id)
    {
        $user=User::find($id);
        
        // $tickdt = Tickdt::where('user_id', $user)->get();
        return view('tickets.show', compact('user'));
    }
    
    public function joinDetail(Ticket $ticket, $id)
    {
        $user=User::find($id);
        return view('tickets.join');
    }
    public function store(Request $request)
    {
        // $exhibition = Exhibition::find($request->exhibition_id);
        // $attr = $request->all();
        // $attr['exhibition_id'] = $request->exhibition->id;
        // $attr['user_id'] = Auth::user()->id;
        // $attr['slug'] = \Str::slug($request->name);

        // $ticket = Ticket::create($attr);

        // return redirect(route('exhibitions.index', $exhibition));
    }

    public function confirm($id)
    {
        $exhibition=Exhibition::find($id);
        return view('tickets.confirm', compact('exhibition'));
        
    }


    public function destroy(Ticket $ticket)
    {
        $ticket->delete();
        // dd($detail);
        return redirect(route('tickets.show'))->with('success', 'Tiket berhasil dihapus');
    }
}

