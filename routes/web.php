<?php

use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\homecontroller;
use App\Http\Controllers\imagencontroller;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\logincontroller;
use App\Http\Controllers\logoutcontroller;
use App\Http\Controllers\perfilcontroller;
use App\Http\Controllers\Postregister;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\registercontroller;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// para crear todo de un solo es asi 
//sail artisan make:model --migration --controller --factory post
//el orden délas rutas importa

//usamos invoke que se manda a llamar automaticamente
Route::get('/', homecontroller::class )->name('home');
// lo que hace name es que le agrega un nombre a la ruta
Route::get('/register',[registercontroller::class,'index'] )->name('registrate');
Route::post('/register',[registercontroller::class,'store'] )->name('registrate');

Route::get('/login',[logincontroller::class,'index'] )->name('login'); // el nombre login es importante aca
route::post('/login',[logincontroller::class,'store']);

route::post('/logout',[logoutcontroller::class,'store'])->name('logout');// lo hacemos post para mayor seguridad
//editar pertfil
Route::get('/editar-perfil',[perfilcontroller::class,'index'])->name('perfil.index');
Route::post('/editar-perfil',[perfilcontroller::class,'store'])->name('perfil.store');
Route::get('/{user:username}',[Postregister::class,'index'] )->name('muro');
Route::get('/posts/create',[Postregister::class,'create'] )->name('post.create');
Route::post('/posts',[Postregister::class,'store'] )->name('post.store');
Route::get('/{user:username}/posts/{post}',[Postregister::class,'show'] )->name('posts.show');
route::delete('/post/{post}',[Postregister::class,'destroy'])->name('post.destroy');

Route::post('/{user:username}/posts/{post}',[ComentarioController::class,'store'] )->name('comentario.store');


Route::post('/imagenes', [ImagenController::class, 'store'])->name('imagenes.store');

//like a las fotos 
Route::post('/post/{post}/likes', [LikeController::class, 'store'])->name('post.like.store');
Route::delete('/post/{post}/likes', [LikeController::class, 'destroy'])->name('post.like.destroy');
//editar perfil

Route::post('/{user:username}/follow', [FollowerController::class, 'store'])->name('users.follow');
Route::delete('/{user:username}/unfollow', [FollowerController::class, 'destroy'])->name('users.unfollow');