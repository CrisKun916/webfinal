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
            <li class="breadcrumb-item active">location List</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">

          <div class="card card-primary card-outline">
            <div class="card-body">
                <h5 class="card-title">location List</h5><br>
                <a href="{{ route('locations.index') }}" class="btn btn-sm btn-primary"> <i class="fa fa-arrow-left"></i> Back</a><br><br>
                
                        <div class="form-group">
                            <strong>ID:</strong>
                            {{  $location->id }}
                        </div>
                    
                   
                        <div class="form-group">
                            <strong>Province:</strong>
                            {{  $location->province }}
                        </div>
                    
                    
                        <div class="form-group">
                            <strong>Municipality:</strong>
                            {{  $location->municipality }}
                        </div>
                    
                    
                    
                        <div class="form-group">
                            <strong>Barangay:</strong>
                            {{  $location->barangay }}
                        </div>
                    
                
                </div>
            </div>
        </div>
        
      </div>
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
@endsection


