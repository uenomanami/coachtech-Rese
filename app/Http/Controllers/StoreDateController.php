<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Closeddate;


class StoreDateController extends Controller
{
    public function create(Request $request)
    {

        foreach ($request->closed as $i => $val) {

            $store_id = $request->store_id;
            $date = $request->closed[$i];

            $param = [
                'store_id' => $store_id,
                'date' => $date,
            ];

            $result = Closeddate::searchDate($store_id, $date);
            if (!$result) {
                Closeddate::create($param);
            }
        }

        return redirect('storemanager');
    }
}
