<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Iklan;
use App\Models\Category;
use App\Models\Article;

class TravelController extends Controller
{
    public function index(){
        $article=Article::where('category_id', 7)->get();
        $postinganTerbaru=Article::orderBy('created_at','DESC')->limit('5')->get();
        $iklanA=Iklan::where('id','1')->first();
        $category = Category::all();



        return view('front.category.travel',compact('article','category','iklanA','postinganTerbaru'));
    }
}
