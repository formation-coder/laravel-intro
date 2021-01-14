<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
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
    return "Un utilisateur a tenté de s'enregistrer";
});

Route::get('/hello/{nom}', function ($nom) {
    return view('hello', ['name' => $nom]);
});