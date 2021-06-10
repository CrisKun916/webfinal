@extends('layouts.master')
@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">supplier</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active">supplier List</li>
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
                <h5 class="card-title">supplier List</h5><br>
                <a href="{{ route('suppliers.index') }}" class="btn btn-sm btn-primary"> <i class="fa fa-arrow-left"></i> Back</a><br><br>
                
                        <div class="form-group">
                            <strong>ID:</strong>
                            {{  $supplier->id }}
                        </div>
                    
                   
                        <div class="form-group">
                            <strong>Location No:</strong>
                            {{  $supplier->location_id }}
                        </div>
                    
                    
                        <div class="form-group">
                            <strong>Description:</strong>
                            {{  $supplier->description }}
                        </div>
                    
                        <div class="form-group">
                          <strong>Company Name:</strong>
                          {{  $supplier->company_name }}
                      </div>

                      <div class="form-group">
                        <strong>Phone:</strong>
                        {{  $supplier->phone_number }}
                    </div>
                    
                
                </div>
            </div>
        </div>
        
      </div>
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
@endsection


