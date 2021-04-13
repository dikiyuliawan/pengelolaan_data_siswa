@extends('layout.master')

@section('title', 'Edit Data Siswa')

@section('content')

<div class="main-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
              <div class="panel">
                <div class="panel-heading">
                  <h3 class="panel-title">Edit Data Siswa</h3>
                  <div class="right">    
                  </div>
                </div>
                <div class="panel-body">
                  <form method="post" action="/siswa/{{ $siswa->id }}" enctype="multipart/form-data">
                    @method('patch')
                    @csrf
                    <div class="form-group">
                      <label for="nama-depan" class="form-label">Nama Depan</label>
                      <input type="text" class="form-control" id="nama-depan" name="nama_depan" value="{{ $siswa->nama_depan }}">
                    </div>
                    <div class="form-group">
                      <label for="nama-belakang" class="form-label">Nama Belakang</label>
                      <input type="text" class="form-control" id="nama-belakang" name="nama_belakang" value="{{ $siswa->nama_belakang }}">
                    </div>
                    <div class="form-group">
                      <label for="" class="form-label">Jenis Kelamin</label>
                      <select class="form-control" aria-label="Default select example" name="jenis_kelamin">
                        <option selected>Jenis Kelamin</option>
                        <option value="L" @if($siswa->jenis_kelamin == 'L') selected @endif>Laki-laki</option>
                        <option value="P" @if($siswa->jenis_kelamin == 'P') selected @endif>Perempuan</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="agama" class="form-label">Agama</label>
                      <input type="text" class="form-control" id="agama" name="agama" value="{{ $siswa->agama }}">
                    </div>
                    <div class="form-group">
                      <label for="alamat" class="form-label">Alamat</label>
                      <textarea class="form-control" id="alamat" name="alamat">{{ $siswa->alamat }}</textarea>
                    </div>
                    <div class="form-group">
                      <label for="avatar" class="form-label">Avatar</label>
                      <input type="file" name="avatar" class="form-control" id="">
                    </div>
                    <button type="submit" class="btn btn-primary" style="">Update</button>
                  </form>
                </div>
              </div>
            </div>
        </div>
    </div>
</div>
    
@endsection
      