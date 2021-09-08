@extends('layouts.master')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-1">
          <div class="col-sm-6">
            <h4 class="m-0">Companies</h4>
          </div>
        </div>
      </div>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-8">
            <!-- general form elements -->
            <div class="card card-primary">
              <h5 class="card-header">
                New Company
              </h5>

              @if ($errors->any())
                <div class="alert alert-danger">
                  <ul>
                    @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                  </ul>
                </div>
              @endif

              <!-- form start -->
              <form action="{{ route('companies.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
                      </div>
                    </div>
                  </div>
                  
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="logo">Logo</label>
                        <input type="file" class="form-control" id="logo" name="logo">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="website">Website</label>
                        <input type="url" class="form-control" id="website" name="website" placeholder="Enter website">
                      </div>
                    </div>
                  </div>
                </div>

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Add</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
          <div class="card card-primary">
                <h5 class="card-header">
                  All Companies
                </h5>
                <div class="card-body p-0">
                    <table class="table table-striped projects">
                        <thead>
                            <tr>
                                <th style="width: 20%">
                                    Name
                                </th>
                                <th style="width: 10%">
                                    Logo
                                </th>
                                <th>
                                    Email
                                </th>
                                <th style="width: 20%">
                                    Website
                                </th>
                                <th style="width: 30%">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($companies as $company)
                                <tr>
                                    <td>{{ $company->name }}</td>
                                    <td><img src="{{ asset('storage/logos/'.$company->logo) }}" alt="logo" width="40"></td>
                                    <td>{{ $company->email }}</td>
                                    <td>{{ $company->website }}</td>
                                    <td class="project-actions">
                                        <a class="btn btn-info btn-sm" href="{{ route('companies.edit', $company) }}">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                            Edit
                                        </a>
                                        <a class="btn btn-success btn-sm" href="{{ route('companies.employees.create', $company) }}">
                                          <i class="fas fa-user-plus"></i>
                                            Employees
                                        </a>
                                        <a class="btn btn-danger btn-sm delete"
                                            href="#"
                                            data-toggle="modal" 
                                            data-target="#modal-danger"
                                            data-id="{{$company}}"
                                            data-target="#modal-danger"
                                            >
                                            <i class="fas fa-trash">
                                            </i>
                                            Delete
                                        </a>
                                        <div class="modal fade" id="modal-danger">
                                            <div class="modal-dialog">
                                              <div class="modal-content bg-danger">
                                                <form action="{{ route('companies.destroy', $company) }}" method="post">
                                                  @csrf
                                                  @method('DELETE')
              
                                                <div class="modal-header">
                                                  <h4 class="modal-title">Confirm</h4>
                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                  </button>
                                                </div>
                                                <div class="modal-body">
                                                  <p>Are you sure want to delete? {{ $company->name }}</p>
                                                </div>
                                                <div class="modal-footer justify-content-between">
                                                  <button type="button" class="btn btn-outline-light" data-dismiss="modal">No</button>
                                                  <button type="submit" class="btn btn-outline-light">Yes</button>
                                                </div>
                                                </form>
                                              </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr><td colspan="5" class="text-center">No records found!</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).on('click','.delete',function(){
         let id = $(this).attr('data-id');
         $('#id').val(id);
        });
    </script>
@endsection
