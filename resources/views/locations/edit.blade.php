@extends('layouts.master')
@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">location</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active">Edit location</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>

  @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There are problems to your input <br><br>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-6">

          <div class="card card-primary card-outline">
            <div class="card-body">
                <h5 class="card-title">Edit location</h5><br>
                <a href="{{ route('locations.index') }}" class="btn btn-sm btn-primary"> <i class="fa fa-arrow-left"></i> Back</a><br><br>
                <form role="form" action="{{route('locations.update',$location->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                      <div class="form-group">

                        <label for="Barangay">Province</label>
                          <input name="province" type="text" class="form-control" value="{{ $location->province }}"  placeholder="Enter Province">

                        <label for="Barangay">Municipality</label>
                          <input name="municipality" type="text" class="form-control" value="{{ $location->municipality }}"  placeholder="Enter Municipality">

                        <label for="Barangay">Barangay</label>
                          <input name="barangay" type="text" class="form-control" value="{{ $location->barangay }}"  placeholder="Enter Barangay">
                          
                        
                        
                      </div>
                    </div>
                    <!-- /.card-body -->
    
                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-save"></i> Submit</button>
                    </div>
                  </form>
    
                </div>
            </div>
        </div>
        
      </div>
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
@endsection