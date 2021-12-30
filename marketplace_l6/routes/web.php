<?php

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

use App\User;
use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    return view('welcome');
});
//EXAMPLE WORKING WITH ELOQUENT
Route::get('/model', function () {

    //$data = User::all(); // all()-> return a collection of objects // select * from users;
    //$data = DB::table('users')->find(1);// retorna the element passing the id //select * from users where id =1 limit 1;
    //$data = DB::table('users')->where('id', '>', '2')->get();// retorna todos os campos na os ids são maiores que 2; select * from user where id > 2;
    $data = DB::table('users')->whereBetween('id', ['10', '67'])->get();// retorna todos os campos que então no intervalo entre 10 e 67 ;
    $data = DB::table('users')->orderBy('name','ASC')->paginate(10);//http://127.0.0.1:8000/model?page=36   paginas dados com laravel

    return response()->json($data);

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
