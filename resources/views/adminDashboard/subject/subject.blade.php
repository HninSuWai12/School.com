@extends('Dashboard.master')
@section('content')
    <div class="content-wrapper">
        @include('message')
        <!-- Content Header (Page header) -->


        <!-- Main content -->

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <nav class="navbar navbar-expand-lg navbar-light bg-light">
                        <div class="col-sm-4">
                            <h1>
                                Subject List
                            </h1>
                        </div>

                        <div class="collapse navbar-collapse col-sm-4" id="navbarSupportedContent">

                            <form action="{{ route('subjectSearch') }}" class="form-inline my-2 my-lg-0" method="GET">
                                @csrf
                                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="searchKey">
                                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                            </form>
                            <a class="ms-2" href={{ url('admin/subjectList') }}>
                                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Reset</button>
                            </a>
                        </div>
                        <div class="col-sm-4">
                            <a href="{{ url('admin/subjectAdd') }}">
                                <div class="btn  btn-success">Add Subject</div>
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
                                <th scope="col">Class Name</th>
                                <th scope="col">Subject Type</th>
                                <th scope="col">Status</th>


                                <th>Created By</th>
                                <th>Created At</th>

                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    <th scope="row">{{ $item->id }}</th>
                                    <td>{{ $item->subject_name }}</td>
                                    <td>{{ $item->status }}</td>
                                    <td>{{ $item->subject_type }}</td>
                                    <td>{{ Auth::user()->name }}</td>
                                    <td>{{ $item->created_at }} </td>

                                    <td><a href="{{ url('admin/subjectEdit/' . $item->id) }}"><i
                                                class="fa-regular btn btn-info fa-pen-to-square"></i></a></td>

                                    <td><a href="{{ url('admin/subjectDelete/' . $item->id) }}"><i
                                                class="fa-solid btn btn-danger fa-trash-can"></i></a></td>

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
