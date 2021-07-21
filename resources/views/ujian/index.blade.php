@extends('layout.main')

@section('title', 'Ujian')
@section('content')
<h2 class="title">Data <span class="cl-theme">Ujian</span></h2>
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
                <th>Nama Matkul</th>
                <th>Nama Dosen</th>
                <th>Jumlah Soal</th>
                <th>Keterangan</th>
                <th width="120px"><a href="/ujian/create" class="btn btn-success w-100">Tambah</a></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ujian as $i)
            <tr>
                <td scope="row">{{$loop->iteration}}</td>
                <td>{{$i->nama_mk}}</td>
                <td>{{$i->dosen}}</td>
                <td>{{$i->jumlah_soal}}</td>
                <td>{{$i->keterangan}}</td>
                <td>
                    <a href="/ujian/{{$i->id}}/edit" class="btn btn-sm btn-primary">Edit</a>
                    <form action="/ujian/{{$i->id}}" class="d-inline" method="post">
                        @method('delete')
                        @csrf
                        <button class="btn btn-sm btn-danger ml-1">Hapus</a>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $ujian->links() }}
</div>
@endsection