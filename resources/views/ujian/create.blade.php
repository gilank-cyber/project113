@extends('layout.main')

@section('title', 'Tambah Data Ujian')
@section('content')
<section class="py-5">
    <div class="col-6 card-body shadow">
        <h3 class="title">Tambah Data <span class="cl-theme">Ujian</span></h3>
        <div class="section-body">
            <form action="/ujian" method="post">
                @csrf
                <div class="form-group">
                    <label for="nama_mk">Nama Matkul</label>
                    <input type="text" value="{{old('nama_mk')}}"
                        class="form-control @error('nama_mk') is-invalid @enderror" name="nama_mk" id="nama_mk"
                        aria-describedby="">
                    @error('nama_mk')<div class="invalid-feedback">{{$message}}</div>@enderror
                </div>
                <div class="form-group">
                    <label for="dosen">Dosen</label>
                    <input type="text" value="{{old('dosen')}}"
                        class="form-control @error('dosen') is-invalid @enderror" name="dosen" id="dosen"
                        aria-describedby="">
                    @error('dosen')<div class="invalid-feedback">{{$message}}</div>@enderror
                </div>
                <div class="form-group">
                    <label for="jumlah_soal">Jumlah Soal</label>
                    <input type="number" value="{{old('jumlah_soal')}}"
                        class="form-control @error('jumlah_soal') is-invalid @enderror" name="jumlah_soal"
                        id="jumlah_soal" aria-describedby="">
                    @error('jumlah_soal')<div class="invalid-feedback">{{$message}}</div>@enderror
                </div>
                <div class="form-group">
                    <label for="keterangan">Keterangan</label>
                    <input value="{{old('keterangan')}}" class="form-control @error('keterangan') is-invalid @enderror"
                        name="keterangan" id="keterangan" aria-describedby="">
                    @error('keterangan')<div class="invalid-feedback">{{$message}}</div>@enderror
                </div>
                <button type="submit" class="btn btn-success">Simpan</button>
                <a href="/ujian" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>    
</section>
@endsection