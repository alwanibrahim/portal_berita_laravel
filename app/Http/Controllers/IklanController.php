<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Iklan;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;




class IklanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $iklan= Iklan::all();
        return view('back.iklan.index',compact('iklan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        $iklan=Iklan::find($id);
        return view('back.iklan.edit',compact('iklan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if(!empty($request->file('gambar_iklan'))){
            $data= $request->all();
            $data['gambar_iklan']=$request->file('gambar_iklan')->store('iklan');
            $iklan=Iklan::findOrFail($id);
            Storage::delete($iklan->gambar_iklan);
            $iklan->update($data);

            Alert::success('berhasil', 'data berhasil terupdaten');
            return redirect()->route('iklan.index');
        }else{
            $data= $request->all();
            $iklan=Iklan::findOrFail($id);
            $iklan->update($data);

            Alert::success('berhasil', 'data berhasil terupdate');
            return redirect()->route('iklan.index');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
