@extends('layout.master')

@section('title', 'Data Siswa')

@section('content')
    <div class="main-content">
        <div class="container-fluid">
          @if (session('status'))
              <div class="alert alert-success">
                  {{ session('status') }}
              </div>
          @endif
            <div class="row">
                <div class="col-md-12">
                  <div class="panel">
                    <div class="panel-heading">
                      <h3 class="panel-title">Data Siswa</h3>
                      <div class="right">

                      <a type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#import">
                        Import XLS
                      </a>
     
                        <button class="lnr lnr-plus-circle" data-toggle="modal" data-target="#exampleModal">
                          Tambah Data
                        </button>
                      </div>
                    </div>
                    <div class="panel-body no-padding">
                      <table class="table table-hover text-nowrap" id="datatable">
                        <thead>
                          <tr>
                            <th>Nama Depan</th>
                            <th>Nama Belakang</th>
                            <th>Jenis Kelamin</th>
                            <th>Agama</th>
                            <th>Alamat</th>
                            <th>Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          <!-- @foreach ($siswa as $sw)
                              <tr>
                                  <td><a href="/siswa/{{ $sw->id }}/profile">{{ $sw->nama_depan }}</a></td>
                                  <td>{{ $sw->nama_belakang }}</td>
                                  <td>{{ $sw->jenis_kelamin }}</td>
                                  <td>{{ $sw->agama }}</td>
                                  <td>{{ $sw->alamat }}</td>
                                  <td><a href="/siswa/{{ $sw->id }}/edit" class="btn btn-sm btn-success" style="float: left">Edit</a>
                                    <form action="/siswa/{{ $sw->id }}" method="post" class="d-inline">
                                      @method('delete')
                                      @csrf
                                      <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')">Delete</button>
                                    </form>
                                  </td>
                              </tr>
                          @endforeach -->
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Import -->
    <div class="modal fade" id="import" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <a class="btn-close" data-dismiss="modal" aria-label="Close"></a>
          </div>
          <div class="modal-body">
            <form action="{{ url('/siswa/import') }}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="form-group">
                <input type="file" name="file" id="file">
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
            </form>
        </div>
      </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Form Tambah Data</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="post" action="/siswa" enctype="multipart/form-data">
              @csrf
              <div class="form-group">
                <label for="nama-depan" class="form-label">Nama Depan</label>
                <input type="text" class="form-control @error('nama_depan') is-invalid @enderror" id="nama-depan" name="nama_depan" value="{{ old('nama_depan') }}">
                @error('nama_depan') <div class="invalid-feedback"> {{ $message }} </div> @enderror
              </div>
              <div class="form-group">
                <label for="nama-belakang" class="form-label">Nama Belakang</label>
                <input type="text" class="form-control" id="nama-belakang" name="nama_belakang" value="{{ old('nama_belakang') }}">
              </div>
              <div class="form-group">
                <label for="nama-belakang" class="form-label">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}">
                @error('email') <div class="invalid-feedback"> {{ $message }} </div> @enderror
              </div>
              <div class="form-group">
                <label for="" class="form-label">Jenis Kelamin</label>
                <select class="form-control @error('jenis_kelamin') is-invalid @enderror" aria-label="Default select example" name="jenis_kelamin">
                  <option selected>Jenis Kelamin</option>
                  <option value="L" {{ (old('jenis_kelamin') == 'L') ? ' selected' : '' }}>Laki-laki</option>
                  <option value="P" {{ (old('jenis_kelamin') == 'P') ? ' selected' : '' }}>Perempuan</option>
                </select>
                @error('jenis_kelamin') <div class="invalid-feedback"> {{ $message }} </div> @enderror
              </div>
              <div class="form-group">
                <label for="agama" class="form-label">Agama</label>
                <input type="text" class="form-control @error('agama') is-invalid @enderror" id="agama" name="agama" value="{{ old('agama') }}">
                @error('agama') <div class="invalid-feedback"> {{ $message }} </div> @enderror
              </div>
              <div class="form-group">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat">{{ old('alamat') }}</textarea>
                @error('alamat') <div class="invalid-feedback"> {{ $message }} </div> @enderror
              </div>
              <div class="form-group">
                <label for="avatar" class="form-label">Avatar</label>
                <input type="file" name="avatar" class="form-control @error('avatar') is-invalid @enderror" id="">
                @error('avatar') <div class="invalid-feedback"> {{ $message }} </div> @enderror
              </div>
              <button type="submit" class="btn btn-primary" style="">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>
@endsection

@section('footer')
  <script>
    $(document).ready(function(){
      $('#datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('ajax.get.data.siswa') }}",
        columns: [
          {data: 'nama_depan', name: 'nama_depan'},
          {data: 'nama_belakang', name: 'nama_delakang'},
          {data: 'jenis_kelamin', name: 'jenis_kelamin'},
          {data: 'agama', name: 'agama'},
          {data: 'alamat', name: 'alamat'},
        ]
      });
    })
  </script>
@endsection