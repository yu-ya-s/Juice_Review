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

Route::get('/',[Juice_Review_Controller::class,'index']);
Route::get('/new',[Juice_Review_Controller::class,'newcreate']);
Route::post('/upload',[Juice_Review_Controller::class,'upload']);
Route::post('/details/{id}',[Juice_Review_Controller::class,'details']);