<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    // Tambahkan baris ini agar Laravel mengizinkan pengisian data otomatis
    protected $fillable = ['sort_order','type', 'category', 'src', 'thumbTime'];
}