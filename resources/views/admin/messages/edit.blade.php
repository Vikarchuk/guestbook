@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div class="card-header">Create message</div>
                        <div class="row">
                            <div class="col-lg-12 margin-tb">
                                <div class="pull-right">
                                    <a class="btn btn-primary" href="{{ route('admin.messages.index') }}" title="Go back"> Go back </a>
                                </div>
                            </div>
                        </div>
                        @include('parts.errorsChecking')
                        <form action="{{ route('admin.messages.update',['message' => $message->id]) }}" method="POST" >
                            @method('PUT')
                            @csrf
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Name:</strong>
                                        <input type="text" name="name" class="form-control" value="{{ old('name') ?? $message->name }}" required maxlength="100">
                                    </div>
                                    <div class="form-group">
                                        <strong>Email:</strong>
                                        <input type="email" name="email" class="form-control" value="{{ old('email') ?? $message->email }}" required>
                                    </div>
                                    <div class="form-group">
                                        <strong>Message:</strong>
                                        <textarea name="description" class="form-control" rows="5" cols="30" maxlength="1000" required>
                                        {{ old('description') ?? $message->description }}
                                    </textarea>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
