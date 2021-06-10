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
                <a href="{{ route('locations.create') }}" class="btn btn-sm btn-primary"> <i class="fa fa-plus"></i> Add location</a><br><br>
                <table class="table table-bordered datatable">
                    <thead>
                        <th>ID</th>
                        <th>Province</th>
                        <th>Municipality</th>
                        <th>Barangay</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @if ($locations)
                            @foreach ($locations as $key => $location)
                                <tr>
                                    <td>{{ $key++ }}</td>
                                    <td>{{ $location->province}}</td>
                                    <td>{{ $location->municipality}}</td>
                                    <td>{{ $location->barangay}}</td>
                                    <td>
                                      <a  class="btn btn-sm btn-primary" href="{{ route('locations.show', $location->id) }}">
                                        <i class="fa fa-eye"></i> Show
                                      </a>
                                        <a  class="btn btn-sm btn-info" href="{{ route('locations.edit', $location->id) }}">
                                          <i class="fa fa-edit"></i> Edit
                                        </a>

                                        <a  class="btn btn-sm btn-danger sa-delete" href="javascript:;" data-form-id="location-delete{{ $location->id}}">
                                          <i class="fa fa-trash"></i> Delete
                                        </a>

                                        <form id="location-delete{{ $location->id}}" action="{{ route('locations.destroy', $location->id)}}" method="post">
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
