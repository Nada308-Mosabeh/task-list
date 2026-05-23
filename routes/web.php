<?php

use Illuminate\Support\Facades\Route;
use Illuminate\View\View;

Route::get(uri: '/', action:  function (): Factory|View {
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
    return view(view:'about', data: compact(var_name: 'name', var_names: 'departments'));
});
Route::post('about',function () {
    $name = $_POST['name'];
    $departments = [
        '1' => 'Tichnical',
        '2' => 'Financial',
        '3' => 'Sales'
    ];

    return view('about', data: compact('name','departments'));
});
