@extends('Dashboard.master')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Add Class</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            {{--  <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">jsGrid</li>  --}}
                            <a href="{{ url('admin/subjectList') }}">
                                <div class="btn  btn-info">Back Subject</div>
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
                    <form action="{{ url('admin/subjectAddPost') }}" method="POST">
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
                            <label for="exampleInputEmail1">Subject Type</label>
                            <select class="form-select" aria-label="Default select example" name="subjectType">
                                <option selected disabled>Select subject type</option>
                                @foreach($type as $typeName => $typeValue)
                                    <option value="{{ $typeValue }}">{{ $typeName }}</option>
                                @endforeach
                              </select>
                                @if ($errors->has('subjectType'))
                                <div class="text-red">
                                    {{ $errors->first('subjectType') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Status</label>
                            <select class="form-select" aria-label="Default select example" name="status">
                                <option selected disabled>Open the status</option>
                                @foreach($status as $statusName => $statusValue)
                                    <option value="{{ $statusValue }}">{{ $statusName }}</option>
                                @endforeach
                              </select>
                                @if ($errors->has('status'))
                                <div class="text-red">
                                    {{ $errors->first('status') }}
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
