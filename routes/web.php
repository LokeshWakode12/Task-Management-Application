<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Session;

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

Route::view('/login',"Login");
Route::view('/register',"Register");

Route::post('/send_register_data',[AuthController::class,'Register']);
Route::post('/send_login_data',[AuthController::class,'Login']);

Route::group(['middleware'=>['pageProtected']],function(){
    
    Route::view('/seetask',"seetask");
    Route::view('/dashboard',"Dashboard")->name('dashboard');
    Route::get('/logout',function(){
        Session::pull('userid');
        return redirect('/');    
    });

    Route::post('/addtask',[AuthController::class,'addTask']);
    Route::get('userstable', [AuthController::class, 'taskData'])->name('task_detail');

    //---------------- Crud Operation Routes--------------------
    Route::get('/watchMe/{id}',[AuthController::class,'seeMe']);
    Route::get('/delete/{id}', [TaskController::class,'deleteTask']);
    Route::get('/changestatus/{id}', [TaskController::class,'changeStatus']);
    Route::post('/updatetask', [TaskController::class,'updateDetails']);
});

