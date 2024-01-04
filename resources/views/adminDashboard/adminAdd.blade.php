@extends('Dashboard.master')
@section('content')
    <div class="content-wrapper">
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
                            <div class="btn  btn-success">Add Admin</div>
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
                    <form action="{{ url('admin/addPost') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name</label>
                            <input type="text" name="name" value="{{ old('name') }}" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" placeholder="Enter Your Name">
                            @if ($errors->has('name'))
                                <div class="text-red">
                                    {{ $errors->first('name') }}
                                </div>
                            @endif

                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="email" name="email" value="{{ old('email') }}" class="form-control"
                                id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Your Email">
                                @if ($errors->has('email'))
                                <div class="text-red">
                                    {{ $errors->first('email') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Password</label>
                            <input type="password" name="password" value="{{ old('password') }}" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" placeholder="Enter Password">
                                @if ($errors->has('password'))
                                <div class="text-red">
                                    {{ $errors->first('password') }}
                                </div>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>

                    </form>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </section>
        <!-- /.content -->
    </div>
@endsection
