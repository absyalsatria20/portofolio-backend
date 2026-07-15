<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    // Tambahkan baris ini agar Laravel mengizinkan pengisian data otomatis
    protected $fillable = ['type', 'category', 'src', 'thumbTime'];
}