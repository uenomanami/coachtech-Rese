<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Store;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function index()
    {
        $stores = Store::all();
        $user = Auth::user();
        $area = Area::all();
        $category = Category::all();
        $param = [
            'stores' => $stores,
            'user' => $user,
            'areas' => $area,
            'categories' => $category
        ];
        return view('index', $param);
    }

    public function detail(Request $request)
    {
        $store_id = $request->store_id;
        $store = Store::toDetail($store_id);

        return view('detail', ['store' => $store]);
    }

    public function search(Request $request)
    {
        $user = Auth::user();
        $input_area = $request->area;
        $input_category = $request->category;
        $input_content = $request->store_name;
        $stores = Store::doSearch($input_area, $input_category, $input_content);

        $area = Area::all();
        $category = Category::all();

        $param = [
            'stores' => $stores,
            'user' => $user,
            'areas' => $area,
            'categories' => $category
        ];

        return view('index', $param);
    }
}
