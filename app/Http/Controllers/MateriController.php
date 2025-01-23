<?php

namespace App\Http\Controllers;
use App\Models\Meteri;
use App\Models\PlayList;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;



use Illuminate\Http\Request;

class MateriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $meteri =Meteri::all();
        return view ('back.meteri.index',compact('meteri'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $playlist =PlayList::all();
        return view ('back.meteri.create',compact('playlist'));
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'judul_materi' => 'required|min:4',
        ]);


        $data = $request->all();
        $data['slug']=Str::slug($request->judul_materi);
        $data['user_id'] = Auth::id();
        $data['gambar_materi']= $request->file('gambar_materi')->store('materi');


        Meteri::create($data);
        
        Alert::success('berhasil', 'data berhasil disimpan');
        return redirect()->route('meteri.index');
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
        $meteri= Meteri::find($id);
        $playlist =PlayList::all();

        return view ('back.meteri.edit',compact('meteri','playlist'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request,[
            'judul_materi' => 'required|min:4',
        ]);
       if (!empty($request->file('gambar_materi'))) {
        $data = $request->all();
        $data['slug']=Str::slug($request->judul_materi);
        $data['gambar_materi']= $request->file('gambar_materi')->store('materi');

        $meteri =Meteri::findOrFail($id);
        Storage::delete($meteri->gambar_materi);
        $meteri->update($data);
        Alert::info('berhasil', 'data berhasil terupdate');
        return redirect()->route('meteri.index');

       }else{
        $data = $request->all();
        $data['slug']=Str::slug($request->judul_materi);

        $meteri =Meteri::findOrFail($id);
        $meteri->update($data);
        return redirect()->route('meteri.index')->with(['succes'=>'Data Berhasil terupdate']);

       }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $meteri = Meteri::find($id);
        // Storage::delete($meteri->gambar_meteri);
        $meteri->delete();
        return redirect()->route('meteri.index')->with(['succes'=>'Data Berhasil terhapus']);
    }
}
