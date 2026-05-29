<?php

use App\Http\Controllers\Admin\MemberController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('/admin')->group(function () { 
    Route::resource('/member', MemberController::class);
});
