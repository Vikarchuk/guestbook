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
                                <div class="pull-right">
                                    <a class="btn btn-success" href="{{ route('messages.create') }}" title="Create a message"> Add message
                                    </a>
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
                                    {{ $messages->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
