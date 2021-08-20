<?php
use App\Http\Controllers\RapportController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\PaiementController;
use App\Http\Controllers\ServantsController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MenuController;

use App\Models\Category;
use Illuminate\Routing\Controller;
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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
Route::get("/categories", [CategoryController::class,"index"])->name("categories");
Route::get('categories/create', [CategoryController::class,"create"])->name("categories.create");
Route::post('categories/create', [CategoryController::class,"store"])->name("categories.store");
Route::get('categories/{id}', [CategoryController::class,"edit"])->name("categories.edit");
Route::put('categories/{id}', [CategoryController::class,"update"])->name("categories.update");
Route::delete('categories/{id}', [CategoryController::class,"destroy"])->name("categories.destroy");



//routes for table
Route::get("/tables", [TableController::class,"index"])->name("tables");
Route::get('tables/create', [TableController::class,"create"])->name("tables.create");
Route::post('tables/create', [TableController::class,"store"])->name("tables.store");
Route::get('tables/{id}', [TableController::class,"edit"])->name("tables.edit");
Route::put('tables/{id}', [TableController::class,"update"])->name("tables.update");
Route::delete('tables/{id}', [TableController::class,"destroy"])->name("tables.destroy");

//routes for servant
Route::get("/serveurs", [ServantsController::class,"index"])->name("serveurs");
Route::get('serveurs/create', [ServantsController::class,"create"])->name("serveurs.create");
Route::post('serveurs/create', [ServantsController::class,"store"])->name("serveurs.store");
Route::get('serveurs/{id}', [ServantsController::class,"edit"])->name("serveurs.edit");
Route::put('serveurs/{id}', [ServantsController::class,"update"])->name("serveurs.update");
Route::delete('serveurs/{id}', [ServantsController::class,"destroy"])->name("serveurs.destroy");

//routes for menus
Route::get("/menus", [MenuController::class,"index"])->name("menus");
Route::get('menus/create', [MenuController::class,"create"])->name("menus.create");
Route::post('menus/create', [MenuController::class,"store"])->name("menus.store");
Route::get('menus/{id}', [MenuController::class,"edit"])->name("menus.edit");
Route::put('menus/{id}', [MenuController::class,"update"])->name("menus.update");
Route::delete('menus/{id}', [MenuController::class,"destroy"])->name("menus.destroy");

//routes for Rapport
Route::get('/paiement','PaiementController@index')->name("paiement.index");

//routes for Sales

Route::get("/sales", [SalesController::class,"index"])->name("sales.index");
Route::get('sales/create', [SalesController::class,"create"])->name("sales.create");
Route::post('sales/create', [SalesController::class,"store"])->name("sales.store");
Route::get('sales/{id}', [SalesController::class,"edit"])->name("sales.edit");
Route::put('sales/{id}', [SalesController::class,"update"])->name("sales.update");
Route::delete('sales/{id}', [SalesController::class,"destroy"])->name("sales.destroy");
//routes for Rapport
Route::get("/rapports", [RapportController::class,"index"])->name("rapports.index");


//Route::get('/rapports','RapportController@index')->name("rapports.index");
Route::post('rapports/generate', 'RapportController@generate')->name("rapports.generate");
Route::post('rapports/export', 'RapportController@export')->name("rapports.export");





