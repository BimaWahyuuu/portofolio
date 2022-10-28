@extends('adminn.app')
@section('title','Tambah Contact')
@section('content-title','Tambah Contact')
@section('content')

<a class="btn btn-success mb-3" href="{{ route('mastercontact.index') }}">Kembali</a>
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
       
            <form class="row g-3" method="post" enctype="multipart/form-data" action="{{ route('mastercontact.store') }}">
            @csrf
            <input type="hidden" name="siswa_id" value="{{ $Siswa['id']}}">
                <div class="col-12">
                  <label for="Namakontak" class="form-label">Nama Kontak</label>
                  <input type="text" class="form-control" id="Namakontak" name="nama_kontak" value="{{ old('nama_kontak')}}">
                </div>
                <div class="col-12 mb-2">
                  <label for="JenisKontak" class="form-label">Jenis Kontak</label>
                  <select name="jenis_kontak" id="JenisKontak" class="form-select" value="{{ old('jenis_kontak')}}">
                      <option selected>--</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                  </select>
                </div>
                <div class="col-12">
                  <label for="Deskripsi" class="form-label">Deskripsi</label>
                  <input type="text" class="form-control" id="Deskripsi" name="deskripsi" value="{{ old('deskripsi')}}">
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
