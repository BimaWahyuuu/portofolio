@if ($data->isEmpty())
    <h6 class="text-center">No Project</h6>
@endif

    @foreach ($data as $item)
    <!-- <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{$item->nama_projek}}</h6>
        </div>
        <div class="card-body">
            <h5>Tanggal Project : </h5> {{$item->tanggal}}
            <h5>Deskripsi : </h5> {{$item->deskripsi}}
        </div>
    </div> -->

    <ol class="list-group list-group-numbered">
  <li class="list-group-item d-flex justify-content-between align-items-start">
    <div class="ms-2 me-auto">
      <div class="fw-bold" ><h6 style="font-weight:bold;">{{$item->nama_projek}}</h6></div>
      <div>Deskripsi : {{$item->deskripsi}}</div>
      <div>
            <a href="{{ route('masterproject.edit', $item->id)}}"class="btn btn-warning btn-circle btn-sm"><i class="fas fa-pencil-alt"></i></a>
            <a href="{{ route('masterproject.hapus', $item->id)}}"class="btn btn-danger btn-circle btn-sm"><i class="fas fa-trash-alt"></i></a>
    </div>
       
    </div>
    <span class="badge bg-primary rounded-pill" style="color:white;">{{$item->tanggal}}</span>

  </li>
</ol>
    @endforeach