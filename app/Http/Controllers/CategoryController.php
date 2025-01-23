<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
       
            // Jika tidak ada pencarian, ambil semua data dengan paginate
            $categories = Category::all();
        
    
        // Kembalikan view dengan data kategori
        return view('back.category.index', compact('categories'));
    }
    
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('back.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name_category' => 'required|min:4',
        ]);
        $category = Category::create([
            'name_category'=> $request ->name_category,
            'slug'=> Str::slug($request ->name_category) //ini untuk membuat data baru di data base setelah menyimpan nya
        ]);
        Alert::success('berhasil', 'data berhasil disimpan');

        return redirect()->route('category.index');
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
        $category = Category::find($id);
        return view('back.category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->name_category);
        $category = Category::findOrFail($id);
        $category ->update($data);
        Alert::info('berhasil', 'data berhasil disimpan');
        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        
        $category->delete();
        Alert::warning('berhasil', 'data berhasil terhapus');

        return redirect()->route('category.index');
    }

    
}
