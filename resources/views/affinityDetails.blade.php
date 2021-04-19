@extends('layouts.app');
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
<title>Affinity Groups</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

</head>
@section('content')
<body>
	<h1>{{$affinity->getTitle()}} Group</h1>
<div>
	<div class="row">
        @foreach($users as $user)
        <div class="col-sm-3">
            <div class="card" style="margin: 25px 50px;">
              <div class="card-body" >
                <h5 class="card-title">{{$user->getName()}}</h5>
                <br/>
                <p>{{$user->getEmail()}}</p>
              </div>
            </div>
        </div>
    @endforeach
    </div>
    @if(!$owner)
        @if(!$joined)
        	<form action="/TogetherPeopleStrong/viewAffinity/addThisAffinity" method="get">
        	<button type="submit" class="btn btn-primary">Join Group</button>
        	</form>
        @else
        	<form action="/TogetherPeopleStrong/viewAffinity/removeThisAffinity" method="get">
        	<button type="submit" class="btn btn-danger">Leave Group</button>
        	</form>
        @endif
    @else
    	<form action="/TogetherPeopleStrong/viewAffinity/editThisAffinity" method="get">
        	<button type="submit" class="btn btn-primary">Edit Group</button>
    	</form>
    	<form action="/TogetherPeopleStrong/viewAffinity/deleteThisAffinity" method="get">
        	<button type="submit" class="btn btn-danger">Delete Group</button>
    	</form>
	@endif
</div>
</body>
@endsection