<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/berita', function () {
    return view('berita');
});

Route::get('/jadwal', function () {
    return view('jadwal');
});

Route::get('/peta-venue', function () {
    return view('venue');
});

Route::get('/kesehatan', function () {
    return view('kesehatan');
});

Route::get('/galeri', function () {
    return view('galeri');
});
