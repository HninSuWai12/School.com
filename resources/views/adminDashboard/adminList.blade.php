@extends('Dashboard.master')
@section('content')
<div class="content-wrapper">
    @include('message')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Admin Search</h1>
            </div>

          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <form class="form-inline" action="" method="get">
            @csrf
            <div class="form-group mb-2">
              <label for="staticEmail2" class="sr-only">Name</label>
              <input type="text"  class="form-control" name="name" placeholder="Enter Name">
            </div>
            <div class="form-group mx-sm-3 mb-2">
              <label for="inputPassword2" class="sr-only">Email</label>
              <input type="email" class="form-control" name="email"  placeholder="Enter Email">

            </div>
            <div class="form-group mx-sm-3 mb-2">
                <input id="datepicker" name="createdAt"   placeholder="Enter Date" width="276" />
            </div>
            <button type="submit" name="searchKey" class="btn btn-primary mb-2">Search</button>
            <a href="{{ url('admin/list') }}"><button name="searchKey" class="btn btn-success mb-2">Reset</button>


          </form>

      </section>
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
                    <th>Created At</th>
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
                    <td>{{ $item->created_at }}</td>
                @if (Auth::user()->id != $item->id)
                <td><a href="{{ url('admin/edit/' . $item->id) }}"><i class="fa-regular btn btn-info fa-pen-to-square"></i></a></td>

                    <td><a href="{{ url('admin/delete/'. $item->id) }}"><i class="fa-solid btn btn-danger fa-trash-can"></i></a></td>

                @endif
                  </tr>

                  @endforeach

                </tbody>
              </table>
        </div>
        <div class="">
            {{ $data->links() }}
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </section>
    <!-- /.content -->
  </div>


@endsection
@section('date')
<script>
    $('#datepicker').datepicker({
        uiLibrary: 'bootstrap5'
    });
</script>

@endsection


