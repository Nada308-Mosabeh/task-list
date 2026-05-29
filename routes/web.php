<?php

use App\Http\Controllers\Taskcontroller;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    return view(view:'welcome');
});

Route::get('/about', function () {
    $name='Nada';
    $departments = [
        '1' => 'Tichnical',
        '2' => 'Financial',
        '3' => 'Sales'
    ];
    //return view('about' , compact ('name'))->with(key: 'name', value: $name);
    //return view(view:'about', data: ['name'=> $name]);
    return view('about', compact('name','departments'));
});
Route::post('about',function () {
    $name = $_POST['name'];
    $departments = [
        '1' => 'Tichnical',
        '2' => 'Financial',
        '3' => 'Sales'
    ];

    return view('about',compact('name','departments'));
});
Route::get('tasks', [Taskcontroller::class, 'index']);

Route::post('create', action: [Taskcontroller:: class, 'create']);

Route::post('delete/{id}',action: [Taskcontroller:: class, 'destroy']);

Route::post('edit/{id}',action: [Taskcontroller:: class, 'edit']);

Route::post('update',action: [Taskcontroller:: class, 'update']);

Route::get('app', function(){
    return view('layouts.app');
});

Route::get('users', [UserController::class, 'index']);

Route::post('user/create', [UserController::class, 'create']);

Route::post('user/delete/{id}', [UserController::class, 'destroy']);

Route::post('user/edit/{id}', [UserController::class, 'edit']);

Route::post('user/update', [UserController::class, 'update']);
