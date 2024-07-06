<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FamilyApiController;

Route::apiResource('families', FamilyApiController::class);
