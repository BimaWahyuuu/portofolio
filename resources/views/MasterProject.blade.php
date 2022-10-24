@extends('adminn.app')
@section('title','Master Project')
@section('content-title','Master Project')
@section('content')
<div class="row">
    <div class="col-lg-5">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-quote-left"></i> Siswa</h6>
            </div>
            <div class="card-body text-center">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Nisn</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $i => $item)
                    <tr>
                        <th scope="row">{{ ++$i }}</th>
                        <td>{{$item->nisn}}</td>
                        <td>{{$item->nama}}</td>
                        <td class="d-flex justify-content-center">
                            <a onclick="show({{$item->id}})" class="btn btn-info mr-1 btn-sm"><i class="fas fa-folder-open"></i></a>
                            <a href="{{route('masterproject.newproject', $item->id)}}" class="btn btn-success mr-1 btn-sm"><i class="fas fa-plus"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
        </div>
    </div>

    <div class="col-lg-7">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-quote-left"></i> Project</h6>
            </div>
            <div class="card-body" id="project">
                <h6 class="text-center">PILIH SISWA TERLEBIH DAHULU</h6>
            </div>
        </div>
    </div>
</div>
@endsection

<script>
    function show(id){
        $.get('/masterproject/'+id, function(data){
            $('#project').html(data);
        });
    }

</script>