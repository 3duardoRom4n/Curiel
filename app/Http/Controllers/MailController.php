<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Mail\SendMail;
use App\Mail\SendMessageToEndUser;
use Illuminate\Support\Facades\Mail;


class MailController extends Controller
{
    public function mailform()
    {
        return view('mail');
    }
    public function maildata(Request $request)
    {
        $name = $request->name;
        $email = $request->email;
        $sub = $request->sub;
        $mess = $request->mess;
        $mailData = [
            'url' => 'https://sandroft.com/',
        ];

        // Enviar email al destinatario principal
        $send_mail = "pruebasagicc23@gmail.com";
        Mail::to($send_mail)->send(new SendMail($name, $email, $sub, $mess, $mailData));

        // Enviar mensaje de confirmación al usuario que envió el correo
        $senderMessage = "thanks for your message , we will reply you in later";
        Mail::to($email)->send(new SendMessageToEndUser($name, $senderMessage, $mailData));
            
        return "Mail Send Successfully";
    }
}
