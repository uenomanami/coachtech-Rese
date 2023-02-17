<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reserve;
use App\Http\Requests\ReserveRequest;
use App\Models\Closeddate;
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

        $result = Closeddate::searchDate($reserve['store_id'], $request->date);

        if (!$result) {
            Reserve::create($reserve);
            return view('done');
        } else {
            return back()->with('message', '営業日を選択してください');
        };
    }

    public function update(ReserveRequest $request)
    {
        unset($request->_token);
        $reserve = [
            'num_of_people' => $request->num_of_people,
            'start_at' => $request->date . " " . $request->start_at,
        ];
        Reserve::find($request->reserve_id)->update($reserve);
        return back();
    }

    public function delete(Request $request)
    {
        Reserve::find($request->reserve_id)->delete();
        return back();
    }
}
