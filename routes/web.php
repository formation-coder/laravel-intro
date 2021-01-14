<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\HelloController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/canard', function() {
    return 'Coincoin';
});
// Route::get('/{param}', function($param) {
//     return $param; 
// });

Route::get('/login', function() {
    return 'Page de connexion';
})->name('login');

Route::get('/register', function() {
    return view('users.register');
})->name('register');

Route::post('/register', function(Request $request) {
    //return "Un utilisateur a tenté de s'enregistrer";
    $validatedData = $request->validate([
        'pseudo' => 'required|max:255',
        'email' => 'required|email|max:255', 
        'password' => 'required|min:3|max:255',
        'password-confirmation' => 'required|same:password'
    ]);
    // Si la fonction $request->validate échoue, une erreur est renvoyée et le code qui suit n'est pas executé
    return "L'utilisateur " . $request['pseudo'] . " (" . $request->input('email') . ") a tenté de s'enregistrer, et a bien rempli le formulaire";
});


/*
Route::get('/hello/{nom}', function ($nom) {
    return view('hello', ['name' => $nom]);
});
*/

// On utilise maintenant le HelloController : 
Route::get('/hello/{nom}', [HelloController::class, 'sayHello']);