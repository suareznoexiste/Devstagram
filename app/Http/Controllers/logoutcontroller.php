<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class logoutcontroller extends Controller
{
    //
    public function store(){
    auth()->logout();
    return redirect()->route('login');
    }
}
