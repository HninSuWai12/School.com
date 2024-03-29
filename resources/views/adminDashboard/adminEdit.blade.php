@extends('Dashboard.master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Admin List Edit</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">

              <a href="{{ url('admin/list') }}">
                <div class="btn  btn-success">Back Member List</div></a>
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

            <form action="{{ url('admin/postEdit/' . $page->id) }}" method="POST">
                @csrf
                <div class="form-group">
                  <label for="exampleInputEmail1">Name</label>
                  <input type="text" name="name" value="{{ $page->name }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Your Name">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" name="email" value="{{ $page->email }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Your Email">
                  </div>
                  <div class="form-group">
                            <label for="exampleInputEmail1">Type</label>
                            <select class="form-select" aria-label="Default select example" name="type">
                                <option selected>{{ $page->user_type }}</option>
                                @foreach($type as $typeName => $typeValue)
                                    <option value="{{ $typeValue }}">{{ $typeName }}</option>
                                @endforeach
                              </select>
                                @if ($errors->has('type'))
                                <div class="text-red">
                                    {{ $errors->first('type') }}
                                </div>
                            @endif
                        </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Password">
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
