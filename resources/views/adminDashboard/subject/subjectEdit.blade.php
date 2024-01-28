@extends('Dashboard.master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Class List </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">

              <a href="{{ url('admin/subjectList') }}">
                <div class="btn  btn-success">Back Classes</div>
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

            <form action="{{ url('admin/subjectEditPost/' . $subject->id ) }}" method="POST">
                @csrf
                <div class="form-group">
                  <label for="exampleInputEmail1">Name</label>
                  <input type="text" name="name" value="{{ $subject->subject_name}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Your Name">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Subject Type</label>
                    <select class="form-select" aria-label="Default select example" name="subjectType">
                        <option selected>{{ $subject->subject_type }}</option>
                        @foreach($type as $typeName => $typeValue)
                            <option value="{{ $typeValue }}">{{ $typeName }}</option>
                        @endforeach
                      </select>
                  </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Status</label>
                    <select class="form-select" aria-label="Default select example" name="status">
                        <option selected>{{ $subject->status }}</option>
                        @foreach($status as $statusName => $statusValue)
                            <option value="{{ $statusValue}}">{{ $statusName }}</option>
                        @endforeach
                      </select>
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
