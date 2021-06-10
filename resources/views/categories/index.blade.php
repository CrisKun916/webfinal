@extends('layouts.master')
@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Category</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active">Category List</li>
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
                <h5 class="card-title">Category List</h5><br>
                <a href="{{ route('categories.create') }}" class="btn btn-sm btn-primary"> <i class="fa fa-plus"></i> Add Category</a><br><br>
                <table class="table table-bordered datatable">
                    <thead>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @if ($categories)
                            @foreach ($categories as $key => $category)
                                <tr>
                                    <td>{{ $key++ }}</td>
                                    <td>{{ $category->name}}</td>
                                    <td>{{ $category->description}}</td>
                                    <td>
                                      <a  class="btn btn-sm btn-primary" href="{{ route('categories.show', $category->id) }}">
                                        <i class="fa fa-eye"></i> Show
                                      </a>
                                        <a  class="btn btn-sm btn-info" href="{{ route('categories.edit', $category->id) }}">
                                          <i class="fa fa-edit"></i> Edit
                                        </a>

                                        <a  class="btn btn-sm btn-danger sa-delete" href="javascript:;" data-form-id="category-delete{{ $category->id}}">
                                          <i class="fa fa-trash"></i> Delete
                                        </a>

                                        <form id="category-delete{{ $category->id}}" action="{{ route('categories.destroy', $category->id)}}" method="post">
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
