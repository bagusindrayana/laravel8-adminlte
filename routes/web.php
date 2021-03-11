<?php

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

$ctrl = 'App\Http\Controllers';

Route::get('/', function () {
    return redirect(route('login'));
});

Route::group(['prefix'=>'admin','middleware'=>['auth']],function()use($ctrl){
    Route::group(['as'=>'admin.'],function()use($ctrl){
        Route::get('/',$ctrl.'\DashboardController@index')->name('dashboard');
        //bagian sub menu pengaturan
        Route::resource('group',$ctrl.'\GroupController');
        Route::resource('user',$ctrl.'\UserController');
    });
    

    Route::group(['prefix'=>'datatable','as'=>'datatable.'],function()use($ctrl){
        Route::get('group',$ctrl.'\GroupController@datatable')->name('group');
        Route::get('user',$ctrl.'\UserController@datatable')->name('user');
    });
});



// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');
