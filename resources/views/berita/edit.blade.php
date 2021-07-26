<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

@extends('layout.main')

@section('title', 'Edit Data Berita')
@section('content')
<section class="py-5">
    <div class="col-6 card-body shadow">
        <h2 class="title">Edit Data <span class="cl-theme">Berita</span></h2>
        <div class="section-body">
            <form action="/berita/{{$beritas->id}}" method="post">
                @method('patch')
                @csrf
                <div class="form-group">
                    <label for="berita">Judul Berita</label>
                    <input type="text" value="{{$beritas->berita}}"
                        class="form-control @error('berita') is-invalid @enderror" name="berita" id="berita"
                        aria-describedby="">
                    @error('berita')<div class="invalid-feedback">{{$message}}</div>@enderror
                </div>
                <div class="form-group">
                    <label for="lokasi">Lokasi</label>
                    <input type="text" value="{{$beritas->lokasi}}"
                        class="form-control @error('lokasi') is-invalid @enderror" name="lokasi" id="lokasi"
                        aria-describedby="">
                    @error('lokasi')<div class="invalid-feedback">{{$message}}</div>@enderror
                </div>
                <div class="form-group">
                    <label for="kategori">Kategori</label>
                    <input type="text" value="{{$beritas->kategori}}"
                        class="form-control @error('kategori') is-invalid @enderror" name="kategori" id="kategori"
                        aria-describedby="">
                    @error('kategori')<div class="invalid-feedback">{{$message}}</div>@enderror
                </div>
                <div class="form-group">
                    <label>Journalist</label>
                    <select name="jurnalis_id" id="jurnalis_id" class="form-select" aria-label="Default select example">
                        <option disabled value>Pilih Jurnalis</option>
                        <option value="{{$beritas->jurnalis_id}}">{{$beritas->Journalist->nama}}</option>

                        @foreach ($jur as $item)
                        <option value="{{$item->id}}">{{$item->nama}}</option>
                        @endforeach
                    </select>
                    @error('jurnalis_id')<div class="invalid-feedback">{{$message}}</div>@enderror
                </div>
                <button type="submit" class="btn btn-warning">Update</button>
                <a href="/berita" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</section>
@endsection