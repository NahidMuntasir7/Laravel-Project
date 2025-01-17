<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Http\Request;

Route::get('/', function () {
    //    return 'hello world';
        return view('home');
    });
Route::get('/greeting', function () {
    return view('greeting');
});
 
Route::get('/users', function () {
    // $users = ['john', 'jane', 'joe'];
    $users = User::all();
    return view('users', compact('users'));
});


Route::get('/users/{id}', function ($id) {
    $user = User::find($id);
    if ($user) {
        return view('user', compact('user'));
    } else {
        return response('User not found', 404);
    }
});

Route::get('/add-user', function () {
    return view('add-user');
});

Route::post('/users', function (Request $request) {
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email|max:255',
        'password' => 'required|min:8|confirmed', // Require password confirmation
    ]);
    // Create the user
    User::create([
        'name' => $validated['name'],
        'email' => $validated['email'],
        'password' => bcrypt($validated['password']), // Hash the password
    ]);
    return redirect('/users')->with('success', 'User added successfully!');
});
