@extends('layouts.app')
@section('content')
        <!-- pesan simpan buku -->
        @if(Session::has('pesan'))
            <div class="alert alert-success">
                {{Session::get('pesan')}}
            </div>
        @endif

        <!-- pesan tambah buku
        @if(Session::has('pesanTambahBuku'))
            <div class="alert alert-success">
                {{Session::get('pesanTambahBuku')}}
            </div>
        @endif -->

        <!-- pesan update buku -->
        @if(Session::has('pesanUpdateBuku'))
            <div class="alert alert-success">
                {{Session::get('pesanUpdateBuku')}}
            </div>
        @endif

        <!-- pesan delete buku -->
        @if(Session::has('pesanDeleteBuku'))
            <div class="alert alert-success">
                {{Session::get('pesanDeleteBuku')}}
            </div>
        @endif

        <form method="GET" action="{{route('buku.search')}}">
            @csrf
            <div class="form-group mt-3">
                <input type="text" name="kata" class="form-control" placeholder="Cari..." 
                style="width: 30%; display:inline; margin-top:10px; margin-bottom:10px; float:right;">
            </div>
        </form>

        <br>
        <br>
        <h3>Data Buku</h3>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul Buku</th>
                    <th>Penulis</th>
                    <th>Harga</th>
                    <th>Tanggal</th>
                    <th colspan="4">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data_buku as $buku)
                    <tr>
                        <td>{{ ++$no }}</td>
                        <td>{{ $buku->judul }}</td>
                        <td>{{ $buku->penulis }}</td>
                        <td>{{ "Rp " .number_format($buku->harga, 2, ',', '.') }}</td>
                        <td>{{ $buku->tgl_terbit->format('d/m/Y') }}</td>
                        <td>
                            <form action="{{route('buku.detail', $buku->buku_seo)}}" method="GET">
                                @csrf
                                <button class="btn btn-primary">Detail</button>
                            </form>
                        </td>
                        <td>
                            <form action="{{route('buku.edit', $buku->id)}}" method="POST">
                                @csrf
                                <button class="btn btn-info">Update</button>
                            </form>
                        </td>
                        <td>
                            <form action="{{route('buku.destroy', $buku->id)}}" method="POST">
                                @csrf
                                <button onclick="return confirm('Yakin mau dihapus?')" class="btn btn-danger">Hapus</button>
                            </form>
                        </td>
                        <td>
                            <a href="{{ route('like.foto', $buku->id) }}" class="btn btn-primary btn-sm">
                                <i class="fa fa-thumbs-up"></i>Like
                                <span class="badge badge-light"> {{$buku->suka}}</span>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="tambah">
            <a href="{{route('buku.create')}}"><button class="btn btn-primary px-4" >Tambah Buku</button></a>
        </div>
        <br>
        <div> {{ $data_buku->links("pagination::bootstrap-5") }}</div>
        <div><strong>Jumlah Buku: {{ $jumlah_buku }}</strong></div>
       
@endsection