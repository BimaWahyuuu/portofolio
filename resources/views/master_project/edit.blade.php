@extends('adminn.app')
@section('title','Edit Project')
@section('content-title','Edit Project')
@section('content')

<a class="btn btn-success mb-3" href="{{ route('masterproject.index') }}">Kembali</a>
<div class="row">
    <div class="col-lg-12">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Data</h6>
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
       
            <form class="row g-3" method="post" enctype="multipart/form-data" action="{{ route('masterproject.ubah' , $projek->id)}}">
            @csrf
            <input type="hidden" name="siswa_id" value="{{ $projek->siswa_id }}">
                <div class="col-12">
                  <label for="Nisn" class="form-label">Nama Project</label>
                  <input type="text" class="form-control" id="Namaproject" name="nama_projek" value="{{ $projek->nama_projek }}">
                </div>
                <div class="col-12 mb-2">
                  <label for="Alamat" class="form-label">Deskripsi</label>
                  <input type="text" class="form-control" id="Deskripsi" name="deskripsi" value="{{ $projek->deskripsi }}">
                </div>
                <div class="col-12">
                  <label for="About" class="form-label">Tanggal</label>
                  <input type="date" class="form-control" id="Tanggal" name="tanggal" value="{{ $projek->tanggal }}">
                </div>
                <div class="col-12">
                  <label for="Foto" class="form-label">Foto</label>
                  <input type="file" class="form-control" id="Foto" name="foto" value="{{ $projek->foto }}">
                  <img src="{{  asset('/template/img/'.$projek->foto) }}" width="300" class="img-thumbnail">
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
