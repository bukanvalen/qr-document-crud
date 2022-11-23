@extends('layouts.master')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">TTD-QR</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">TTD-QR</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">

            <div class="card">
                <div class="card-body">
                    <h1 class="text-center">Mohon login untuk membuat tanda tangan QR</h1>                    
                </div>
            </div>

        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection

@section('addCss')
    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap4.min.css') }}">
@endsection

@section('addJavascript')
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>

    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
    <script>
        $(function() {
            $("#data-table").DataTable();
        })
    </script>
    <script src="{{ asset('js/sweetalert.min.js') }}"></script>
    <script>
        confirmDelete = function(button) {
            var url = $(button).data('url');
            swal({
                'title': 'Delete Confirmation',
                'text': 'Delete the selected record?',
                'dangerMode': true,
                'buttons': true
            }).then(function(value) {
                if (value) {
                    window.location = url;
                }
            })
        }

        confirmEdit = function(button) {
            var url = $(button).data('url');
            swal({
                'title': 'Edit Confirmation',
                'text': 'Edit the selected record?',
                'buttons': true
            }).then(function(value) {
                if (value) {
                    window.location = url;
                }
            })
        }

        confirmAdd = function(button) {
            var url = $(button).data('url');
            swal({
                'title': 'Add Confirmation',
                'text': 'Add a new record?',
                'buttons': true
            }).then(function(value) {
                if (value) {
                    window.location = url;
                }
            })
        }
    </script>
@endsection
