@extends('layouts.app')

@section('content')

<div class="col-md-12">

  <div class="card">
    <div class="card-header">
      <div class="float-left">
        <h2>{{ __('Add New User') }}</h2>
      </div>

      <div class="float-right">
        <a href="{{ route('users.index') }}" class="btn btn-secondary"><i class="bi bi-arrow-left-circle-fill"></i>
          {{ __('Back') }}</a>
      </div>
    </div>

    <div class="card-body">
      @if (session('status'))
      <div class="alert alert-success" role="alert">
        {{ session('status') }}
      </div>
      @endif

      @if ($errors->any())
      <div class="alert alert-danger">
        <strong>{{ __('Whoops!') }}</strong> {{ __('There were some problems with your input.') }}<br><br>
        <ul>
          @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
      @endif

      <form action="{{ route('users.store') }}" method="POST">
        @csrf
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
              <strong>{{ __('Name') }}</strong>
              <input type="text" name="name" class="form-control" placeholder="Name">
            </div>
          </div>

          <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
              <strong>{{ __('Detail') }}</strong>
              <textarea class="form-control" style="height:150px" name="detail" placeholder="Detail"></textarea>
            </div>
          </div>

          <div class="col-xs-12 col-sm-12 col-md-12 text-right">
            <a href="{{ route('users.index') }}" class="btn btn-dark"><i class="bi bi-x-circle-fill text-danger"></i>
              {{ __('Cancel') }}</a>
            <button type="submit" class="btn btn-success"><i class="bi bi-plus-circle-fill"></i>
              {{ __('Save') }}</button>
          </div>
        </div>
      </form>

    </div>

    <div class="card-footer"></div>
  </div>

</div>
@endsection
