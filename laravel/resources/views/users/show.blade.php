@extends('layouts.app')

@section('content')

<div class="col-md-12">

  <div class="card">
    <div class="card-header">
      <div class="float-left">
        <h2>{{ __('Show User') }}</h2>
      </div>

      <div class="float-right">
        <a class="btn btn-primary" href="{{ route('users.index') }}">{{ __('Back') }}</a>
      </div>
    </div>

    <div class="card-body">
      @if (session('status'))
      <div class="alert alert-success" role="alert">
        {{ session('status') }}
      </div>
      @endif

      <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12">
          <div class="form-group">
            <strong>Name:</strong>
            {{ $user->name }}
          </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
          <div class="form-group">
            <strong>Details:</strong>
            {{ $user->detail }}
          </div>
        </div>
      </div>

    </div>

    <div class="card-footer"></div>
  </div>

</div>
@endsection
