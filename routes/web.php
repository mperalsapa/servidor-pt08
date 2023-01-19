<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\athlete;
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

Route::get('/', [athlete::class, "showList"])->name("index");

Route::get('/add', [athlete::class, "showForm"])->name("addAthleteForm");
Route::post('/add', [athlete::class, "formAction"])->name("addAthleteAction");
