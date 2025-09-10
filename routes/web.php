<?php

use Illuminate\Support\Facades\Route;

// Halaman utama
Route::get('/', function () {
    return view('page.frontend.home.index');
});

// About
Route::get('/about', function () {
    return view('page.frontend.about');
});

// Contact
Route::get('/contact', function () {
    return view('page.frontend.contact');
});

// Courses
Route::get('/courses', function () {
    return view('page.frontend.courses');
});

// Team
Route::get('/team', function () {
    return view('page.frontend.home.team');
});

// Testimonial
Route::get('/testimonial', function () {
    return view('page.frontend.home.testimonial');
});

// 404 (optional)
Route::get('/404', function () {
    return view('page.frontend.404');
});
