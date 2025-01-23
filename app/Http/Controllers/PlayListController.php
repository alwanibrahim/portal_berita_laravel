<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PlayList;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;


class PlayListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $playlist =PlayList::all();
        return view ('back.playlist.index' ,[
            'playlist' => $playlist
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('back.playlist.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'judul_playlist' => 'required|min:4',
        ]);


        $data = $request->all();
        $data['slug']=Str::slug($request->judul_playlist);
        $data['user_id'] = Auth::id();
        $data['gambar_playlist']= $request->file('gambar_playlist')->store('playlist');


        Playlist::create($data);
        
        Alert::success('berhasil', 'data berhasil disimpan');
        return redirect()->route('playlist.index');
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
        $playlist = PlayList::find($id);
        return view ('back.playlist.edit',compact('playlist'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if (empty($request->file('gambar_playlist'))) {
            $playlist= Playlist::find($id);
            $playlist->update([
              'judul_playlist'=>$request->judul_playlist,
              'deskripsi'=>$request->deskripsi,
              'slug'=>Str::slug($request->judul_playlist),
              'is_active'=>$request->is_active,
              'user_id'=>Auth::id(),
             
            //   'gambar_article'= $request->file('gambar_article')->store('article')
            ]);
            Alert::success('berhasil', 'data berhasil terupdate');
            return redirect()->route('playlist.index');

    
        }else { 
            $playlist= Playlist::find($id);
            Storage::delete($playlist->gambar_playlist);
            $playlist->update([
              'deskripsi'=>$request->deskripsi,
              'judul'=>$request->judul_playlist,
              'slug'=>Str::slug($request->judul_playlist),
              
              'is_active'=>$request->is_active,
              'user_id'=>Auth::id(),
             
              'gambar_playlist'=> $request->file('gambar_playlist')->store('playlist'),
            ]);
            Alert::success('berhasil', 'data berhasil terupdate');
            return redirect()->route('playlist.index');

    
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $playlist = Playlist::find($id);
        // Storage::delete($playlist->gambar_playlist);
        $playlist->delete();
        Alert::warning('berhasil', 'data berhasil disimpan');
        return redirect()->route('playlist.index');
    }
}
