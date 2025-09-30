<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PopularCourses extends Model
{
    // Pastikan ini menunjuk ke tabel `popularcourses` di database
    protected $table = 'popular_courses';

    // Boleh diisi semuanya (mass assignment)
    protected $guarded = [];
}
