<?php

namespace App\Http\Controllers;
//use Mail; la comente porque tengo el de abajo en todo caso borrar el de abajo
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactMessageController extends Controller
{
    public function create(){

 return view('soporte.mensaje_soporte');

    }

            public function store(Request $request)
            {

        $this->validate($request,[
            'name'=>'required',
            'email'=>'required|email',
            'message'=>'required',
           
        ]);

            Mail::send('emails.contact-message',[
            'msg'=>$request->message,'datos'=>$request->email,'nombres'=>$request->name
            ], function ($mail) use($request) {
            $mail->from($request->email,$request->name);

            $mail->to('irving.bravo@alumnos.udg.mx')->subject('contact message');
            });

            return redirect()->back()->with('flash_message','Gracias por tu mensaje');

                }
}
