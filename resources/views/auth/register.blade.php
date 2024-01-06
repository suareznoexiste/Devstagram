@extends('layout.app')
@section('titulo')
    registro de usario
@endsection
@section('contenido')
  <div class=" md:flex  md:justify-center md:gap-3 md:items-center">

    <div class=" md:w-6/12  p-5 " > 
   <img src="{{asset('img/Register.png')}}" alt="">
</div>
<div class=" md:w-4/12  bg-slate-100 p-6 rounded-lg shadow">
     <form action="{{route('registrate')}}" method="POST" >
      @csrf 
      {{-- es algo de seguridad cross ride site --}}
      <div class=" mb-5">
        <label for="inputNombre" class=" mb-2 block   text-gray-500 font-bold ">Nombre</label>
        <input id="inputNombre" type="text"
        placeholder="ingresa tu nombre"
        name="name" value="{{old('name')}}" 
        class=" border p-3 w-full rounded-lg   @error('name')
          border-red-600
        @enderror" >
        {{-- El old es para guardar el dato que ingresamos anteriormente --}}
{{-- el @error es de laravel y agrega un mensaje de error y arriba le agregar un border dw color --}}
    </div>
    @error('name')
      <p class=" bg-red-600 text-center font-medium text-white p-2">{{$message}}</p>
    @enderror
         <div class=" mb-5">
             <label for="username" class=" mb-2 block   text-gray-500 font-bold ">username</label>
             <input  value="{{old('username')}}" id="username" name="username" type="text"
             placeholder="ingresa tu username" class=" border p-3 w-full rounded-lg  @error('name')
             bg-red-600
             @enderror" >

         </div>
         @error('username')
         <p class=" bg-red-600 text-center font-medium text-white p-2">{{$message}}</p>
       @enderror
         <div class=" mb-5">
          <label for="inputCorreo" class=" mb-2 block   text-gray-500 font-bold ">Correo Electronico</label>
          <input id="inputCorreo" 
          value="{{old('email')}}"
          type="emai"
          name="email"
          placeholder="ingresa tu Correo electronico" class=" border p-3 w-full rounded-lg " >

      </div>
      @error('email')
      <p class=" bg-red-600 text-center font-medium text-white p-2">{{$message}}</p>
    @enderror
      <div class=" mb-5">
        <label for="password" class=" mb-2 block   text-gray-500 font-bold ">Contraseña</label>
        <input id="password" 
        type="password"
        name="password"
        placeholder="ingresa tu contraseňa" class=" border p-3 w-full rounded-lg " >

    </div>
    {{-- Aqui es importante los name como lo de name y namepasswordconfirmation para la validacion --}}
    @error('password')
    <p class=" bg-red-600 text-center font-medium text-white p-2"> {{$message}}</p>
  @enderror
    <div class=" mb-5">
      <label for="password_confirmation" class=" mb-2 block   text-gray-500 font-bold ">Repetir Contraseña</label>
      <input id="password_confirmation" 
      type="password"
      name="password_confirmation"
      placeholder="ingresa tu contraseňa" class=" border p-3 w-full rounded-lg " >

  </div>
 

  <input type="submit" value="Crear Cuenta"
        class=" bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer  font-bold text-white rounded-lg w-full  p-3  uppercase ">

      
     </form>
</div>
        
</div>


  </div>
    
@endsection