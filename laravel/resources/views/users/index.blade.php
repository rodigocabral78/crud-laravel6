@extends('layouts.app')

@section('content')

<div class="col-md-12">

    <div class="card">
        <div class="card-header">{{ __('Dashboard') }}</div>

        <div class="card-body">
            <div class="float-right">
                <button type="button" class="btn btn-primary">First Button</button>
                <button type="button" class="btn btn-secondary">Second Button</button>
            </div>

            <a class="btn btn-success float-right" href="{{ route('users.create') }}"> {{ __('Create New User') }}</a>
            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif

            {{ __('User list!') }}

            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
            @endif

            <br><br>

            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <tr style="text-align: center;">
                        <th>#</th>
                        <th>{{ __('Name') }}</th>
                        <th>{{ __('Email') }}</th>
                        <th width="192px">{{ __('Action') }}</th>
                    </tr>

                    @foreach ($users as $user)
                    <tr>
                        <td style="text-align: center;">{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td style="text-align: center;">
                            <form action="{{ route('users.destroy',$user->id) }}" method="POST">
                                <a class="btn btn-info" href="{{ route('users.show',$user->id) }}">Show</a>
                                <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </table>

                {!! $users->links() !!}
            </div>
        </div>
    </div>

</div>

<dir></dir>
<div class="col-lg-12">

    <div class="card">
        <div class="card-header">
            <div class="pull-left">
                <h2>Laravel 6 CRUD Example from scratch - ItSolutionStuff.com</h2>
            </div>

            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('users.create') }}"> Create New User</a>
            </div>
        </div>

        <div class="card-body">
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
            @endif

            <table class="table table-bordered">
                <tr style="text-align: center;">
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th width="192px">Action</th>
                </tr>

                @foreach ($users as $user)
                <tr>
                    <td style="text-align: center;">{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td style="text-align: center;">
                        <form action="{{ route('users.destroy',$user->id) }}" method="POST">
                            <a class="btn btn-info" href="{{ route('users.show',$user->id) }}">Show</a>
                            <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>

            {!! $users->links() !!}

        </div>
    </div>

</div>
@endsection
