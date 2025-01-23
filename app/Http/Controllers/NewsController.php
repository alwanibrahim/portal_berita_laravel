<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class NewsController extends Controller
{
    public function index()
    {
        // Ambil API Key dari .env
        $apiKey = env('NEWSAPI_KEY');
        
        // URL Endpoint NewsAPI
        $url = "https://newsapi.org/v2/top-headlines";
        
        // Parameter permintaan
        $response = Http::get($url, [
            'country' => 'us', 
            'apiKey' => $apiKey
        ]);


        // Decode JSON menjadi array
        $newsData = $response->json();

        // Kirim data ke view
        return view('front.layouts.berita.index', ['articles' => $newsData['articles']]);
    }
}
