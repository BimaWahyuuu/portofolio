@extends('adminn.app')
@section('title','Edit Contact')
@section('content-title','Edit Contact')
@section('content')

<a class="btn btn-success mb-3" href="{{ route('mastercontact.index') }}">Kembali</a>
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
       
            <form class="row g-3" method="post" enctype="multipart/form-data" action="{{ route('mastercontact.ubah' , $kontak->id) }}">
            @csrf
            <input type="hidden" name="siswa_id" value="{{ $kontak->siswa_id }}">
                <div class="col-12 mb-2">
                  <label for="JenisKontak" class="form-label">Jenis Kontak</label>
                  <select name="jenis_kontak" id="JenisKontak" class="form-select" value="{{ $kontak->jenis_kontak }}">
                    @foreach ($jenis_kontak as $jenis)
                      <option value="{{ $jenis->id }}"> {{ $jenis->jenis_kontak }} </option>
                    @endforeach
                      <!-- <option selected>--</option>
                      <option value="1">1</option>
                      <option value="2">2</option> -->
                  </select>
                </div>
                <div class="col-12">
                  <label for="Deskripsi" class="form-label">Deskripsi</label>
                  <input type="text" class="form-control" id="Deskripsi" name="deskripsi" value="{{ $kontak->deskripsi }}">
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
