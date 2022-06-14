<?php

//use App\Http\Controllers\PostController;
use App\Http\Controllers\dashboard\PostController;
use App\Http\Controllers\dashboard\CategoryController;
use Illuminate\Support\Facades\Route;

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
    return view('/welcome'); 
})->name('home');

/*Route::get('/', function () {
    return view('home'); 
});*/


Route::resource('dashboard/post', PostController::class);
Route::post('dashboard/post/{post}/image', [PostController::class,'image'])->name('post.image');
//Route::post('dashboard/post/{post}/image', PostController::class);
Route::resource('dashboard/category', CategoryController::class);

/*Route::get('/test', function () {
    return "Hola mundo";
});

Route::get('/hola/{nombre?}', function ($nombre = "Anahi") {
    return "Hola $nombre conocenos:<a href='".route("nosotros")."'>nosotros</a>";
});

Route::get('/sobre-nosotros-en-la-web', function () {
    return "<h1>Toda la información sobre nosotros!</h1>";
})->name("nosotros");

Route::get('home/{nombre?}/{apellido?}', function ($nombre = "Erik", $apellido = "Cerda") {

    $posts = ["Posts1","Posts2","Posts3","Posts4"];
    $posts2 = null;
    //return view("home")->with("nombre",$nombre)->with("apellido",$apellido);
    return view("home",['nombre' => $nombre,'apellido'=> "$apellido",'posts' => $posts,'posts2' => $posts2]);
})->name("home");*/

//Route::get('post',[PostController::class,'index']); /* Es otra manera de utilizar el PostController */
//Route::get('post',[App\Http\Controllers\PostController::class,'index']); /* Esta es otra manera de utilizar el PostController */

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
