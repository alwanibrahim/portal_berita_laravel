<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Komentar;
use Illuminate\Support\Facades\Auth;



class KomentarController extends Controller
{
    public function store(Request $request)
    {
        // Validasi input komentar
        $request->validate([
            'konten' => 'required|string|max:1000',
            'forum_id' => 'required|integer', // Tambahkan forum_id bila dibutuhkan
        ]);
        

        $data = [
            'konten' => $request->input('konten'),
            'user_id' => Auth::id(),
            'forum_id' => $request->input('forum_id'), // Pastikan ada forum_id
            'parent' => $request->input('parent', 0), // Default parent adalah 0
        ];
        
        // Logika untuk menyimpan komentar, misalnya ke database
        Komentar::create($data);

        return redirect()->back()->with('success', 'Komentar berhasil dikirim!');
    }
}
