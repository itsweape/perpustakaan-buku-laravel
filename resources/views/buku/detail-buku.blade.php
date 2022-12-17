@extends('layouts.app')
@section('content')
    @if(Session::has('pesan'))
            <div class="alert alert-success">
                {{Session::get('pesan')}}
            </div>
        @endif
    <section id="album" class="py-1 text-center bg-light">
        <div class="container">
            <h2>{{ $buku->judul }}</h2>
            <br>
            <a href="/"><button class="btn btn-primary">Kembali</button></a>
            <hr>
            <div class="row">
                @foreach ($dataGaleri as $data)
                    <div class="col-md-4">
                        <a href="{{ asset('images/'.$data->foto) }}" data-lightbox="image-1" data-title="{{ $data->keterangan }}">
                        <img src="{{ asset('images/'.$data->foto) }}" style="width: 200px; height: 150px"></a>
                        <p><h5>{{ $data->nama_galeri }}</h5></p>
                    </div>
                @endforeach
            </div>
            <div>{{ $dataGaleri->links() }}</div>
        </div>
    </section>
    <br>
    <br>
    <br>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Komentar</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('komentar.store') }}">
                            <div class="form-group">
                                @csrf
                                <label class="label">Isi komentar anda di sini: </label>
                                <textarea name="comment" rows="10" cols="30" class="form-control" required></textarea>
                                <input type="number" class="visually-hidden" value="{{ Auth::user()->id}}" name="id_users">
                                <input type="number" class="visually-hidden" value="{{ $buku->id}}" name="id_buku">
                            </div>
                            <br>
                            <div class="form-group">
                                <button class="btn btn-primary" type="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
    <br>
    <div class="container">
        <h3 class="mx-5">Komentar </h3>
        @foreach($comment as $comments)
            <div class=" mx-5 card">
                <div class=" card-body">
                    <h5 class="card-title"></h5>
                    <b>{{$comments->relationUser->name}}</b>
                    <br>
                    <p>{{$comments->comment}}</p>
                </div>
            </div>
        @endforeach
    </div>
@endsection