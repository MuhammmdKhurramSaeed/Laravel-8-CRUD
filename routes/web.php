<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\LoginController;
// use App\Http\Middleware\loginCheck;
// use App\Http\Middleware\loginCheckAdmin;
// use App\Models\student;
// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\admin\LoginControllerAdmin;
use App\Http\Controllers\admin\DashboardControllerAdmin;
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

Route::get('/administrator', function () {

    return view('/admin/login');
});

	Route::get('/admin/login',[LoginControllerAdmin::class,'index']);
	Route::get('/admin/logout',[DashboardControllerAdmin::class,'logout']);
	Route::post('/admin/login_submit',[LoginControllerAdmin::class,'login']);
	Route::get('/admin/home',[DashboardControllerAdmin::class,'index'])->middleware('loginCheckAdmin_middleware');

	Route::group(['middleware'=>['login_check_middleware']],function(){
	Route::get('/', function () {
		return view('home');
	});
	Route::get('/home', function () {
		return view('home');
	});
	Route::GET('/insert', function () {
		return view('registration');
	});
	Route::match(['GET','Post'],'/insert_db',[StudentController::class,'store']);
	Route::get('/delete/{id}',[StudentController::class,'destroy']);
	
	Route::get('/update/{id}',[StudentController::class,'update']);
	Route::match(['GET','Post'],'/Edit/{id}',[StudentController::class,'edit']);
	});
	
	Route::get('/view',[StudentController::class,'show'])->middleware('login_check_middleware');

//fetch data in route
// Route::get('/view', function () {
//     $data['data']=student::all();
//     //return view('data_view')->with('data',$data);
//     return view('data_view',$data);
// });

Route::post('/login_submit',[LoginController::class,'login']);
Route::get('/login',[LoginController::class,'index']);
Route::get('/logout',[LoginController::class,'logout']);



