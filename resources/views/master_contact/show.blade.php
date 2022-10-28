<!-- @if ($data->isEmpty())
    <h6 class="text-center">No Contact</h6>
@endif

@foreach ($data as $item)

<ol class="list-group list-group-numbered">
  <li class="list-group-item d-flex justify-content-between align-items-start">
    <div class="ms-2 me-auto">
      <div class="fw-bold" ><h6 style="font-weight:bold;">{{$item->nama_kontak}}</h6></div>
      <div>Deskripsi : {{$item->deskripsi}}</div>
      <div>
            <a href="{{ route('masterproject.edit', $item->id)}}"class="btn btn-warning btn-circle btn-sm"><i class="fas fa-pencil-alt"></i></a>
            <a href="{{ route('masterproject.hapus', $item->id)}}"class="btn btn-danger btn-circle btn-sm"><i class="fas fa-trash-alt"></i></a>
    </div>
       
    </div>
  </li>
</ol>
@endforeach -->

<ul class="list-group">
    <li class="list-group-item active" aria-current="true">kontak anda</li>
    @foreach ($kontak as $item)       
    <li class="list-group-item">{{ $item->jenis_id->jenis_kontak }} : {{ $item->deskripsi }}</li>   
    @endforeach
</ul>