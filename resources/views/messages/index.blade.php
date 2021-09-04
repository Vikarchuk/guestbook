@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Messages</div>
                    <div class="card-body">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="row">
                                    <div class="col">
                                        <a class="btn btn-success" href="{{ route('messages.create') }}" title="Create a message">
                                            Add message
                                        </a>
                                    </div>
                                    <div class="col">
                                        <a class="btn btn-primary" href="{{ route('admin.messages.index') }}" title="Administration">
                                            Administration
                                        </a>
                                    </div>
                                </div>
                                <div class="box-body table-responsive no-padding">
                                    <table class="table table-hover">
                                        <tbody><tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                        </tr>
                                        @foreach ($messages as $message)
                                            <tr>
                                                <td>{{ $message->id }}</td>
                                                <td>{{ $message->name }}</td>
                                                <td>{{ $message->email }}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    <div class="d-flex justify-content-center">
                                        {!!$messages->links('vendor.pagination.bootstrap-4')!!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
