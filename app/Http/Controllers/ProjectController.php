<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project; // Memanggil model Project

class ProjectController extends Controller
{
    // Fungsi untuk mengambil semua data (GET)
    public function index()
    {
        $projects = Project::all();
        return response()->json($projects);
    }

    // Fungsi untuk menyimpan data baru (POST) dengan PIN Keamanan
    public function store(Request $request)
    {
        // 1. CEK KEAMANAN (Gembok PIN)
        if ($request->secret_pin !== 'absyal20') {
            return response()->json([
                'success' => false,
                'message' => 'Akses Ditolak! PIN rahasia salah.'
            ], 403);
        }

        // 2. Jika PIN benar, lanjut validasi data
        $validated = $request->validate([
            'type' => 'required|string',
            'category' => 'required|string',
            'src' => 'required|url',
            'thumbTime' => 'nullable|string',
        ]);

        // 3. Simpan ke database MySQL
        $project = Project::create($validated);

        // 4. Kirim respon balik ke React kalau sukses
        return response()->json([
            'success' => true,
            'message' => 'Project baru berhasil disimpan!',
            'data' => $project
        ], 201);
    }

    // Fungsi untuk menghapus data (DELETE) dengan PIN Keamanan
    public function destroy(Request $request, $id)
    {
        // 1. Cek Keamanan PIN (Gembok PIN)
        if ($request->secret_pin !== 'absyal20') {
            return response()->json([
                'success' => false,
                'message' => 'Akses Ditolak! PIN rahasia salah.'
            ], 403);
        }

        // 2. Cari project berdasarkan ID
        $project = Project::find($id);

        // Jika datanya tidak ada
        if (!$project) {
            return response()->json([
                'success' => false,
                'message' => 'Project tidak ditemukan.'
            ], 404);
        }

        // 3. Eksekusi penghapusan dari database Aiven
        $project->delete();

        // 4. Kirim pesan sukses
        return response()->json([
            'success' => true,
            'message' => 'Project berhasil dihapus!'
        ]);
    }
}