<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    // 1. Ambil data berdasarkan urutan (sort_order)
    public function index()
    {
        $projects = Project::orderBy('sort_order', 'asc')->get();
        return response()->json($projects);
    }

    // 2. Simpan data baru (otomatis ditaruh di urutan paling akhir)
    public function store(Request $request)
    {
        if ($request->secret_pin !== 'absyal20') {
            return response()->json(['success' => false, 'message' => 'Akses Ditolak! PIN rahasia salah.'], 403);
        }

        $validated = $request->validate([
            'type' => 'required|string',
            'category' => 'required|string',
            'src' => 'required|url',
            'thumbTime' => 'nullable|string',
        ]);

        $lastOrder = Project::max('sort_order');
        $validated['sort_order'] = $lastOrder ? $lastOrder + 1 : 1;

        $project = Project::create($validated);

        return response()->json(['success' => true, 'message' => 'Project baru berhasil disimpan!', 'data' => $project], 201);
    }

    // 3. Hapus data
    public function destroy(Request $request, $id)
    {
        if ($request->secret_pin !== 'absyal20') {
            return response()->json(['success' => false, 'message' => 'Akses Ditolak! PIN rahasia salah.'], 403);
        }

        $project = Project::find($id);
        if (!$project) {
            return response()->json(['success' => false, 'message' => 'Project tidak ditemukan.'], 404);
        }

        $project->delete();
        return response()->json(['success' => true, 'message' => 'Project berhasil dihapus!']);
    }

    // 4. FUNGSI BARU: Menyimpan susunan layout baru
    public function reorder(Request $request)
    {
        if ($request->secret_pin !== 'absyal20') {
            return response()->json(['success' => false, 'message' => 'Akses Ditolak! PIN rahasia salah.'], 403);
        }

        foreach ($request->items as $item) {
            Project::where('id', $item['id'])->update(['sort_order' => $item['sort_order']]);
        }

        return response()->json(['success' => true, 'message' => 'Susunan layout berhasil disimpan!']);
    }
}