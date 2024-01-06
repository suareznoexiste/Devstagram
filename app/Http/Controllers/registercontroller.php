<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request; // hay que pasarla otra vez

class registercontroller extends Controller
{
     public function index () {
    return view('auth.register');}

    public function store(Request $request){
        // dd($request -> get('inputCorreo')); // tengo que pasar el name
        //modifcar el request  para que ya agrege el username modificado para reescribir datos
        $request->request->add(['username'=> Str::slug($request->username) ]);
        //
        //
        $this->validate($request,['username'=>'required|unique:users|min:3|max:14',
        'name'=>'required|max:20','email'=>'required|email|unique:users|max:60','password'=>'required|confirmed|min:4'
        ]
       
        );
        // equivale a un insert into
        //eloquent
        User::create ([
            'name'=>$request->name,
            'username'=>$request->username,
            'email'=>$request->email,
            'password'=> Hash::make($request->password) ,
          
        ]);
//autenticar usuarion
auth()->attempt([
  'email'=>$request->email,
   'password'=>$request->password
]);

        // redirecciona y esto ya viene incluido en laravel
      return redirect()->route('muro',auth()->user());
    
      
    }
}
