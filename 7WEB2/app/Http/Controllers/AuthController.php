<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
   function showRegister(){
    return view('authentication.register');

   }
   function showLogin(){
   return view('authentication.login');

   }
   function performRegister(){

   }
   function performLogin(){

   }
   

}
