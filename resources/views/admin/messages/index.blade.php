@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Messages</div>

                    <div class="card-body">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-body table-responsive no-padding">
                                    <table class="table table-hover">
                                        <tbody><tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Actions</th>
                                        </tr>
                                        @foreach ($messages as $message)
                                            <tr>
                                                <td>{{ $message->id }}</td>
                                                <td>{{ $message->name }}</td>
                                                <td>{{ $message->email }}</td>
                                                <td>
                                                <td>
                                                    <form action="{{ route('admin.messages.destroy', $message->id) }}" method="POST">
                                                        <a class="btn btn-primary" href="{{ route('admin.messages.edit', $message->id) }}">
                                                            Edit
                                                        </a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-primary" type="submit" title="delete">
                                                            Delete
                                                        </button>
                                                    </form>
                                                </td>
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
