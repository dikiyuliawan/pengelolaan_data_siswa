@extends('layout.master')

@section('title', 'Post')

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
                      <h3 class="panel-title">Data Post</h3>
                      <div class="right">     
                        <button class="lnr lnr-plus-circle" data-toggle="modal" data-target="#exampleModal">
                          Add New Post
                        </button>
                      </div>
                    </div>
                    <div class="panel-body no-padding">
                      <table class="table table-hover text-nowrap">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>User</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($post as $p)
                              <tr>
                                  <td>{{ $p->id }}</td>
                                  <td>{{ $p->title }}</td>
                                  <td>{{ $p->user->name }}</td>
                                  <td>
                                    <a href="{{ route('site.single.post', $p->slug) }}" target="_blank" class="btn btn-sm btn-info" style="float: left">View</a>
                                    <a href="/post/{{ $p->id }}/edit" class="btn btn-sm btn-success" style="float: left">Edit</a>
                                    <form action="/post/{{ $p->id }}" method="post" class="d-inline">
                                      @method('delete')
                                      @csrf
                                      <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')">Delete</button>
                                    </form>
                                  </td>
                              </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
@endsection