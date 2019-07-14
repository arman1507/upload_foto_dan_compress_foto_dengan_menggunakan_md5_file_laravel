<?php

namespace App\Http\Controllers;

use App\ModelMahasiswa;
use Illuminate\Http\Request;

class Mahasiswa extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = ModelMahasiswa::all();
        return view('mahasiswa',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mahasiswa_create');//
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $data = new ModelMahasiswa();
       $data->nama = $request->nama;
       $data->alamat = $request->alamat;
       $data->file = $request->file;
       $ext = $data->file->getClientOriginalName();
       $data->file->move('uploads/file',$ext);
       $data->file = $ext;
      // $data->md5 = md5_file($ext);
       $data->save();
       return redirect()->route('mahasiswa.index')->with('alert-success','Berhasil Menambahkan Data');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = ModelMahasiswa::where('id',$id)->get();

        return view('mahasiswa_edit',compact('data')); //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = ModelMahasiswa::where('id',$id)->first();
        $data->nama = $request->nama;
        $data->alamat = $request->alamat;
        $file = $request->file('file');
        $ext = $file->getClientOriginalName();
        $file->move('uploads/file',$ext);
        $data->file = $ext;
        $data->save();
        return redirect()->route('mahasiswa.index')->with('alert-success','Data berhasil diubah!');//
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=ModelMahasiswa::where('id',$id)->first();
        $data->delete();
        return redirect()->route('mahasiswa.index')->with('alert-success','Data berhasi dihapus!');//
    }
}
