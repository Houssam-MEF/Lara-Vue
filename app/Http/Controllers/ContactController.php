<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        ini_set('max_execution_time', 120);

        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        Mail::send([], [], function ($message) use ($data) {
            $message->to('houssam.mef03@gmail.com')
                ->subject('New Contact Form Submission')
                ->html('Name: ' . $data['name'] . '<br>Email: ' . $data['email'] . '<br>Message: ' . $data['message']);
        });
    }
}