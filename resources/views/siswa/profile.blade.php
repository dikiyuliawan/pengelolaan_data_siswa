@extends('layout.master')

@section('header')
<link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
@endsection

@section('title', 'Profile')

@section('content')
<div class="main-content">
    <div class="container-fluid">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger" role="alert">
                {{ session('error') }}
            </div>
        @endif
        <div class="panel panel-profile">
            <div class="clearfix">
                <!-- LEFT COLUMN -->
                <div class="profile-left">
                    <!-- PROFILE HEADER -->
                    <div class="profile-header">
                        <div class="profile-main">
                            <img src="{{ $siswa->getAvatar() }}" class="img-circle" alt="Avatar" width="120" height="120">
                            <h3 class="name">{{ $siswa->nama_depan }}</h3>
                            <span class="online-status status-available">Available</span>
                        </div>
                        <div class="profile-stat">
                            <div class="row">
                                <div class="col-md-4 stat-item">
                                    {{ $siswa->mapel->count() }} <span>Mata Pelajaran</span>
                                </div>
                                <div class="col-md-4 stat-item">
                                    {{ $siswa->rataRataNilai() }} <span>Awards</span>
                                </div>
                                <div class="col-md-4 stat-item">
                                    2174 <span>Points</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END PROFILE HEADER -->

                    <!-- PROFILE DETAIL -->
                    <div class="profile-detail">
                        <div class="profile-info">
                            <h4 class="heading">Data Diri</h4>
                            <ul class="list-unstyled list-justify">
                                <li>Jenis Kelamin <span>{{ $siswa->jenis_kelamin }}</span></li>
                                <li>Agama <span>{{ $siswa->agama }}</span></li>
                                <li>Alamat <span>{{ $siswa->alamat }}</span></li>
                            </ul>
                        </div>
                        <div class="profile-info">

                        </div>
                        <div class="text-center"><a href="/siswa/{{ $siswa->id }}/edit" class="btn btn-primary">Edit Profile</a></div>
                    </div>
                    <!-- END PROFILE DETAIL -->
                </div>
                <!-- END LEFT COLUMN -->
                <!-- RIGHT COLUMN -->
                <div class="profile-right">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        Tambah Nilai
                      </button>
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Mata Pelajaran</h3>
                        </div>
                        <div class="panel-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>KODE</th>
                                        <th>NAMA</th>
                                        <th>SEMESTER</th>
                                        <th>NILAI</th>
                                        <th>GURU</th>
                                        <th>AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($siswa->mapel as $mapel)    
                                    <tr>
                                        <td>{{ $mapel->kode }}</td>
                                        <td>{{ $mapel->nama }}</td>
                                        <td>{{ $mapel->semester }}</td>
                                        <td><a href="#" class="nilai" data-type="text" data-pk="{{ $mapel->id }}" data-url="/api/siswa/{{ $siswa->id }}/editnilai" data-title="Enter username">{{ $mapel->pivot->nilai }}</a></td>
                                        <td><a href="{{ url('/guru/'.$mapel->guru_id.'/profile') }}">{{ $mapel->guru->nama }}</a></td>
                                        <td><a href="{{ url('/siswa/'.$siswa->id.'/'.$mapel->id.'/deletenilai') }}" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')">Delete</a></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="panel">
                        <div id="chart-nilai">

                        </div>
                    </div>
                </div>
                <!-- END RIGHT COLUMN -->
            </div>
        </div>
    </div>
</div>

<!-- Button trigger modal -->

  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Nilai</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="post" action="/siswa/{{ $siswa->id }}/addnilai" enctype="multipart/form-data">
              @csrf
              <div class="form-group">
                <label for="" class="form-label">Mata Pelajaran</label>
                <select class="form-control @error('jenis_kelamin') is-invalid @enderror" aria-label="Default select example" name="mapel">
                  <option selected>Mata Pelajaran</option>
                  @foreach ($mata_pelajaran as $mp)
                      <option value="{{ $mp->id }}">{{ $mp->nama }}</option>
                  @endforeach
                </select>
                @error('mapel') <div class="invalid-feedback"> {{ $message }} </div> @enderror
              </div>
              <div class="form-group">
                <label for="nilai" class="form-label">Nilai</label>
                <input type="text" class="form-control @error('nilai') is-invalid @enderror" id="nilai" name="nilai" value="{{ old('nilai') }}">
                @error('nama_depan') <div class="invalid-feedback"> {{ $message }} </div> @enderror
              </div>
              <button type="submit" class="btn btn-primary" style="">Submit</button>
            </form>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('footer')
<script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>
<script src="https://code.highcharts.com/highcharts.src.js"></script>
<script>
    Highcharts.chart('chart-nilai', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Laporan Nilai Siswa'
    },
    subtitle: {
        text: 'Source: WorldClimate.com'
    },
    xAxis: {
        categories: {!!json_encode($categories)!!},
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Nilai'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.1f}</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Nilai',
        data: {!!json_encode($nilai)!!}

    }]
});

$(document).ready(function() {
    $('.nilai').editable();
});
</script>
@endsection