@extends('layout.master')

@section('title', 'Home')

@section('content')
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                  <div class="panel">
                    <div class="panel-heading">
                      <h3 class="panel-title">Ranking 5 Besar</h3>
                      <div class="right">
                      </div>
                    </div>
                    <div class="panel-body no-padding">
                      <table class="table table-striped">
                          <thead>
                              <tr>
                                  <th>RANKING</th>
                                  <th>NAMA</th>
                                  <th>NILAI</th>
                              </tr>
                          </thead>
                          <tbody>
                            @foreach(limaBesar() as $s)
                            <tr>
                              <td>{{ $loop->iteration }}</td>
                              <td>{{$s->namaLengkap()}}</td>
                              <td>{{$s->rataRataNilai}}</td>
                            </tr>
                            @endforeach
                          </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="metric">
                    <span class="icon"><i class="fa fa-user"></i></span>
                    <p>
                      <span class="number">{{ totalSiswa() }}</span>
                      <span class="title">Total Siswa</span>
                    </p>
                  </div>
                </div>

                <div class="col-md-3">
                  <div class="metric">
                    <span class="icon"><i class="fa fa-user"></i></span>
                    <p>
                      <span class="number">{{ totalGuru() }}</span>
                      <span class="title">Total Guru</span>
                    </p>
                  </div>
                </div>
            </div>
        </div>
    </div>
@endsection