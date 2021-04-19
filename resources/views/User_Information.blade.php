@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Information') }}</div>

                <div class="card-body">
                    <form method="POST" action="userInfo">
                        @csrf
						@if($exists)
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{Auth::user()->name}}" readonly>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="position" class="col-md-4 col-form-label text-md-right">{{ __('Current Position Or Last Held Position') }}</label>

                            <div class="col-md-6">
                                <input id="position" type="text" class="form-control" name="position" value="{{$portfolio->getPosition()}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="experience" class="col-md-4 col-form-label text-md-right">{{ __('Work Experience') }}</label>

                            <div class="col-md-6">
                                <input id="experience" type="text" class="form-control" name="experience" value="{{$portfolio->getExperience()}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="proficiencies" class="col-md-4 col-form-label text-md-right">{{ __('Proficiencies') }}</label>

                            <div class="col-md-6">
                                <input id="proficiencies" type="text" class="form-control" name="proficiencies" value="{{$portfolio->getProficiencies()}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="bio" class="col-md-4 col-form-label text-md-right">{{ __('User Bio') }}</label>

                            <div class="col-md-6">
                                <textarea class="form-control" id="bio" name="bio" placeholder="User Bio" rows="5">{{$portfolio->getBio()}}</textarea>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update') }}
                                </button>
                            </div>
                        </div>
                        @else
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{Auth::user()->name}}" readonly>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="position" class="col-md-4 col-form-label text-md-right">{{ __('Current Position Or Last Held Position') }}</label>

                            <div class="col-md-6">
                                <input id="position" type="text" class="form-control" name="position">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="experience" class="col-md-4 col-form-label text-md-right">{{ __('Work Experience') }}</label>

                            <div class="col-md-6">
                                <input id="experience" type="text" class="form-control" name="experience">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="proficiencies" class="col-md-4 col-form-label text-md-right">{{ __('Proficiencies') }}</label>

                            <div class="col-md-6">
                                <input id="proficiencies" type="text" class="form-control" name="proficiencies">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="bio" class="col-md-4 col-form-label text-md-right">{{ __('User Bio') }}</label>

                            <div class="col-md-6">
                                <textarea class="form-control" id="bio" name="bio" placeholder="User Bio" rows="5"></textarea>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Create') }}
                                </button>
                            </div>
                        </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
