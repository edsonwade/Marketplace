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

    // $data = DB::table('users')->whereBetween('id', ['10', '67'])->get();// retorna todos os campos que então no intervalo entre 10 e 67 ;
    // $data = DB::table('users')->orderBy('name', 'ASC')->paginate(10);//http://127.0.0.1:8000/model?page=36   paginas dados com laravel

    //Mass Assigment -> Atribuição em Massa create([]) salva automaticamente , precisa que o model tenha o metodo fillable


 /*   $data[''] = User::create([
        'name' => 'pedro augusto',
        'email' => 'pedroaugusto@example.br',
        'password' => bcrypt('12345')
    ]);
    if (!$data) {
        $data['status'] = '200';
        $data['msg'] = 'user created with success!!.';

    } else {
        $data['status'] = '404';
        $data['msg'] = 'cannot created user..';
    }*/

    //Mass update -> return true or false

    $data['data'] = User::find(100)->update([
        'name' => 'carol',
        'email' => 'carol@example.br',
        'password' => bcrypt('1234534')
    ]);
    if ($data) {
        $data['status'] = '200';
        $data['msg'] = 'user updated with success!!.';

    } else {
        $data['status'] = '404';
        $data['msg'] = 'cannot update user..';
    }

    return response()->json($data);


});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
