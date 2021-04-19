@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Update Affinity') }}</div>

                <div class="card-body">
                    <form method="POST" action="processEditAffinity">
                        @csrf

                        <div class="form-group row">
                            <label for="affinity" class="col-md-4 col-form-label text-md-right">{{ __('Enter the new title of the group') }}</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control" name="title" value="{{$affinity->getTitle()}}">
                                <input id="id" type="hidden" name="id" value="{{$affinity->getId()}}">
                                <input id="ownerID" type="hidden" name="ownerID" value="{{$affinity->getOwner()}}">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
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
