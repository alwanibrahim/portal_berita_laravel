<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Iklan;
use App\Models\Category;
use App\Models\Article;

class FashionController extends Controller
{
    public function index(){
        $article=Article::where('category_id', 4)->get();
        $postinganTerbaru=Article::orderBy('created_at','DESC')->limit('5')->get();
        $iklanA=Iklan::where('id','1')->first();
        $category = Category::all();



        return view('front.category.fashion',compact('article','category','iklanA','postinganTerbaru'));
    }
}
