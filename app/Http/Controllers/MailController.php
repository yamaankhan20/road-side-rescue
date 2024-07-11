<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\Mailing;


class mailController extends Controller
{
    public function index(){
        $mailData =
        [
            "title" => "Mail From Road Side Rescue",
            'body' => "This is testing mail",
        ];
        Mail::to("khanyamaan2@gmail.com")->send(new Mailing($mailData));
        dd("Sended");
    }    
}
