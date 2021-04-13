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
                            <img src="" class="img-circle" alt="Avatar" width="120" height="120">
                            <h3 class="name">{{ $guru->nama }}</h3>
                            <span class="online-status status-available">Available</span>
                        </div>
                        <div class="profile-stat">
                            <div class="row">
                                <div class="col-md-4 stat-item">
                                    {{ $guru->mapel->count() }}<span>Mata Pelajaran</span>
                                </div>
                                <div class="col-md-4 stat-item">
                                    15 <span>Awards</span>
                                </div>
                                <div class="col-md-4 stat-item">
                                    2174 <span>Points</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END PROFILE HEADER -->

                    <!-- PROFILE DETAIL -->

                    <!-- END PROFILE DETAIL -->
                </div>
                <!-- END LEFT COLUMN -->
                <!-- RIGHT COLUMN -->
                <div class="profile-right">

                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Mata Pelajaran yang diajar oleh {{ $guru->nama }}</h3>
                        </div>
                        <div class="panel-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>NAMA</th>
                                        <th>SEMESTER</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($guru->mapel as $mapel)
                                    <tr>
                                        <td>{{ $mapel->nama }}</td>
                                        <td>{{ $mapel->semester }}</td>
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

@endsection

@section('footer')
@endsection