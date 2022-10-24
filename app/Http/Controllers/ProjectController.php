<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\Project;
use File;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Siswa::all('id','nisn','nama');
        return view('MasterProject',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('master_project.create');
    }

    public function newproject($id)
    {
        $Siswa = Siswa::find($id);
        return view ('master_project.create', compact('Siswa'));
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
            'nama_projek' => 'required',
            'deskripsi' => 'required' ,
            'foto' => 'mimes:jpg,jpeg,png,gif,svg'
        ], $messages);

        // //ambil informasi yang di upload
        $file = $request->file('foto');
       

        // //rename + ambil nama file
        $nama_file = time()."_".$file->getClientOriginalName();

        // //proses upload
        $tujuan_upload = './template/img';
        $file->move($tujuan_upload,$nama_file);

        //Proses Insert Database
        Project::create([
            'siswa_id' => $request->siswa_id,
            'nama_projek' => $request->nama_projek,
            'deskripsi' => $request->deskripsi ,
            'tanggal' => $request->tanggal,
            'foto' => $nama_file,
        ]);

        return redirect('/masterproject');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Siswa::find($id)->project()->get();
        return view('master_project.show',compact('data'));
        // return $data;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $projek = Project::find($id);
        // dd($projek);
        return view("master_project.edit", compact("projek"));

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
        

        if($request->foto != ''){
            //Ganti foto
            //1. menghapus file foto lama
            $projek=Project::find($id);
            file::delete('./template/img/'.$projek->foto);

            //2. ambil informasi file yang di upload
            $file = $request->file('foto');

            //3. rename + ambil nama file
            $nama_file = time()."_".$file->getClientOriginalName();

            //4. proses upload
            $tujuan_upload = './template/img';
            $file->move($tujuan_upload,$nama_file);

            //5. menyimpan ke database
            $projek = Project::find($id);
            $projek->siswa_id = $request->siswa_id;
            $projek->nama_projek = $request->nama_projek;
            $projek->deskripsi = $request->deskripsi;
            $projek->tanggal = $request->tanggal;
            $projek->foto = $nama_file;
            $projek->save();
            return redirect ('/masterproject');

        }else{
            //tanpa ganti foto
            $projek = Project::find($id);
            $projek->siswa_id = $request->siswa_id;
            $projek->nama_projek = $request->nama_projek;
            $projek->deskripsi = $request->deskripsi;
            $projek->tanggal = $request->tanggal;
            $projek->save();
            return redirect ('/masterproject');
        }

    }

    public function hapus($id)
    {
        $data=Project::find($id)->delete();
        return redirect('/masterproject');
    }

    
}
