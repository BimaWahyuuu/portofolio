@extends('adminn.app')
@section('title','Show Siswa')
@section('content-title','Show Siswa')
@section('content')

<div class="row">
    <div class="col-lg-4">
        <div class="card shadow mb-4">
            <div class="card-body text-center">
                <img src="{{ asset('/template/img/'.$data->foto) }}" width="200" class="rounded-circle img-thumbnail">
                <h3 class="display-5">{{ $data->nama }}</h3>
                <h6><i class="fas fa-venus-mars"></i>{{ $data->jenis_kelamin }}</h6>
                <h6><i class="fas fa-envelope"></i>{{ $data->email }}</h6>
                <h6><i class="fas fa-map"></i>{{ $data->alamat }}</h6>
            </div>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-user-plus"></i> Kontak Siswa</h6>
            </div>
            <div class="card-body">
            @foreach ($kontak as $item)
            {{ $item->jenis_kontak->jenis_kontak }} : {{ $item->deskripsi }}
            @endforeach
            </div>
        </div>
    </div>

    <div class="col-lg-8">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-quote-left"></i> About Siswa</h6>
            </div>
            <div class="card-body">
                <p class="fs-6-text fw-normal fst-normal">{{ $data->about }}</p>
            </div>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-file"></i>  Project Siswa</h6>
            </div>
        </div>
        
    </div>

</div>
@endsection
