@extends('layouts.app')
@section('content')
        
        <h3>Data User</h3>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Level</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data_user as $user)
                    <tr>
                        <td>{{ ++$no }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->level }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
@endsection