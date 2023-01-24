<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reserve;
use App\Http\Requests\ReserveRequest;
use Illuminate\Support\Facades\Auth;


class ReserveController extends Controller
{
    public function create(ReserveRequest $request)
    {
        $user_id = Auth::id();
        $reserve = $request->all();

        $reserve = [
            'user_id' => $user_id,
            'store_id' => $reserve['store_id'],
            'num_of_people' => $reserve['num_of_people'],
            'start_at' => $reserve['date'] . " " . $reserve['start_at'],
        ];
        Reserve::create($reserve);

        return view('done');
    }
}
