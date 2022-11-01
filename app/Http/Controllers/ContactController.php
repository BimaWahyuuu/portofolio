<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\Kontak;
use App\Models\Jenis_Kontak;
use File;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Siswa::all('id','nisn','nama');
        return view('MasterContact',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('master_contact.create');
    }

    public function newcontact($id)
    {
        $jenis_kontak = Jenis_Kontak::all();
        $Siswa = Siswa::find($id);
        return view ('master_contact.create', compact('Siswa','jenis_kontak'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages=[
            'required' => ':attribute harus diisi dulu',
            'min' => ':attribute minimal :min karakter',
            'max' => ':attribute maksimal :max karakter',
            'size' => 'file yang diupload maksimal :size'
        ];
        $this->validate($request,[
            'jenis_kontak' => 'required',
            'deskripsi' => 'required'
        ], $messages);

        //Proses Insert Database
        Kontak::create([
            'siswa_id' => $request->siswa_id,
            'jenis_id' => $request->jenis_kontak,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect('/mastercontact');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $siswa = Siswa::find($id);
        $kontak = $siswa->kontak;
        return view('master_contact.show',compact('kontak'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jenis_kontak = Jenis_Kontak::all();
        $kontak = Kontak::find($id);
        return view('master_contact.edit', compact('kontak','jenis_kontak'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function ubah(Request $request,$id)
    {
        $kontak = Kontak::find($id);
        $kontak->siswa_id = $request->siswa_id;
        $kontak->jenis_id = $request->jenis_kontak;
        $kontak->deskripsi = $request->deskripsi;
        $kontak->save();
        return redirect ("/mastercontact");
    }

    public function hapus($id)
    {
        $data=Kontak::find($id)->delete();
        return redirect('/mastercontact');
    }
}
