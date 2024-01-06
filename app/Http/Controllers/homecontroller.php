<?php

namespace App\Http\Controllers;

use App\Models\post;
use Illuminate\Http\Request;
class homecontroller extends Controller
{

 public function __construct() {
    $this->middleware('auth');
 }
    //cuando nuestro controllador hara una sola cosa lo mejor seria que se mande a llamar  
    //con un __invoke
public function __invoke()
// pluck es para traer un dato en especifico de ese to array , mas bien en to array
{  $ids=auth()->user()->following->pluck('id')->toArray(); 
    //como estamos convirtiendo id en array entonces lo pasamos  con where IN por que este se encarga de revisar una lista de arreglos  y no solo uno en concreto 
    $posts=  post::whereIn('user_id',$ids)->latest()->paginate(20);
    //latest en el orderby

    return view('home',['posts'=>$posts]);
    
} 
}
