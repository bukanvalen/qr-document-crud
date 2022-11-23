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
                        <li class="breadcrumb-item active">Show Signature</li>
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
                    <form>
                        <div class="form-group">
                            <label for="name">Sender</label>
                            <input type="text" name="name" id="name" class="form-control" required="required"
                                value="{{ $user->name }}" disabled>
                        </div>

                        <div class="form-group">
                            <label for="name">Receiver</label>
                            <input type="text" name="receiver" id="receiver" class="form-control" required="required"
                                value="{{ $signature->receiver }}" disabled>
                        </div>

                        <div class="form-group">
                            <label for="description">Subject</label>
                            <textarea name="subject" id="subject" rows="3" class="form-control" required="required" disabled>{{ $signature->subject }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="name">Designation</label>
                            <input type="text" name="designation" id="designation" class="form-control"
                                required="required" value="{{ $signature->designation }}" disabled>
                        </div>

                        <div class="form-group">
                            <label for="image">Document</label><br>
                            <a href="{{ route('signature.download', ['id' => $signature->id]) }}" download>
                                {{ $signature->document }}
                            </a>
                        </div>

                        <div class="form-group">
                            <label for="image">QR Code</label><br>
                            {{ QrCode::size(300)->style('round')->generate(route('signature.show', ['id' => $signature->id])) }}
                        </div>

                        @auth()
                            <div class="text-right">
                                <a href="{{ route('signature.index') }}" class="btn btn-outline-secondary mr-2"
                                    role="button">Go Back</a>
                            </div>
                        @endauth
                    </form>
                </div>
            </div>


        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection
