<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Auth, Hash};
use App\Models\User;

class LoginController extends Controller
{
    //

    /**
     * Affiche la vue contenant le formulaire de connexion
     * 
     * @return Illuminate\Http\Response
     */
    public function showForm() {
        return view('users.login'); 
    }

    /**
     * Traite le formulaire de connexion
     * 
     * @param Illuminate\Http\Request $request
     * @return Illuminate\Http\Response
     */
    public function login(Request $request) {
        /*
        // ça c'est notre code, il était bien, assez bien, mais pas top....
        // Récupération et validation des données du formulaire
        $validatedData = $request->validate([
            'email' => 'email|required', 
            'password' => 'required'
        ]);
        // On récupère l'utilisateur dans la base de données, à partir de son email
        $user = User::where('email', $validatedData['email'])->first();
        // On teste le mot de passe saisi avec le mot de passe dans la base (qui est hashé)
        $ok = Hash::check($validatedData['password'], $user->password);
        if(!$ok) {
            return response('Non authorisé', 401);
        } else {
            return 'ok'; 
        }
        */
        // On prend le code fourni par la doc, parcequ'il savent ce qu'ils racontent (enfin j'espère....)
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect('/');
        }

        return back()->withErrors([
            'email' => 'Les données fournies ne permettent pas de vous identifier. Merci de réessayer ou de m\'envoyer un chèque de 25000 €',
        ]);
    }

    /**
     * Permet à l'utilisateur de se déconnecter => désactive sa session coté serveur
     *
     * @return void
     */
    public function logout() {

    }

}
