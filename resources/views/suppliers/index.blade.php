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
                <a href="{{ route('suppliers.create')}}" class="btn btn-sm btn-primary"> <i class="fa fa-plus"></i> Add supplier</a><br><br>
                <table class="table table-bordered datatable">
                    <thead>
                        <th>ID</th>
                        <th>Location ID</th>
                        <th>Company Name</th>
                        <th>Phone</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @if ($suppliers)
                            @foreach ($suppliers as $key => $supplier)
                                <tr>
                                    <td>{{ $key++ }}</td>
                                    <td>{{ $supplier->location_id }}</td>
                                    <td>{{ $supplier->company_name }}</td>
                                    <td>+63 {{ $supplier->phone_number }}</td>

                                    <td>
                                      <a  class="btn btn-sm btn-primary" href="{{ route('suppliers.show', $supplier->id) }}">
                                        <i class="fa fa-eye"></i> Show
                                      </a>
                                        <a  class="btn btn-sm btn-info" href="{{ route('suppliers.edit', $supplier->id) }}">
                                          <i class="fa fa-edit"></i> Edit
                                        </a>

                                        <a  class="btn btn-sm btn-danger sa-delete" href="javascript:;" data-form-id="supplier-delete{{ $supplier->id}}">
                                          <i class="fa fa-trash"></i> Delete
                                        </a>

                                        <form id="supplier-delete{{ $supplier->id}}" action="{{ route('suppliers.destroy', $supplier->id)}}" method="post">
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
