<?php

namespace App\Http\Controllers;
use App\Models\Store;


use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function index(Request $request)
    {
        $stores = Store::all();
        return view('index', ['stores'=>$stores]);
    }
}
