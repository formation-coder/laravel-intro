<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\{HelloController, RegisterController, LoginController, SkillController};
use App\Models\User;
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



Route::get('/register', [RegisterController::class, 'create'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/login', [LoginController::class, 'showForm'])->name('login.form');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');


/*
Route::get('/hello/{nom}', function ($nom) {
    return view('hello', ['name' => $nom]);
});
*/

// On utilise maintenant le HelloController : 
Route::get('/hello/{nom}', [HelloController::class, 'sayHello']);

// ----------- Routes pour les compétence ---------------- //
Route::get('/skills', [SkillController::class, 'index'])->name('skills.index');
Route::get('/skills/create', [SkillController::class, 'create'])->name('skills.create');