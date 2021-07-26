@extends('layout.main')

@section('title', 'Jurnalis')
@section('content')
<h3 class="title">Data <span class="cl-theme">Jurnalis</span></h3>
@if (session('status'))
<div class="alert alert-success">
    {{ session('status') }}
</div>
@endif
<div class="section-body">
    <table class="table table-bordered table-hover">
        <thead class="thead-light">
            <tr>
                <th>#</th>
                <th>Nama Jurnalis</th>
                <th>Jenis Kelamin</th>
                <th>No HP</th>
                <th>Alamat</th>
                <th width="120px"><a href="/journalist/create" class="btn btn-success w-100">Tambah</a></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($journalists as $i)
            <tr>
                <td scope="row">{{$loop->iteration}}</td>
                <td>{{$i->nama}}</td>
                <td>{{$i->jk}}</td>
                <td>{{$i->no_hp}}</td>
                <td>{{$i->alamat}}</td>
                <td>
                    <a href="/journalist/{{$i->id}}/edit" class="btn btn-sm btn-primary">Edit</a>
                    <form action="/journalist/{{$i->id}}" class="d-inline" method="post">
                        @method('delete')
                        @csrf
                        <button class="btn btn-sm btn-danger ml-1">Hapus</a>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $journalists->links() }}
</div>
@endsection
