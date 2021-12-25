<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Exhibition;
use App\Models\LikePameran;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function add_like($id,Request $request){
        // dd($request
        $cek = LikePameran::where('user_id',$request->user_id)->where('exhibition_id',$request->exhibition_id)->first();
        // dd(count($cek));
        // dd($cek);
        if($cek){
            if($cek->islike == 0){
                $create = LikePameran::where('id',$cek->id)->update([
                    'islike' => 1
                ]);
            }
            return redirect()->back();
        }else{
            $create = LikePameran::create([
                'user_id' => $request->user_id,
                'exhibition_id' => $request->exhibition_id,
                'islike' => 1
            ]);
            return redirect()->back();
        }
        
    }
    public function min_like($id,Request $request){
        // dd($request
        $cek = LikePameran::where('user_id',$request->user_id)->where('exhibition_id',$request->exhibition_id)->first();
        if($cek){
            $create = LikePameran::where('id',$cek->id)->update([
                'islike' => 0
            ]);
            return redirect()->back();
        }else{
            return redirect()->back();
        }
        
    }
}
