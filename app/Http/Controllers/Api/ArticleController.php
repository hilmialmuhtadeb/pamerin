<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
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
        try {
            $article = Article::all();
            
            if($article){
                $respone = [
                    'success' => true,
                    'code' => 200,
                    'message' => 'result data',
                    'body' => $article
                ];
            }else{
                $respone = [
                    'success' => true,
                    'code' => 404,
                    'message' => 'data not found',
                    'body' => $article
                ];
            }
            
            return response()->json($respone);
            
        } catch (\Throwable $th) {
             $respone = [
                'success' => false,
                'code' => 400,
                'message' => $th->getMessage(),
                'body' => ''
            ];
            return response()->json($respone);
        }
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
