@extends('layout.app')
@section('titulo')
    Login
@endsection
@section('contenido')
  <div class=" md:flex  md:justify-center md:gap-3 md:items-center">

    <div class=" md:w-6/12  p-5 " > 
   <img src="{{asset('img/login.png')}}" alt="login">
</div>
<div class=" md:w-4/12  bg-slate-100 p-6 rounded-lg shadow">
     <form  method="POST" action="{{route('login')}}">
      @csrf 
      {{-- es algo de seguridad cross ride site --}}
       @if (session('mensaje'))
      {{-- en el controlador creamos ese session mensaje y aqui validamos si existe con un true y si existe pues lo imprimimos --}}
       <p class=" bg-red-600 text-center font-medium text-white p-2">
        {{session('mensaje')}}</p>
       @endif
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
  <div class=" mb-5 " >
    {{-- sirve para mantener la sesion abierta y recuerda siempre los nombres correctos --}}
    <input name="remember"  type="checkbox"> <label class=" font-normal text-gray-600" >Recuerdame</label>
  </div>

  <input type="submit" value="Iniciar Sesion"
        class=" bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer  font-bold text-white rounded-lg w-full  p-3  uppercase ">

      
     </form>
</div>
        
</div>


  </div>
    
@endsection