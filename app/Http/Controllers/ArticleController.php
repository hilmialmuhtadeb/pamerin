<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('articles.index', [
            'articles' => Article::paginate(9),
        ]);
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
        $attr = $request->all();
        $attr['slug'] = Str::slug($request->title);
        $attr['thumbnail'] = $request->thumbnail->store('/images/articles');
        Article::create($attr);

        return redirect(route('admin.artikel'))->with('success', 'Berhasil menambahkan artikel baru.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $attr = $request->all();
        if (request('thumbnail')) {
            \Storage::delete($article->thumbnail);
            $attr['thumbnail'] = $request->thumbnail->store('/images/articles');
        } else {
            $attr['thumbnail'] = $article->thumbnail;
        }
        // dd($attr);
        $article->update($attr);
        return redirect(route('admin.artikel'))->with('success', 'Berhasil memperbarui artikel');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        \Storage::delete($article->thumbnail);
        $article->delete();

        return back()->with('success', 'Artikel berhasil dihapus');
    }
}
