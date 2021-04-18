@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Information') }}</div>

                <div class="card-body">
                    <form method="POST" action="userInfoUpdate">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{$user->getUsername()}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control" name="email" value="{{$user->getEmail()}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="ssn" class="col-md-4 col-form-label text-md-right">{{ __('Social Security Number') }}</label>

                            <div class="col-md-6">
                                @if($exists)<input id="ssn" type="text" class="form-control" name="ssn" value="{{$user->getSsn()}}">
                                @else <input id="ssn" type="text" class="form-control" name="ssn" value="{{$user->getSsn()}}" readonly>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button id="addSsn" name="addSsn" type="submit" class="btn btn-primary">
                                    {{ __('Update') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
