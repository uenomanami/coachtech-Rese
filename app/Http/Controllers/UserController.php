<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Reserve;

class UserController extends Controller
{
    public function mypage()
    {
        $user = Auth::user();
        $reserves = Reserve::with('user')->get();
        $stores = Auth::user()->favorite_stores()->orderBy('created_at', 'desc')->get();

        $param = [
            'user' => $user,
            'reserves' => $reserves,
            'stores' => $stores
        ];
        return view('mypage', $param);
    }
}
