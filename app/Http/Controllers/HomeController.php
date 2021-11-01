<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Exhibition;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke()
    {
        return view('home', [
            'exhibitions' => Exhibition::limit(3)->get(),
            'articles' => Article::limit(3)->get(),
        ]);
    }
}
