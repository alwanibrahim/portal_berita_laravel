<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;


class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $article= Article::all();
        return view('back.article.index',[
            'article' => $article
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category= Category::all();
        return view('back.article.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'judul' => 'required|min:4',
        ]);


        $data = $request->all();
        $data['slug']=Str::slug($request->judul);
        $data['user_id']=Auth::id();
        $data['views']=0;
        $data['gambar_article']= $request->file('gambar_article')->store('article');


        Article::create($data);
        
        Alert::success('berhasil', 'data berhasil disimpan');
        return redirect()->route('article.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $article = Article::find($id);
        $category = Category::all();
        return view('back.article.edit',[
            'article'=>$article,
            'category'=>$category
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if (empty($request->file('gambar_article'))) {
            $article= Article::find($id);
            $article->update([
              'body'=>$request->body,
              'judul'=>$request->judul,
              'slug'=>Str::slug($request->judul),
              'category_id'=>$request->category_id,
              'is_active'=>$request->is_active,
              'user_id'=>Auth::id(),
             
            //   'gambar_article'= $request->file('gambar_article')->store('article')
            ]);
            Alert::info('berhasil', 'data berhasil disimpan');
            return redirect()->route('article.index');

    
        }else { 
            $article= Article::find($id);
            Storage::delete($article->gambar_article);
            $article->update([
              'body'=>$request->body,
              'judul'=>$request->judul,
              'slug'=>Str::slug($request->judul),
              'category_id'=>$request->category_id,
              'is_active'=>$request->is_active,
              'user_id'=>Auth::id(),
             
              'gambar_article'=> $request->file('gambar_article')->store('article'),
            ]);
            Alert::info('berhasil', 'data berhasil disimpan');
            return redirect()->route('article.index');

    
        }
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $article = Article::find($id);
        // Storage::delete($article->gambar_article);
        $article->delete();
        Alert::warning('berhasil', 'data berhasil terhapus');
        return redirect()->route('article.index');
    }
    //fitur pencarian
    public function search(Request $request)
    {
        $query = $request->input('query'); // Ambil input pencarian
        $articles = Article::where('title', 'like', "%$query%")
                    ->orWhere('body', 'like', "%$query%")
                    ->get();
    
        return view('articles.search', compact('articles', 'query')); // Pastikan $query dikirim
    }
    
}
