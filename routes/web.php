<?php

use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;
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
    // $role = Role::create(['name' => 'admin']);
    // $role = Role::create(['name' => 'writer']);
    // $role = Role::create(['name' => 'editor']);
    // $permission = Permission::create(['name' => 'add articles']);
    // $permission = Permission::create(['name' => 'edit articles']);
    // $permission = Permission::create(['name' => 'delete articles']);
    // $permission = Permission::findOrFail(2);
    // $role = Role::findOrFail(3);
    // $role->givePermissionTo($permission);
    // $user = User::findOrFail(3);
    // $user->assignRole('editor');
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['role:admin|writer']], function () {
    
    Route::get('/home/add', function(){
        return view('add');
    })->name('add');
    Route::post('/home/add', 'ArticleController@store');

    Route::get('/home/delete/{id}', 'ArticleController@delete')->name('delete');

});

Route::group(['middleware' => ['role:admin|editor']], function () {
    Route::get('/home/edit/{id}', 'ArticleController@edit')->name('edit');
    Route::post('/home/edit/{id}', 'ArticleController@update');
});

Route::group(['middleware' => ['role:admin']], function () {
    Route::get('/home/delete/{id}', 'ArticleController@delete')->name('delete');
    Route::post('/home/delete/{id}', 'ArticleController@remove');
});

