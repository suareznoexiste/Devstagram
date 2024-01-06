<?php

namespace App\Http\Controllers;

use App\Models\User;
use auth;

use Illuminate\Support\Str;
use Illuminate\Http\Request;

use Intervention\Image\Facades\Image;




class perfilcontroller extends Controller
{
  //

  public  function __construct()
  {
    $this->middleware('auth');
  }
  public function index()
  {
    return view('perfil.index');
  }


  public function store(Request $request)
  {  
    $request->request->add(['username' => Str::slug($request->username)]);

    //cuando son mas de tres lo mas recomendable  es usar arreglos
    //eso de mi username y auth user es para que valide si el usuario 
    //esta en su propio edit entonces aunque no cambie el usario puede editar lo demas 
    // osea que sin eso le aparecia que ya existia su usuraio y no dejeba editar aunque fuese el el mismo dueño   
    $this->validate($request,['username'=>['required','unique:users,username,'.auth()->user()->id,'min:3','max:14','not_in:facebook,twitter,sexo'],'email'=>['required','email','unique:users,email']]);
    if ($request->imagen) {
      $imagen=$request->file('imagen'); // la repuesta del file pero asu vez se llama file
      $nombreImagen= Str::uuid().'.'.$imagen->extension(); //aqui le asignamo un id unico y le agregamos la extension
      $imagenServidor= image::make($imagen);//make nos permite crear una imagen de intervetion image
      // aqui usamos la libreria de paquet imageinterview
      //la imagen que se creaba en memeria sera parte de la imagen que se formaba en memroria 
    
      $imagenServidor->fit(1000,1000) ;// aqui le decimos cuanto mide cad a imagen
      $imagenPath=public_path('perfiles').'/'.$nombreImagen;
      $imagenServidor->save($imagenPath);
    }
     $usuario=User::find(auth()->user()->id);
     
     $usuario->username=$request->username;
     $usuario->imagen=$nombreImagen ?? auth()->user()->imagen ?? null;
     $usuario->save();
   return  redirect()->route('perfil.index',$usuario->username);


  }
}
