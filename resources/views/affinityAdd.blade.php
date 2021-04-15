@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add Affinity') }}</div>

                <div class="card-body">
                	@if(!(isset($affinities)))
                    <form method="POST" action="checkAffinity">
                        @csrf

                        <div class="form-group row">
                            <label for="affinity" class="col-md-4 col-form-label text-md-right">{{ __('Enter the affinity you want to add') }}</label>

                            <div class="col-md-6">
                                <input id="affinity" type="text" class="form-control" name="affinity">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Search') }}
                                </button>
                            </div>
                        </div>
                    </form>
                    @else
                    @foreach($affinities as $title)
                        <tr>
                        	<form action="addThisAffinity" method="POST">
                        		{{csrf_field()}}
                        		<td>{{$title}}<input type="hidden" id="title" name="title" value="{{$title}}"></td>
                        		</td>
                        		<td><button type="submit">Add</button></td>
                        	</form>
                        </tr>
                    @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
