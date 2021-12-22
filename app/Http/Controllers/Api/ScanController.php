<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use mysqli;

class ScanController extends Controller
{
    public function readtiket(Request $request)
    {
        $user_id = $_GET ['user_id'];

        $sql=$user_id->query("SELECT * FROM tiket WHERE user_id= 'user_id'");

        $data=$sql ->fetch_assoc();

        echo json_decode('user_id');

        mysqli_close($user_id);
    }
}
