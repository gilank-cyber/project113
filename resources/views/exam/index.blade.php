@extends('layout.main')

@section('title', 'Exam')
@section('content')
<h2 class="title">Data <span class="cl-theme">Exam</span></h2>
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
                <th>Judul 13</th>
                <th>Abstrak 13</th>
                <th width="120px"><a href="/exam/create" class="btn btn-success w-100">Tambah</a></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($exams as $i)
            <tr>
                <td scope="row">{{$loop->iteration}}</td>
                <td>{{$i->judul_13}}</td>
                <td>{{$i->abstrak_13}}</td>
                <td>
                    <a href="/exam/{{$i->id}}/edit" class="btn btn-sm btn-primary">Edit</a>
                    <form action="/exam/{{$i->id}}" class="d-inline" method="post">
                        @method('delete')
                        @csrf
                        <button class="btn btn-sm btn-danger ml-1">Hapus</a>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $exams->links() }}
</div>
@endsection