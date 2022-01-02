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

use App\Models\Category;
use App\Models\Product;
use App\Models\Store;
use App\Http\Controllers\Admin\StoreController;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

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

    /*$data['data'] = User::find(40)->update([
        'name' => 'carol',
        'email' => 'carol@example.br',
        'password' => bcrypt('1234534')];
     if ($data) {
        $data['status'] = '200';
        $data['msg'] = 'user updated with success!!.';
        return response()->json($data->store);
    } else {
        $data['status'] = '404';
        $data['msg'] = 'cannot update user..';
    }

    return response()->json($data);
    ]);*/

    // pegar a loja de um usuario
    //$data = User::find(34);
    // return $data->store;  // 1:1 ->retorna objecto unicp
    //return $data->store()->count();  // quantas loja o usuario tem

    //Pegar os produtos de uma loja ?
    //$stores = Store::find(9);
    //return $stores->products()->where('id',9)->get();

    //pegar as categorais de uma loja

    //$categories = Category::find(3);
    //return $categories->products;

    /**
     * 1- criar uma loja para um usuário
     * 2- criar um produto para uma loja
     * 3-criar uma  categoria
     */

    /*1- criar uma loja para um usuário
    $user = User::find(10);

    $store = $user->store()->create([
        'name' => 'Loja Teste',
        'slug' => 'loja-teste',
        'phone' => '000 000 000',
        'description' => 'loja-teste de produtos',
    ]);
    dd($store);*/

    //2- criar um produto para uma loja
    $user = Store::find(40);

    $products = $user->products()->create([
        'nome' => 'Notebook Dell',
        'slug' => 'loja-produtos',
        'description' => 'CORE I6 123TB',
        'body' => 'anything here is enough...',
        'price' => 1023, 99,
    ]);
    //return response()->json($products);

    // -> criar uma categoria

    /* $categoria = Category::create([
        'name' => 'Devices',
        'slug' => 'Devices mad  by Wayne Corporation',
        'description' => 'Computers',
    ]);

     $categoria1 = Category::create([
        'name' => 'Games',
        'slug' => 'games',
        'description' => 'football manager 2022',
    ]);
    return response()->json([$categoria,$categoria1]);

*/// -> adicionar produtos para uma categoria ou vice-versa .attach pega o id e adiciona na base de dados
    //attach()->retorna null quando o valor é adicionado
    //detach()->apaga o valor adicionado e retorna a quqntidade de items removido 1
    //sync([])->retorna full information-> remove e addiciona elementos . id de linhas que existem na base de dados
    $products = Product::find(44);
    //$dados = $products->categories()->attach([1]);
    //$dados = $products->categories()->detach([1]);
    $dados = $products->categories()->sync([1, 2]); //add
    $dados = $products->categories()->sync([1]); //remove
    dd($dados);
});

Route::prefix('admin')->namespace('Admin')->group(function () {
    Route::get('/index', 'StoreController@index')->name('admin.index');
    Route::get('/create', 'StoreController@create')->name('admin.create');
    Route::post('/store', 'StoreController@store')->name('admin.store');
    Route::get('/{store}/edit', 'StoreController@edit')->name('admin.edit');
    Route::put('/update/{store}', 'StoreController@update')->name('admin.update');
    Route::delete('/destroy/{store}', 'StoreController@destroy')->name('admin.destroy');

    //Products route
    Route::resource('product', 'ProductController');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
