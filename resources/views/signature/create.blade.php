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
                        <li class="breadcrumb-item active">Create Signature</li>
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
                    <form action="{{ route('signature.store') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="name">Sender</label>
                            <input type="text" name="name" id="name" class="form-control" required="required"
                                value="{{ Auth::user()->name }}" disabled>
                            <input type="number" name="id_user" id="id_user" value="{{ Auth::id() }}" hidden>
                        </div>

                        <div class="form-group">
                            <label for="name">Receiver</label>
                            <input type="text" name="receiver" id="receiver" class="form-control" required="required"
                                placeholder="Enter receiver name">
                        </div>

                        <div class="form-group">
                            <label for="description">Subject</label>
                            <textarea name="subject" id="subject" rows="3" class="form-control" required="required"
                                placeholder="Enter subject"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="name">Designation</label>
                            <input type="text" name="designation" id="designation" class="form-control"
                                required="required" placeholder="Enter designaton">
                        </div>

                        <div class="form-group">
                            <label for="image">Document</label>
                            <input type="file" accept=".pdf, .docx, .doc, .odt" class="form-control p-1" required
                                name="document">
                        </div>

                        <div class="text-right">
                            <a href="{{ route('signature.index') }}" class="btn btn-outline-secondary mr-2"
                                role="button">Cancel</a>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>


        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection
