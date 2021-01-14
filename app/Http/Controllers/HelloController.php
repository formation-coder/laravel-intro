<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloController extends Controller
{
    
    /**
     * 
     * Dit bonjour au nom donné en paramètre
     * 
     * @param String $nom la personne à qui l'on souhaite dire bonjour
     * @return \Illuminate\Http\Response
     * 
     */
    public function sayHello($nom) {
        return view('hello', ['name' => $nom]);
    }
}
