<?php

namespace App\Http\Controllers;

use App\Models\Artwork;
use App\Models\Tickdt;
use App\Models\Exhibition;
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
        return view('exhibitions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attr = $request->validate([
            'name' => 'required',
            'date' => 'required',
            'start' => 'required',
            'end' => 'required',
            'price' => 'required',
            'description' => 'required',
        ]);

        $thumbnail = $request->file('thumbnail');
        $name_file =  \Str::random(8) . "." . $thumbnail->getClientOriginalExtension();
        $name_folder = "exhibition";
        $path = $thumbnail->storeAs($name_folder, $name_file, "public");
        $attr['thumbnail'] = $path;
        $attr['user_id'] = Auth::user()->id;
        $attr['slug'] = \Str::slug($request->name);

        Exhibition::create($attr);

        return redirect()->route('exhibitions.choice');
    }

    public function choiceArtwork()
    {
        $artworks = Artwork::where('user_id', Auth::user()->id)->get();
        return view('exhibitions.choice', compact('artworks'));
    }

    public function fixArtwork()
    {

    }

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


    public function event(Exhibition $exhibition)
    {
        return view('exhibitions.event', compact('exhibition'));
    }

    public function detail(Request $request)
    {
        $unique = random_int(190, 199);
        $exhibition = Exhibition::where('id', request('exhibition_id'))->first();
    return view('exhibitions.detail', compact('exhibition','unique'));
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
