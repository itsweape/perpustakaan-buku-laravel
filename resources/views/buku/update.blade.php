<!DOCTYPE html>
<html lang="en">
    <head>
        <title>buku.com</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
        
        <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
        <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
        <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

        <script>
            $( function() {
                $( "#datepicker" ).datepicker();
            } );
              
        </script>

        <style>
            .tambah{
                margin-top: 20px;
                padding-left: 520px;
            }
        </style>
    </head>
    <body>
        @if (count($errors) > 0)
            <ul class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        <div class="container p-5">
            <h4>Update Buku</h4>
            <form method="POST" action="{{ route('buku.update', $buku->id) }}">
                @csrf
                <div class="form-group mt-3">
                    Judul <input type="text" name="judul" class="form-control" value="{{$buku->judul}}">
                </div>
                <div class="form-group mt-3">
                    Penulis<input type="text" name="penulis" class="form-control" value="{{$buku->penulis}}">
                </div>
                <div class="form-group mt-3">
                    Harga<input type="text" name="harga" class="form-control"  value="{{$buku->harga}}">
                </div>
                <div class="form-group mt-3">
                    Tanggal Terbit <input type="text" name="tgl_terbit"
                    class="date form-control" id="datepicker" placeholder="yyyy/mm/dd">
                </div>
                <div class="mt-4">
                    <button class="btn btn-primary px-4" type="submit">Simpan
                </div>
            </form>
            <div class="mt-3">
                <a href="/buku"><button class="btn btn-danger px-4" >Batal</button></a>
            </div>
        </div>  
    </body>
</html>
