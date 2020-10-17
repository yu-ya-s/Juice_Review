<?php

use App\Http\Controllers\Juice_Review_Controller;
use App\Models\Juice_Review;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[Juice_Review_Controller::class,'list']);
Route::get('/new',[Juice_Review_Controller::class,'newcreate']);
Route::post('/upload',[Juice_Review_Controller::class,'upload']);
Route::post('/details/{id}',[Juice_Review_Controller::class,'details']);
Route::get('/search',[Juice_Review_Controller::class,'search']);
Route::post('/delete/{id}',[Juice_Review_Controller::class,'delete']);
Route::get('/edit/{id}', [Juice_Review_Controller::class,'edit']);
Route::post('/update/{id}',[Juice_Review_Controller::class,'update']);