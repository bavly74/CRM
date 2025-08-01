<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;
use \App\Http\Controllers\RolePermissionController;
use \App\Http\Controllers\ClientController;
use \App\Http\Controllers\ProjectController ;

Route::group(
[
	'prefix' => LaravelLocalization::setLocale(),
	'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ,'auth' ]
], function(){

    Route::get('/', function () {
        return view('dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');

    //users CRUD
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

    //roles CRUD
    Route::group(['prefix'=>'roles'],function(){
        Route::get('/',[RolePermissionController::class,'index'])
            ->name('roles.index')
            ->middleware('permission:view roles');

        Route::get('/create',[RolePermissionController::class,'create'])
            ->name('roles.create')
            ->middleware('permission:add roles');

        Route::post('/store',[RolePermissionController::class,'store'])
            ->name('roles.store')
            ->middleware('permission:add roles');

        Route::get('/create-permission',[RolePermissionController::class,'createPermission'])
            ->name('permission.create')
            ->middleware('role:admin');

        Route::post('/store-permission',[RolePermissionController::class,'storePermission'])
            ->name('permission.store')
            ->middleware('role:admin');

        Route::get('/sync-permission/{id}',[RolePermissionController::class,'syncPermission'])
            ->name('roles.syncPermission')
            ->middleware('permission:sync permission');

        Route::post('/sync-permission/{id}',[RolePermissionController::class,'StoreSyncPermission'])
            ->name('roles.StoreSyncPermission')
            ->middleware('permission:sync permission');
    });

    //clients CRUD
    Route::group(['prefix'=>'clients'],function(){
        Route::get('/',[ClientController::class,'index'])
            ->name('clients.index')
            ->middleware('permission:view clients');

        Route::get('/create',[ClientController::class,'create'])
            ->name('clients.create')
            ->middleware('permission:add clients');

        Route::post('/store',[ClientController::class,'store'])
            ->name('clients.store')
            ->middleware('permission:add clients');
    });

    //projects CRUD
    Route::group(['prefix'=>'projects'],function(){
        Route::get('/',[ProjectController::class,'index'])
            ->name('projects.index')
            ->middleware('permission:view projects');

        Route::get('/create',[ProjectController::class,'create'])
            ->name('projects.create')
            ->middleware('permission:add projects');

        Route::post('/store',[ProjectController::class,'store'])
            ->name('projects.store')
            ->middleware('permission:add projects');

        Route::get('/show/{project}',[ProjectController::class,'show'])
            ->name('projects.show')
            ->middleware('permission:add projects');
    });
});


require __DIR__.'/auth.php';
