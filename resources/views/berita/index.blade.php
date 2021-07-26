@extends('layout.main')

@section('title', 'Berita')
@section('content')
<h2 class="title">Data <span class="cl-theme">Berita</span></h2>
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
                <th>Judul Berita</th>
                <th>Tempat</th>
                <th>Kategori</th>
                <th>Journalist</th>
                <th width="120px"><a href="/berita/create" class="btn btn-success w-100">Tambah</a></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($beritas as $i)
            <tr>
                <td scope="row">{{$loop->iteration}}</td>
                <td>{{$i->berita}}</td>
                <td>{{$i->lokasi}}</td>
                <td>{{$i->kategori}}</td>
                <td>{{$i->Journalist->nama}}</td>
                <td>
                    <a href="/berita/{{$i->id}}/edit" class="btn btn-sm btn-primary">Edit</a>
                    <form action="/berita/{{$i->id}}" class="d-inline" method="post">
                        @method('delete')
                        @csrf
                        <button class="btn btn-sm btn-danger ml-1">Hapus</a>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $beritas->links() }}
</div>
@endsection