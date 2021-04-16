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
<table class="table" style="width:100%">
    <thead class="thead-dark">
        <tr>
        <th scope="col">Members</th>
        </tr>
    </thead>
    <tbody>
    	@foreach($users as $user)
        <tr>
        <td>{{$user->getName()}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@if(!$joined)
	<form action="/TogetherPeopleStrong/viewAffinity/addThisAffinity" method="get">
<!-- 	<input type="hidden" id="id" name="id" value="{{$affinity->getId()}}"> -->
	<button type="submit" class="btn btn-primary">Join Group</button>
	</form>
@else
	<form action="/TogetherPeopleStrong/viewAffinity/removeThisAffinity" method="get">
<!-- 	<input type="hidden" id="id" name="id" value="{{$affinity->getId()}}"> -->
	<button type="submit" class="btn btn-danger">Leave Group</button>
	</form>
@endif
</div>
</body>
@endsection