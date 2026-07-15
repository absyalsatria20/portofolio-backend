<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project; // Memanggil model Project

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Memasukkan data karya-karyamu secara otomatis ke MySQL
        Project::insert([
            ['type' => 'image', 'category' => 'graphic', 'src' => 'https://res.cloudinary.com/vkyl7elo/image/upload/q_auto,f_auto/v1783665407/POSTER_PRODUK_RPA8_A4_zwldz1.jpg', 'thumbTime' => null],
            ['type' => 'video', 'category' => 'motion', 'src' => 'https://res.cloudinary.com/vkyl7elo/video/upload/q_auto,f_auto/v1783665426/ICARUS_MOTION_FINAL_WINGS_FIX_qx0zyu.mp4', 'thumbTime' => '11'],
            ['type' => 'video', 'category' => 'motion', 'src' => 'https://res.cloudinary.com/vkyl7elo/video/upload/q_auto,f_auto/v1783665405/BORDER_ATAS_MOTION_SERBA_10k_FINAL_wi5pee.mp4', 'thumbTime' => '6'],
            ['type' => 'image', 'category' => 'graphic', 'src' => 'https://res.cloudinary.com/vkyl7elo/image/upload/q_auto,f_auto/v1783665396/SUPOTSU_LIVE_posting_rnj6if.jpg', 'thumbTime' => null],
            ['type' => 'video', 'category' => 'motion', 'src' => 'https://res.cloudinary.com/vkyl7elo/video/upload/q_auto,f_auto/v1783665426/7.7_SALE_BANNER_SOSMED_SUPOTSU_kctwov.mp4', 'thumbTime' => '1.5'],
            ['type' => 'image', 'category' => 'graphic', 'src' => 'https://res.cloudinary.com/vkyl7elo/image/upload/q_auto,f_auto/v1783665392/7.7_BANNER_SUPOTSU_aa6nzd.jpg', 'thumbTime' => null]
        ]);
    }
}