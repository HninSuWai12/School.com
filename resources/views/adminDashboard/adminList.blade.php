@extends('Dashboard.master')
@section('content')
<div class="content-wrapper">
    @include('message')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Admin List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              {{--  <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">jsGrid</li>  --}}
              <a href="{{ url('admin/add') }}">
                <div class="btn  btn-success">Add Admin</div>
            </a>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="card">

        <!-- /.card-header -->
        <div class="card-body">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th></th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($data as $item)
                  <tr>
                    <th scope="row">{{ $item->id }}</th>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                @if (Auth::user()->id != $item->id)
                <td><a href="{{ url('admin/edit/' . $item->id) }}"><i class="fa-regular btn btn-info fa-pen-to-square"></i></a></td>

                    <td><a href="{{ url('admin/delete/'. $item->id) }}"><i class="fa-solid btn btn-danger fa-trash-can"></i></a></td>

                @endif
                  </tr>

                  @endforeach

                </tbody>
              </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </section>
    <!-- /.content -->
  </div>
@endsection
