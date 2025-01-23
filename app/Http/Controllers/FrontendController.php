<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Article;
use App\Models\Slide;
use App\Models\Iklan;
use Illuminate\Support\Facades\Http; // Tambahkan ini
use Illuminate\Support\Facades\Auth;



class FrontendController extends Controller
{
    public function index()
    {if (!Auth::check()) {
        return redirect('/get-started'); // Arahkan ke halaman landing-page
    }

    // Jika pengguna sudah login, ambil data dari model
    $category = Category::all();
    $article = Article::all();
    $slide = Slide::all();

    // Contoh pengambilan data dari API (jika digunakan)
    // $apiKey = env('NEWSAPI_KEY');
    // $url = "https://newsapi.org/v2/top-headlines";
    // $response = Http::get($url, [
    //     'country' => 'jp',
    //     'apiKey' => $apiKey
    // ]);
    // $newsData = $response->json();
    // $articles = $newsData['articles'] ?? [];

    // Return data ke view
    return view('front.home', [
        'category' => $category,
        'article' => $article,
        'slide' => $slide,
        // 'articles' => $articles // Aktifkan jika API digunakan
    ]);

    }
    
    public function detail($slug){
        $category = Category::all();

        $slide=Slide::all();

        $iklanA=Iklan::where('id','1')->first();
        $article=Article::all();
        $article=Article::where('slug',$slug)->first();

        $postinganTerbaru=Article::orderBy('created_at','DESC')->limit('5')->get();

        return view ('front.article.detail-article',[
            'article'=>$article,
            'category'=>$category,
            'slide'=>$slide,
            'iklanA'=>$iklanA,
            'postinganTerbaru'=>$postinganTerbaru
        ]);
    }
    
    public function article_category()
{
    // Ambil semua kategori
    $category =Category::all();
        $article =Article::all();
        $slide=Slide::all();
        return view('front.home',[
            'category'=>$category,
            'article'=>$article,
            'slide'=>$slide
        ]);

    // Ambil semua artikel dari setiap kategori
    $articleall = [];
    foreach ($category as $cat) {
        $articleall[] = $cat->article()->get(); // Mengambil artikel dari kategori
    }

    return $articleall;
}
}
