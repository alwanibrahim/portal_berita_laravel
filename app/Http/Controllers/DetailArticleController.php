<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class DetailArticleController extends Controller
{
    public function detail($title)
    {
        // URL API
        $apiUrl = "https://example.com/api/articles"; // Ganti dengan URL API Anda

        // Fetch data dari API
        $response = Http::get($apiUrl);

        if ($response->successful()) {
            // Dump respons API untuk debugging
            $articles = $response->json();

            // Pastikan data benar
            if (!is_array($articles)) {
                return abort(500, 'Format data dari API tidak sesuai.');
            }

            // Cari artikel berdasarkan judul
            $article = collect($articles)->firstWhere('title', $title);

            if ($article) {
                return view('front.article.detail-article', compact('article'));
            } else {
                return abort(404, 'Artikel tidak ditemukan.');
            }
        } else {
            // Debug kesalahan
            return abort(500, 'Gagal mengambil data dari API. Status: ' . $response->status());
        }
    }
}
