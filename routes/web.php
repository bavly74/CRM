<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;
use \App\Http\Controllers\RolePermissionController;
// Route::get('/', function () {
//     return view('welcome');
// });

Route::group(
[
	'prefix' => LaravelLocalization::setLocale(),
	'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ,'auth' ]
], function(){

    Route::get('/', function () {
        return view('dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');

//    //users CRUD
//    Route::resource('user', UserController::class);

    Route::group(['prefix'=>'user'],function(){
       Route::get('/',[UserController::class,'index'])
           ->name('user.index')
           ->middleware('role:employee|admin|permission:view users');

       Route::get('/create',[UserController::class,'create'])
           ->name('user.create')
           ->middleware('role_or_permission:admin|add users');

        Route::post('/store',[UserController::class,'store'])
            ->name('user.store')
            ->middleware('role_or_permission:admin|add users');

        Route::get('/delete/{user}',[UserController::class,'delete'])
            ->name('user.delete')
            ->middleware('role_or_permission:admin|delete users');

        Route::get('/show-deleted-users',[UserController::class,'ShowDeletedUsers'])
            ->name('user.showDeletedUsers')
            ->middleware('role:admin');

        Route::get('/restore/{id}',[UserController::class,'restore'])
            ->name('user.restore')
            ->middleware('role:admin');
    });

    Route::group(['prefix'=>'roles'],function(){
        Route::get('/',[RolePermissionController::class,'index'])
            ->name('roles.index')
            ->middleware('role:admin');

        Route::get('/create',[RolePermissionController::class,'create'])
            ->name('roles.create')
            ->middleware('role:admin');

        Route::post('/store',[RolePermissionController::class,'store'])
            ->name('roles.store')
            ->middleware('role:admin');


        Route::get('/sync-permission/{id}',[RolePermissionController::class,'syncPermission'])
            ->name('roles.syncPermission')
            ->middleware('role:admin');

        Route::post('/sync-permission/{id}',[RolePermissionController::class,'StoreSyncPermission'])
            ->name('roles.StoreSyncPermission')
            ->middleware('role:admin');
    });
});


require __DIR__.'/auth.php';
