@extends('layouts.master')
@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Suppliers</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active">Create Suppliers</li>
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
        <div class="col-lg-12">

          <div class="card card-primary card-outline">
            <div class="card-body">
                <h5 class="card-title">Create Supplier</h5><br>
                <form role="form" action="{{route('suppliers.store') }}" method="post">
                    @csrf
                    <div class="card-body">
                      <div class="form-group">
                        <label for="Company">Company Name</label>
                        <input name="company_name" type="text" class="form-control" placeholder="Enter Company Name">

                        <label for="Phone">Phone Number</label>
                        <input name="phone_number" type="text" class="form-control" placeholder="Enter Phone Number">
                        
                        <label for="location">Location</label>
                        <select name="location_id"  class="form-control">
                            <option value="" active>Choose location</option>
                            @foreach($locations as $location)
                            <option value="{{ $location->id }}"> {{$location->municipality}} </option>
                            @endforeach
                        </select>

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
