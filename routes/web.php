<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticationController;
use App\Http\Controllers\Posts\PostController;

Route::get('/', function () {
    return view('welcome');
});


/* AUTHENTICATION - Start*/
Route::controller(AuthenticationController::class)->group(function () {

    Route::middleware(['CheckLoginStatusMiddleware'])->group(function () {
        Route::get('/', 'login');
        Route::get('/login', 'login');
        Route::get('/register', 'register');
    });

    Route::get('/account', 'account')->middleware('AuthenticationMiddleware');
    Route::post('/updateProfilePicture', 'updateProfilePicture');


    Route::post('/loginProcess', 'loginProcess');
    Route::post('/registerProcess', 'registerProcess');
    Route::get('/logout', 'logout');
});





/* AUTHENTICATION - End*/
Route::resource('posts', PostController::class)->middleware('AuthenticationMiddleware');;

/* POSTS MANAGEMENT - End*/

/* POSTS MANAGEMENT - End*/



