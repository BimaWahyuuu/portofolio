@extends('adminn.app')
@section('title','Tambah Siswa')
@section('content-title','Tambah Siswa')
@section('content')
<a class="btn btn-success mb-3" href="{{ route('mastersiswa.index') }}">Kembali</a>
<div class="row">
    <div class="col-lg-12">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tambah Data</h6>
        </div>
        <div class="card-body">
            @if(count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
       
            <form class="row g-3" method="post" enctype="multipart/form-data" action="{{ route('mastersiswa.store') }}">
            @csrf
                <div class="col-12">
                  <label for="Nisn" class="form-label">Nisn</label>
                  <input type="text" class="form-control" id="Nisn" name="nisn" value="{{ old('nisn')}}">
                </div>
                <div class="col-md-6 mb-2">
                  <label for="Nama" class="form-label">Nama</label>
                  <input type="text" class="form-control" id="Nama" name="nama" value="{{ old('nama')}}">
                </div>
                <div class="col-md-6 ">
                  <label for="Email" class="form-label">Email</label>
                  <input type="text" class="form-control" id="Email" name="email" value="{{ old('email')}}">
                </div>
                <div class="col-12 mb-2">
                  <label for="JenisKelamin" class="form-label">Jenis Kelamin</label>
                  <select name="jenis_kelamin" id="JenisKelamin" class="form-select" value="{{ old('jenis_kelamin')}}">
                      <option selected>null</option>
                      <option value="laki-laki">laki-laki</option>
                      <option value="perempuan">perempuan</option>
                  </select>
                </div>
                <div class="col-12 mb-2">
                  <label for="Alamat" class="form-label">Alamat</label>
                  <input type="text" class="form-control" id="Alamat" name="alamat" value="{{ old('alamat')}}">
                </div>
                <div class="col-12">
                  <label for="About" class="form-label">About</label>
                  <input type="text" class="form-control" id="About" name="about" value="{{ old('about')}}">
                </div>
                <div class="col-12">
                  <label for="Foto" class="form-label">Foto</label>
                  <input type="file" class="form-control" id="Foto" name="foto" value="{{ old('foto')}}">
                </div>
                <div class="col-md-3">
                    <input type="submit" class="btn btn-success" value="Simpan">
                    <a href="{{ route('mastersiswa.index') }}" class="btn btn-danger">Batal</a>
                </div>
              </form>
        </div><!-- card body -->
        </div>
    </div>
</div>
@endsection
