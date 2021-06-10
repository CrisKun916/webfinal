@extends('layouts.master')
@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">product</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active">product List</li>
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
                <h5 class="card-title">product List</h5><br>
                <a href="{{ route('products.index') }}" class="btn btn-sm btn-primary"> <i class="fa fa-arrow-left"></i> Back</a><br><br>
                
                        <div class="form-group">
                            <strong>ID:</strong>
                            {{  $product->id }}
                        </div>
                    
                   
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{  $product->name }}
                        </div>
                    
                    
                        <div class="form-group">
                            <strong>Description:</strong>
                            {{  $product->description }}
                        </div>
                    
                        <div class="form-group">
                          <strong>Stock Quantity:</strong>
                          {{  $product->qty_stock }}
                      </div>
                      <div class="form-group">
                        <strong>Price:</strong>
                        {{  $product->price }}
                    </div>

                      <div class="form-group">
                        <strong>Category ID:</strong>
                        {{  $product->cat_id }}
                    </div>

                    <div class="form-group">
                      <strong>Supplier ID:</strong>
                      {{  $product->supplier_id }}
                  </div>
                    
                
                </div>
            </div>
        </div>
        
      </div>
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
@endsection


