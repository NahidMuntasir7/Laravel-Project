<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return 'hello world';
});
Route::get('/greeting', function () {
    return view('greeting');
});
 
Route::get('/users', function () {
    $users = ['john', 'jane', 'joe'];
    return view('users', compact('users'));
});
