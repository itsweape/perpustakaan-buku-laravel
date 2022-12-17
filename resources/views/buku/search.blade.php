<!DOCTYPE html>
<html lang="en">
    <head>
        <title>buku.com</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        
        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
        <style>
            body{
                padding: 20px;
            }
            table {
                border-collapse: collapse;
                font-family: Tahoma, Geneva, sans-serif;
            }
            table td {
                padding: 15px;
            }
            table thead th {
                background-color: #0d6efd;
                color: #ffffff;
                font-weight: bold;
                font-size: 16px;
                border: 1px solid #dddfe1;
                text-align: center;
            }
            table tbody td {
                color: #636363;
            }
            table tbody tr {
                background-color: #f9fafb;
                border: 1px solid #dddfe1;
            }
            table tbody tr:nth-child(odd) {
                background-color: #ffffff;
            }
            .tambah{
                margin-top: 20px;
                padding-left: 640px;
            }
        </style>
    </head>
<body>
        <!-- pesan simpan buku
        @if(Session::has('pesan'))
            <div class="alert alert-success">
                {{Session::get('pesan')}}
            </div>
        @endif -->

        <!-- pesan tambah buku -->
        @if(Session::has('pesanTambahBuku'))
            <div class="alert alert-success">
                {{Session::get('pesanTambahBuku')}}
            </div>
        @endif

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

        <h4>Data Buku</h4>
        <br>
        @if(count($data_buku))  
            <div class="alert alert-success">Ditemukan <strong>{{count($data_buku)}}</strong> 
            data dengan kata: <strong>{{ $cari }}</strong></div>
        <br>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul Buku</th>
                    <th>Penulis</th>
                    <th>Harga</th>
                    <th>Tanggal</th>
                    <th colspan="2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data_buku as $buku)
                    <tr>
                        <td>{{ ++$no }}</td>
                        <td>{{ $buku->judul }}</td>
                        <td>{{ $buku->penulis }}</td>
                        <td>{{ "Rp " .number_format($buku->harga, 0, ',', '.') }}</td>
                        <td>{{ $buku->tgl_terbit->format('d/m/Y') }}</td>
                        <td>
                            <form action="{{route('buku.destroy', $buku->id)}}" method="POST">
                                @csrf
                                <button onclick="return confirm('Yakin mau dihapus?')" class="btn btn-danger">Hapus</button>
                            </form>
                        </td>
                        <td>
                            <form action="{{route('buku.edit', $buku->id)}}" method="POST">
                                @csrf
                                <button class="btn btn-primary">Update</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="tambah">
            <a href="{{route('buku.create')}}"><button class="btn btn-primary px-4" >Tambah Buku</button></a>
        </div>
        <br>

        @else
            <div class="alert alert-warning"><h4>Data {{ $cari }} tidak ditemukan</h4>
            <a href="/buku" class="btn btn-warning">Kembali</a></div>
        @endif 

        <br>
        <div> {{ $data_buku->links("pagination::bootstrap-5") }}</div>
        <div><strong>Jumlah Buku: {{ $jumlah_buku }}</strong></div>
        <div><strong>Total Harga Buku: {{ "Rp " .number_format($harga_buku, 0, ',', '.') }}</strong></div>
    </body>    
</html>