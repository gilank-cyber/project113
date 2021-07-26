<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

@extends('layout.main')

@section('title', 'Edit Data Journalist')
@section('content')
<section class="py-5">
    <div class="col-6 card-body shadow">
        <h2 class="title">Edit Data <span class="cl-theme">Journalist</span></h2>
        <div class="section-body">
            <form action="/journalist/{{$journalists->id}}" method="post">
                @method('patch')
                @csrf
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" value="{{$journalists->nama}}"
                        class="form-control @error('nama') is-invalid @enderror" name="nama" id="nama"
                        aria-describedby="">
                    @error('nama')<div class="invalid-feedback">{{$message}}</div>@enderror
                </div>
                <div class="form-group">
                    <label for="jk">Jenis Kelamin</label>
                    <select name="jk" class="form-select" aria-label="Default select example">
                        <option <?= $journalists->jk == 'Laki-Laki' ? 'selected' : '' ?> value="Laki-Laki">Laki-Laki</option>
                        <option <?= $journalists->jk == 'Perempuan' ? 'selected' : '' ?> value="Perempuan">Perempuan</option>
                        <option <?= $journalists->jk == 'Lainnya' ? 'selected' : '' ?> value="Lainnya">Lainnya</option>
                    </select>
                    @error('jk')<div class="invalid-feedback">{{$message}}</div>@enderror
                </div>
                <div class="form-group">
                    <label for="no_hp">No HP</label>
                    <input type="text" value="{{$journalists->no_hp}}"
                        class="form-control @error('no_hp') is-invalid @enderror" name="no_hp" id="no_hp"
                        aria-describedby="">
                    @error('no_hp')<div class="invalid-feedback">{{$message}}</div>@enderror
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" value="{{$journalists->alamat}}"
                        class="form-control @error('alamat') is-invalid @enderror" name="alamat" id="alamat"
                        aria-describedby="">
                    @error('alamat')<div class="invalid-feedback">{{$message}}</div>@enderror
                </div>
                <button type="submit" class="btn btn-warning">Update</button>
                <a href="/journalist" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</section>
@endsection