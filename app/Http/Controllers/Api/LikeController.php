<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;
use Validator;
use App\Models\User;
use App\Models\Exhibition;

class LikeController extends Controller
{
    public function add_like($id){
        $exhibition = Exhibition::findOrFail($id);
        $like = $exhibition->jumlah_like+1;
        $update = Exhibiton::where('id',$id)->update([
            'jumlah_like'=> $like
        ]);
    }
}