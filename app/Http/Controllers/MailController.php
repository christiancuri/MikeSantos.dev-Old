<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use SendGrid\Mail\Mail;
use SendGrid;

class MailController extends Controller
{

    public function contact(Request $request){
        if($request->ajax()){

            $name = $request->name;
            $mail = $request->email;
            $subject = $request->subject;
            $message = $request->message;

            $email = new Mail;
            $email->setFrom('contato@storedev.net', 'StoreDev Contact');
            $email->setSubject('[MikeSantos] E-mail de contato');
            $email->addTo('mike.storedev@gmail.com', 'MikeSantos #1');
            $email->addTo('contato.mikesantos@gmail.com', 'MikeSantos #2');
            $email->addContent(
                "text/html",
                "<h3>E-mail de contato da MikeSantos.org</h3> <br> <p>Nome: {$name} <br>E-mail: {$mail} <br>Subject: {$subject} <br>Message: {$message}</p>"
            );

            $sendgrid = new SendGrid(env('SENDGRID_API_KEY'));

            try{
                $response = $sendgrid->send($email);
            }catch(Exception $e){
                $response = $e->getMessage();
            }


            return response()->json([
                'statusCode'    => 100,
                'status'        => 'Message send with success',
                'data'          => $response
            ]);

        }else{
            return abort(404);
        }
    }
}
