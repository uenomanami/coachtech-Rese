<?php

namespace App\Http\Controllers;

use App\Mail\SendTestMail;
use Illuminate\Http\Request;
use Illuminate\Http\MailRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Models\User;

class MailSendController extends Controller
{
    public function index()
    {
        $users = User::all();

        $param = [
            'users' => $users
        ];
        return view('from_admin_mail_create', $param);
    }

    public function send(MailRequest $request)
    {
        $user = User::find($request->user);
        $title = $request->tile;
        $content = $request->content;
        Mail::send(new SendTestMail($user, $title, $content));

        return redirect('administor/mail');
    }
}
