<?php

use App\Models\Courses;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\HeroBackendController;
use App\Http\Controllers\Backend\AboutBackendController;
use App\Http\Controllers\Frontend\HeroFrontendController;
use App\Http\Controllers\Frontend\HomeFrontendController;
use App\Http\Controllers\Backend\ContactBackendController;
use App\Http\Controllers\Backend\CoursesBackendController;
use App\Http\Controllers\Backend\GalleryBackendController;
use App\Http\Controllers\Backend\PartnerBackendController;
use App\Http\Controllers\Backend\ServiceBackendController;
use App\Http\Controllers\Frontend\AboutFrontendController;
use App\Http\Controllers\Frontend\GaleriFrontendController;
use App\Http\Controllers\Backend\DashboardBackendController;
use App\Http\Controllers\Backend\TestimoniBackendController;
use App\Http\Controllers\Frontend\ContactFrontendController;
use App\Http\Controllers\Frontend\CoursesFrontendController;
use App\Http\Controllers\Frontend\LandingFrontendController;
use App\Http\Controllers\Frontend\ServiceFrontendController;
use App\Http\Controllers\Frontend\PartnersFrontendController;
use App\Http\Controllers\Backend\MediaSosialBackendController;
use App\Http\Controllers\Backend\TenagaKerjaBackendController;
use App\Http\Controllers\Frontend\TestimonialFrontendController;
use App\Http\Controllers\Backend\AuthenticationBackendController;

//Frontend
//landingpage
Route::get('/', [LandingFrontendController::class, 'index']);
// About
Route::get('/about', [AboutFrontendController::class, 'index']);

// Courses
Route::get('/courses', [CoursesFrontendController::class, 'index']);

// Team
Route::get('/tenagakerja', [ServiceFrontendController::class, 'index']);

// Testimonial
Route::get('/testimonial', [TestimonialFrontendController::class, 'index']);

// Contact
Route::get('/contact', [ContactFrontendController::class, 'index']);
Route::get('/contact/create', [ContactFrontendController::class,'create']);
Route::post('/contact/store', [ContactFrontendController::class,'store']);

// Service
Route::get('/service', [ServiceFrontendController::class, 'index']);

// Galeri
Route::get('/galeri', [GaleriFrontendController::class, 'index']);

// Partners
Route::get('/partners', [PartnersFrontendController::class, 'index']);

// home
Route::get('/home', [HomeFrontendController::class, 'index']);


//Backend
//Authentication
Route::get('/admin', [HeroBackendController::class, 'index'])->middleware(('auth'));
Route::get('/login', [AuthenticationBackendController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthenticationBackendController::class, 'login'])->name('login.process');
Route::post('/logout', [AuthenticationBackendController::class, 'logout'])->name('logout');

//Dashboard
//Hero
Route::get('/adminpanel/dashboard', [DashboardBackendController::class, 'index']);

//Hero
Route::get('/adminpanel/hero', [HeroBackendController::class, 'index']);
Route::get('/adminpanel/hero/create', [HeroBackendController::class,'create']);
Route::post('/adminpanel/hero/store', [HeroBackendController::class,'store']);
Route::get('/adminpanel/hero/delete/{id}', [HeroBackendController::class, 'destroy']);
Route::get('/adminpanel/hero/edit/{id}', [HeroBackendController::class,'edit']);
Route::post('/adminpanel/hero/update/{id}', [HeroBackendController::class, 'update']);
Route::post('/adminpanel/hero/toggle-active/{id}', [HeroBackendController::class, 'toggleActive']);

//About
Route::get('/adminpanel/about', [AboutBackendController::class, 'index']);
Route::get('/adminpanel/about/create', [AboutBackendController::class,'create']);
Route::post('/adminpanel/about/store', [AboutBackendController::class,'store']);
Route::get('/adminpanel/about/delete/{id}', [AboutBackendController::class, 'destroy']);
Route::get('/adminpanel/about/edit/{id}', [AboutBackendController::class,'edit']);
Route::post('/adminpanel/about/update/{id}', [AboutBackendController::class, 'update']);
Route::post('/adminpanel/about/toggle-active/{id}', [AboutBackendController::class, 'toggleActive']);


//service
Route::get('/adminpanel/service', [ServiceBackendController::class, 'index']);
Route::get('/adminpanel/service/create', [ServiceBackendController::class,'create']);
Route::post('/adminpanel/service/store', [ServiceBackendController::class,'store']);
Route::get('/adminpanel/service/delete/{id}', [ServiceBackendController::class, 'destroy']);
Route::get('/adminpanel/service/edit/{id}', [ServiceBackendController::class,'edit']);
Route::post('/adminpanel/service/update/{id}', [ServiceBackendController::class, 'update']);
Route::post('/adminpanel/service/toggle-active/{id}', [ServiceBackendController::class, 'toggleActive']);

//gallery
Route::get('/adminpanel/gallery', [GalleryBackendController::class, 'index']);
Route::get('/adminpanel/gallery/create', [GalleryBackendController::class,'create']);
Route::post('/adminpanel/gallery/store', [GalleryBackendController::class,'store']);
Route::get('/adminpanel/gallery/delete/{id}', [GalleryBackendController::class, 'destroy']);
Route::get('/adminpanel/gallery/edit/{id}', [GalleryBackendController::class,'edit']);
Route::post('/adminpanel/gallery/update/{id}', [GalleryBackendController::class, 'update']);
Route::post('/adminpanel/gallery/toggle-active/{id}', [GalleryBackendController::class, 'toggleActive']);

//contact
Route::get('/adminpanel/contact', [ContactBackendController::class, 'index']);
Route::get('/contact/create', [ContactBackendController::class,'create']);
Route::post('/contact/store', [ContactBackendController::class,'store']);
Route::get('/adminpanel/contact/delete/{id}', [ContactBackendController::class, 'destroy']);
Route::get('/adminpanel/contact/edit/{id}', [ContactBackendController::class,'edit']);
Route::post('/adminpanel/contact/update/{id}', [ContactBackendController::class, 'update']);
Route::post('/adminpanel/contact/toggle-active/{id}', [ContactBackendController::class, 'toggleActive']);

//testimoni
Route::get('/adminpanel/testimoni', [TestimoniBackendController::class, 'index']);
Route::get('/adminpanel/testimoni/create', [TestimoniBackendController::class,'create']);
Route::post('/adminpanel/testimoni/store', [TestimoniBackendController::class,'store']);
Route::get('/adminpanel/testimoni/delete/{id}', [TestimoniBackendController::class, 'destroy']);
Route::get('/adminpanel/testimoni/edit/{id}', [TestimoniBackendController::class,'edit']);
Route::post('/adminpanel/testimoni/update/{id}', [TestimoniBackendController::class, 'update']);
Route::post('/adminpanel/testimoni/toggle-active/{id}', [TestimoniBackendController::class, 'toggleActive']);

//tenaga kerja
Route::get('/adminpanel/tenagakerja', [TenagaKerjaBackendController::class, 'index']);
Route::get('/adminpanel/tenagakerja/create', [TenagaKerjaBackendController::class,'create']);
Route::post('/adminpanel/tenagakerja/store', [TenagaKerjaBackendController::class,'store']);
Route::get('/adminpanel/tenagakerja/delete/{id}', [TenagaKerjaBackendController::class, 'destroy']);
Route::get('/adminpanel/tenagakerja/edit/{id}', [TenagaKerjaBackendController::class,'edit']);
Route::post('/adminpanel/tenagakerja/update/{id}', [TenagaKerjaBackendController::class, 'update']);
Route::post('/adminpanel/tenagakerja/toggle-active/{id}', [TenagaKerjaBackendController::class, 'toggleActive']);

//partner
Route::get('/adminpanel/partner', [PartnerBackendController::class, 'index']);
Route::get('/adminpanel/partner/create', [PartnerBackendController::class,'create']);
Route::post('/adminpanel/partner/store', [PartnerBackendController::class,'store']);
Route::get('/adminpanel/partner/delete/{id}', [PartnerBackendController::class, 'destroy']);
Route::get('/adminpanel/partner/edit/{id}', [PartnerBackendController::class,'edit']);
Route::post('/adminpanel/partner/update/{id}', [PartnerBackendController::class, 'update']);
Route::post('/adminpanel/partner/toggle-active/{id}', [PartnerBackendController::class, 'toggleActive']);

//media sosial
Route::get('/adminpanel/mediasosial', [MediaSosialBackendController::class, 'index']);
Route::get('/adminpanel/mediasosial/create', [MediaSosialBackendController::class,'create']);
Route::post('/adminpanel/mediasosial/store', [MediaSosialBackendController::class,'store']);
Route::get('/adminpanel/mediasosial/delete/{id}', [MediaSosialBackendController::class, 'destroy']);
Route::get('/adminpanel/mediasosial/edit/{id}', [MediaSosialBackendController::class,'edit']);
Route::post('/adminpanel/mediasosial/update/{id}', [MediaSosialBackendController::class, 'update']);
Route::post('/adminpanel/mediasosial/toggle-active/{id}', [MediaSosialBackendController::class, 'toggleActive']);

//courses
Route::get('/adminpanel/courses', [CoursesBackendController::class, 'index']);
Route::get('/adminpanel/courses/create', [CoursesBackendController::class,'create']);
Route::post('/adminpanel/courses/store', [CoursesBackendController::class,'store']);
Route::get('/adminpanel/courses/delete/{id}', [CoursesBackendController::class, 'destroy']);
Route::get('/adminpanel/courses/edit/{id}', [CoursesBackendController::class,'edit']);
Route::post('/adminpanel/courses/update/{id}', [CoursesBackendController::class, 'update']);
Route::post('/adminpanel/courses/toggle-active/{id}', [CoursesBackendController::class, 'toggleActive']);
