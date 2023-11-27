<?php

use App\Http\Controllers\CrudContoller;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get("/", [CrudContoller::class,"index"])->name("crud.index");
//ruta para crea empleao

Route::post("/agregar-empleado", [CrudContoller::class,"create"])->name("crud.create");

//ruta para modificar
Route::put("/editar-empleado", [CrudContoller::class,"update"])->name("crud.update");

//ruta para modificar
Route::get("/eliminar-empleado-{id}", [CrudContoller::class,"delete"])->name("crud.delete");





