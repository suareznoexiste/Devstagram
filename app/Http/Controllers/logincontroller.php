<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class logincontroller extends Controller
{
  public function index(){ return view('auth.login');}
  //hay que escribir bien los nombres por que laravel lo hace de manera automatica

  public function store(Request $request){
    $this->validate($request,['email'=>'required','password' =>'required|min:4']);


    // intentar verificar y si es verdad lo redireccionamos 
    if(!auth()->attempt($request->only('email','password'),$request->remember)){ // el remember es para guardar la sesion iniciada
      //ese back significa que lo devuelta donde estaba(DONDE ENVIASTE LOS DATOS) pero en limpio y aqui creamos el mensaje
      // ese with es una forma de llenar los datos que tenemos en esa sesion y en mi template
      //- puedo comprobar ese sesion es para mandar datos o mensajes a la vista
       //Flash a piece of data to the session
          return back()->with('mensaje','Credenciales incorrectas');
    }
  
    return redirect()->route('muro',auth()->user());
    //se le manda el parametro del user para  que lea la url del usario
    //redireccionamos aqui

  }
}

