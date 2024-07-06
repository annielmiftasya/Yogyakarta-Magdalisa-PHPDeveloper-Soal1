<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\FamilyController;

// Route::get('/', function () {
//     return view('welcome');
// });




Route::resource('families', FamilyController::class);
