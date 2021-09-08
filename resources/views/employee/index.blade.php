@extends('layouts.master')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-1">
                <div class="col-sm-6">
                    <h4 class="m-0">Employees</h4>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content-header -->

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-primary">
                        <h5 class="card-header">All Companies Employees</h5>
                        <div class="card-body">
                            <table class="table table-striped projects" id="employees-table">
                                <thead>
                                    <tr>
                                        <th style="width: 20%">First name</th>
                                        <th style="width: 20%">Last name</th>
                                        <th style="width: 20%">Email</th>
                                        <th style="width: 20%">Phone</th>
                                        <th style="width: 20%">Company</th>
                                    </tr>
                                </thead>
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
        $(document).ready(function(){
            $('#employees-table').DataTable({
                processing: true,
                serverSider: true,
                ajax: "{!! route('dataTableEmployee') !!}",
                columns: [
                    {data: 'firstname', name: 'firstname'},
                    {data: 'lastname', name: 'lastname'},
                    {data: 'email', name: 'email'},
                    {data: 'phone', name: 'phone'},
                    {data: 'name', name: 'name'},
                ]
            })
        })
    </script>
@endsection