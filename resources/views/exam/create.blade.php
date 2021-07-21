@extends('layout.main')

@section('title', 'Tambah Data Exam')
@section('content')
<section class="py-5">
    <div class="col-6 card-body shadow">
        <h2 class="title">Tambah Data <span class="cl-theme">Exam</span></h2>
        <div class="section-body">
            <form action="/exam" method="post">
                @csrf
                <div class="form-group">
                    <label for="judul_13">Judul 13</label>
                    <input type="text" value="{{old('judul_13')}}"
                        class="form-control @error('judul_13') is-invalid @enderror" name="judul_13" id="judul_13"
                        aria-describedby="">
                    @error('judul_13')<div class="invalid-feedback">{{$message}}</div>@enderror
                </div>
                <div class="form-group">
                    <label for="abstrak_13">Abstrak 13</label>
                    <input type="text" value="{{old('abstrak_13')}}"
                        class="form-control @error('abstrak_13') is-invalid @enderror" name="abstrak_13" id="abstrak_13"
                        aria-describedby="">
                    @error('abstrak_13')<div class="invalid-feedback">{{$message}}</div>@enderror
                </div>
                <button type="submit" class="btn btn-success">Simpan</button>
                <a href="/ujian" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>    
</section>
@endsection