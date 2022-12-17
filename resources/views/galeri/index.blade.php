@extends('layouts.app')
@section('content')
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Galeri</th>
                <th>Judul Buku</th>
                <th>Keterangan</th>
                <th>Galeri</th>
                <th colspan="2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dataGaleri as $data)
                <tr>
                    <td>{{ ++$no }}</td>
                    <td>{{ $data->nama_galeri }}</td>
                    <td>{{ $data->judul }}</td>
                    <td>{{ $data->keterangan}}</td>
                    <td><img src="{{ asset('thumb/'.$data->foto) }}" style="width: 100px;"></td>
                    <td>
                        <form action="{{route('galeri.edit', $data->id)}}" method="POST">
                            @csrf
                            <button class="btn btn-info px-4">Edit</button>
                        </form>
                    </td>
                    <td>
                        <form action="{{ route('galeri.destroy', $data->id) }}" method="post">
                            @csrf
                            <button class="btn btn-danger px-4" onclick="return confirm('Yakin mau dihapus?')"> Delete
                                <i class="fa fa-times"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <br>
    <div class="tambah">
            <a href="{{route('galeri.create')}}"><button class="btn btn-primary px-3" >Tambah Galeri</button></a>
    </div>
    <br>
    <div> {{ $dataGaleri->links("pagination::bootstrap-5") }}</div>
@endsection