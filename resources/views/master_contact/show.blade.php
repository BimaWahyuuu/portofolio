<ul class="list-group">
    <li class="list-group-item active" aria-current="true">Kontak Anda</li>
    @foreach ($kontak as $item)       
    <li class="list-group-item">{{ $item->jenis_kontak->jenis_kontak }} : {{ $item->deskripsi }}</li>   
    @endforeach
</ul>