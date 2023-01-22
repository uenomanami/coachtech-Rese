<?php

namespace App\Http\Controllers;

use App\Models\Store;
use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function index()
    {
        $stores = Store::all();
        $user = Auth::user();
        $param = [
            'stores' => $stores,
            'user' => $user
        ];
        return view('index', $param);
    }

    public function detail(Request $request)
    {
        $store_id = $request->input('store_id');
        $store = Store::doSearch($store_id);

        return view('detail', ['store' => $store]);
    }
}
