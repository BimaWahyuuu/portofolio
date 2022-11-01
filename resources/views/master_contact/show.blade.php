<ul class="list-group">
    <li class="list-group-item active" aria-current="true">Kontak Anda</li>
    @foreach ($kontak as $item)       
    <li class="list-group-item">{{ $item->jenis_kontak->jenis_kontak }} : {{ $item->deskripsi }}
    <div>
        <a href="{{ route('mastercontact.edit', $item->id)}}"class="btn btn-warning btn-circle btn-sm"><i class="fas fa-pencil-alt"></i></a>
        <a href="{{ route('mastercontact.hapus', $item->id)}}"class="btn btn-danger btn-circle btn-sm"><i class="fas fa-trash-alt"></i></a>
    </div>
    </li>   
    @endforeach
    
</ul>