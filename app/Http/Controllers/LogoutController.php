<?php

namespace App\Http\Controllers;

use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function __invoke()
    {
        $type = Auth::user()->type;
        Auth::logout();
        if ($type === 2) {
            return redirect(route('artists.login'));
        } else {
            return redirect(route('login'));
        }
    }
}
