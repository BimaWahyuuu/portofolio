<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use File;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Siswa::all();
        return view('MasterSiswa', compact('data'));

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('master_siswa.create');
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
            'numeric' => ':attribute harus diisi angka',
            'mimes' => 'file :attribute harus bertipe jpg, png, jpeg',
            'size' => 'file yang diupload maksimal :size'
        ];
        $this->validate($request,[
            'nisn' => 'required|numeric|min:5',
            'nama' => 'required|min:5|max:20',
            'email' => 'required' ,
            'jenis_kelamin' => 'required',
            'alamat' => 'required|min:5',
            'about' => 'required|min:10',
            'foto' => 'mimes:jpg,jpeg,png,gif,svg'
        ], $messages);

        //ambil informasi yang di upload
        $file = $request->file('foto');

        //rename + ambil nama file
        $nama_file = time()."_".$file->getClientOriginalName();

        //proses upload
        $tujuan_upload = './template/img';
        $file->move($tujuan_upload,$nama_file);

        //Proses Insert Database
        Siswa::create([
            'nisn' => $request->nisn,
            'nama' => $request->nama,
            'email' => $request->email ,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'about' => $request->about,
            'foto' => $nama_file
        ]);

        return redirect('/mastersiswa');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Siswa::find($id);
        $kontak = $data->kontak;
        $projek = $data->project;
        return view('master_siswa.show' , compact('data','kontak','projek'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=Siswa::Find($id);
        return view('master_siswa.edit', compact('data'));
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
        $messages=[
            'required' => ':attribute harus diisi dulu',
            'min' => ':attribute minimal :min karakter',
            'max' => ':attribute maksimal :max karakter',
            'numeric' => ':attribute harus diisi angka',
            'mimes' => 'file :attribute harus bertipe jpg, png, jpeg',
            'size' => 'file yang diupload maksimal :size'
        ];
        $this->validate($request,[
            'nisn' => 'required|numeric|min:5',
            'nama' => 'required|min:5|max:20',
            'email' => 'required' ,
            'jenis_kelamin' => 'required',
            'alamat' => 'required|min:5',
            'about' => 'required|min:10',
            'foto' => 'mimes:jpg,jpeg,png,gif,svg'
        ], $messages);

        if($request->foto != ''){
            //Ganti foto
            //1. menghapus file foto lama
            $siswa=Siswa::find($id);
            file::delete('./template/img/'.$siswa->foto);

            //2. ambil informasi file yang di upload
            $file = $request->file('foto');

            //3. rename + ambil nama file
            $nama_file = time()."_".$file->getClientOriginalName();

            //4. proses upload
            $tujuan_upload = './template/img';
            $file->move($tujuan_upload,$nama_file);

            //5. menyimpan ke database
            $siswa=Siswa::find($id);
            $siswa->nisn=$request->nisn;
            $siswa->nama=$request->nama;
            $siswa->email=$request->email;
            $siswa->jenis_kelamin=$request->jenis_kelamin;
            $siswa->alamat=$request->alamat;
            $siswa->about=$request->about;
            $siswa->foto=$nama_file;
            $siswa->save();
            return redirect ('/mastersiswa');

        }else{
            //tanpa ganti foto
            $siswa=Siswa::find($id);
            $siswa->nisn=$request->nisn;
            $siswa->nama=$request->nama;
            $siswa->email=$request->email;
            $siswa->jenis_kelamin=$request->jenis_kelamin;
            $siswa->alamat=$request->alamat;
            $siswa->about=$request->about;
            $siswa->save();
            return redirect ('/mastersiswa');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $data=Siswa::find($id)->delete();
        // return redirect('master_siswa.destroy');
    }

    public function hapus($id)
    {
        $data=Siswa::find($id)->delete();
        return redirect('/mastersiswa');
    }
}
