@extends('layouts.app')
@section('content')
<div class="container p-5">
<h4 style="text-align: center; margin-bottom:50px;">Tambah Galeri</h4>
    <form action="{{ route('galeri.store') }}" method="post" enctype="multipart/form-data">
    @csrf
        <div class="form-group mt-3">
            <label for="nama_galeri"> Judul </label>
            <input type="text" class="form-control" name="nama_galeri">
        </div>
        <div class="form-group mt-3">
            <label for="id_buku">Buku</label>
            <select name="id_buku" class="form-control">
                <option value="" selected>Pilih Buku</option>
                @foreach ($buku as $data)
                    <option value="{{ $data->id }}">{{ $data->judul }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group mt-3">
            <label for="keterangan">Keterangan</label>
            <textarea name="keterangan" class="form-control"></textarea>
        </div>
        <div class="form-group mt-3">
            <label for="foto">Upload Foto</label>
            <input type="file" class="form-control" name="foto">
        </div>
        <br>
        <div class="form-group">
            <button type="submit" class="btn btn-success px-4" style="margin-right: 16px;">Simpan</button>
            <a href="/galeri" class="btn btn-warning px-4">Batal</a>
        </div>
    </form>
</div>
@endsection