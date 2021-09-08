@extends('layouts.master')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-1">
                <div class="col-sm-6">
                    <h4 class="m-0">Todos</h4>
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
                    @livewire('create-todo')
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    @livewire('todos-table', ['todos' => $todos])
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script>
    $('.addAttr').click(function() {
        var id = $(this).data('id');   
        $('#id').val(id); 
    });
</script>
@endsection