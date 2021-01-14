<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    //

    /**
     * Renvoi le formulaire d'enregistrement d'un nouvel utilisateur
     * 
     * @return Illuminate\Http\Response
     */
    public function create() {
        return view('users.register');
    }


    /**
     * Permet de traiter le formulaire d'enregistrement d'un nouvel utilisateur
     * 
     * @param Illuminate\Http\Request $request
     * @return Illuminate\Http\Response
     */
    public function register(Request $request) {
            //return "Un utilisateur a tenté de s'enregistrer";
        $validatedData = $request->validate([
            'pseudo' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users,email', 
            'password' => 'required|min:3|max:255',
            'password-confirmation' => 'required|same:password'
        ]);
        $user = new User(); 
        $user->name =  $validatedData['pseudo']; 
        $user->email =  $validatedData['email']; 
        $user->password =  Hash::make($validatedData['password']); 
        $user->save(); 
        return "L'utilisateur " . $validatedData['pseudo'] . " (" . $validatedData['email'] . ") a bien été enregistré, et a bien rempli le formulaire";
    }
}
