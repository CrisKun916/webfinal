@extends('layouts.master')
@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Product</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active">Edit Product</li>
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
                <h5 class="card-title">Edit Products</h5><br>
                <a href="{{ route('products.index') }}" class="btn btn-sm btn-primary"> <i class="fa fa-arrow-left"></i> Back</a><br><br>
                <form role="form" action="{{route('products.update',$products->id) }}" method="post">
                  @csrf
                  @method('PUT')
                  <div class="card-body">
                    <div class="form-group">
                      <label for="name">Product Name</label>
                      <input name="name" type="text" class="form-control" placeholder="Enter product Name">

                      <label for="description">Description</label>
                      <input name="description" type="text" class="form-control" placeholder="Enter Description">

                      <label for="qty_stock">Stock Quantity</label>
                      <input name="qty_stock" type="text" class="form-control" placeholder="Enter Stock Quantity">
                      
                      <label for="price">Price</label>
                      <input name="price" type="text" class="form-control" placeholder="Enter product price">
                      

                      <label for="cat_id">Category</label>
                      <select name="cat_id"  class="form-control">
                          <option value="" active>Choose Category</option>
                          @foreach($categories as $category)
                          <option value="{{ $category->id }}"> {{$category->name}} </option>
                          @endforeach
                      </select>

                      <label for="supplier_id">Supplier</label>
                      <select name="supplier_id"  class="form-control">
                          <option value="" active>Choose Supplier</option>
                          @foreach($suppliers as $supplier)
                          <option value="{{ $supplier->id }}"> {{$supplier->company_name}} </option>
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