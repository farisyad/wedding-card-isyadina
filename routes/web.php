<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RsvpController;

Route::get('/', function () {
    return view('card');
});

Route::post('/rsvp', [RsvpController::class, 'store']);
