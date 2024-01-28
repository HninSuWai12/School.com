@extends('Dashboard.master')
@section('content')
<div class="content-wrapper">
    @include('message')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <div class="col-sm-4">
                        <h1>
                            Admin List
                        </h1>
                    </div>

                    <div class="collapse navbar-collapse col-sm-4" id="navbarSupportedContent">

                        <form action="{{ route('adminSearch') }}" class="form-inline my-2 my-lg-0" method="GET">
                            @csrf
                            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="searchKey" value="{{ old('searchKey') }}">
                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                        </form>
                        <a class="ms-2" href={{ url('admin/list') }}>
                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Reset</button>
                        </a>
                    </div>
                    <div class="col-sm-4">
                        <a href="{{ url('admin/add') }}">
                            <div class="btn  btn-success">Add Member</div>
                        </a>
                    </div>
                </nav>
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
{{--  @section('date')
<script>
    $('#datepicker').datepicker({
        uiLibrary: 'bootstrap5'
    });
</script>

@endsection  --}}


