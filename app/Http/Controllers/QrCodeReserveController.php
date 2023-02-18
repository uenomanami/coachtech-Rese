<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reserve;


class QrCodeReserveController extends Controller
{
    public function index(Request $request)
    {
        $reserve = Reserve::find($request->reserve_id);

        $param = [
            'reserve' => $reserve,
        ];

        return view('qrcode_reserve', $param);
    }
}
