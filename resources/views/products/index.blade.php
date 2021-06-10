
@extends('layouts.master')
@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Products</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active">Product List</li>
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
                <h5 class="card-title">Product List</h5><br>
                <a href="{{ route('products.create') }}" class="btn btn-sm btn-primary"> <i class="fa fa-plus"></i> Add Product</a><br><br>
                <table class="table table-bordered datatable">
                    <thead>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Stock Quantity</th>
                        <th>Price</th>
                        <th>Category ID</th>
                        <th>Supplier ID</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @if ($products)
                            @foreach ($products as $key => $product)
                                <tr>
                                    <td>{{ $key++ }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->description }}</td>
                                    <td>{{ $product->qty_stock }}</td>
                                    <td>{{ $product->price }}</td>
                                    <td>{{ $product->cat_id }}</td>
                                    <td>{{ $product->supplier_id }}</td>
                                    <td>
                                      <a  class="btn btn-sm btn-primary" href="{{ route('products.show', $product->id) }}">
                                        <i class="fa fa-eye"></i> Show
                                      </a>
                                        <a  class="btn btn-sm btn-info" href="{{ route('products.edit', $product->id) }}">
                                          <i class="fa fa-edit"></i> Edit
                                        </a>

                                        <a  class="btn btn-sm btn-danger sa-delete" href="javascript:;" data-form-id="product-delete{{ $product->id}}">
                                          <i class="fa fa-trash"></i> Delete
                                        </a>

                                        <form id="product-delete{{ $product->id}}" action="{{ route('products.destroy', $product->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')

                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            
                        @endif
                    </tbody>
                </table>
    
                </div>
            </div>
        </div>
        
      </div>
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
@endsection



