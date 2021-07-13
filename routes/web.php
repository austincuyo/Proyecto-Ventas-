<?php

use Illuminate\Support\Facades\Route;
use App\User;
use App\Permission\Models\Role;
use App\Permission\Models\Permission;
use Illuminate\Support\Facades\Gate;
use App\Product;
use App\Category;

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
    /*
    $prod= Product::findOrFail(1);
    $prod->slug= 'producto-3';
    $prod->save();
    return $prod;
    */
    /*
    $prod = new Product();
    $prod->nombre = 'Producto 3';
    $prod->slug = 'Producto 3';
    $prod->category_id = 1;
    $prod->descripcion_corta = 'Producto';
    $prod->descripcion_larga = 'Producto';
    $prod->especificaciones = 'Producto';
    $prod->datos_de_interes = 'Producto';
    $prod->estado = 'Nuevo';
    $prod->activo = 'Si';
    $prod->sliderprincipal = 'No'; 
    $prod->save();
    return $prod;
    */
    //return view('welcome');
   /* $cat = Category::find(2)->products;
    return $cat;*/
    return view('tienda.index');

});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/test', function () {

    $user=User::find(2);
   // $user->roles()->sync([2]);   
   Gate::authorize('haveaccess','role.show');
   return $user;
    //return $user->havePermission('role.create');
});

Route::resource('/role', 'RoleController')->names('role');
Route::resource('/user', 'UserController', ['except'=> ['create','store']])->names('user');

Route::get('/admin', function () {

    return view('plantilla.admin');
})->name('admin');
Route::resource('admin/category','Admin\AdminCategoryController')->names('admin.category');
Route::resource('admin/product','Admin\AdminProductController')->names('admin.product');
Route::get('cancelar/{ruta}', function ($ruta) {
     return redirect()->route($ruta)->with('cancelar','Accion Cancelada!');  
})->name('cancelar');
