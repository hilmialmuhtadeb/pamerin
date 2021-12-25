<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArtworkRequest;
use App\Models\Artwork;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArtworkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('artworks.index', [
            'artworks' => Artwork::where('isReady','=','1')->paginate(9),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::get();
        return view('users.artists.artworks.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    public function store(ArtworkRequest $request)
    {
        $gambar = $request->thumbnail;
        // menmabhakan gambar ke dalam database 
        $new_gambar = time() . ' - ' . $gambar->getClientOriginalName();

        // menambahkan gambar ke dalam folder lokal di public/buktipembayaran 
        $gambar->move('/', $new_gambar);

        $attr = $request->all();
        $attr['thumbnail'] = $new_gambar;
        $attr['category_id'] = $request->category;
        $attr['user_id'] = Auth::user()->id;
        $attr['slug'] = \Str::slug($request->name);


        $artwork = Artwork::create($attr);

        return redirect(route('artworks.shipping', $artwork));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Artwork  $artwork
     * @return \Illuminate\Http\Response
     */
    public function show(Artwork $artwork)
    {
        // dd(request()->path());
        return view('artworks.show', compact('artwork'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Artwork  $artwork
     * @return \Illuminate\Http\Response
     */
    public function edit(Artwork $artwork)
    {
        //
    }

    public function sell(Request $request, Artwork $artwork)
    {
        $artwork->update([
            'price' => $request->price,
            'isReady' => true,
        ]);

        return back()->with('success', 'karya seni berhasil dijual');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Artwork  $artwork
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Artwork $artwork)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Artwork  $artwork
     * @return \Illuminate\Http\Response
     */
    public function destroy(Artwork $artwork)
    {
        \Storage::delete($artwork->thumbnail);
        $artwork->delete();

        return redirect(route('artists.artworks'))->with('success', 'Karya berhasil dihapus');
    }

    public function addStatus(Artwork $artwork)
    {
        $artwork->update([
            'status' => $artwork->status + 1,
        ]);
        return back();
    }
}
