@extends('layouts.app');
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Affinity Groups</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

</head>
@section('content')
<body>
<div>
<table class="table" style="width:100%">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Title</th>
        <th scope="col">View</th>
      </tr>
    </thead>
    <tbody>
    @foreach($affinities as $affinity)
        <tr>
        		<td>{{$affinity->getTitle()}}</td>
        		<td></td>
        		<td><a class="btn btn-secondary" href="http://localhost/TogetherPeopleStrong/viewAffinity/{{$affinity->getId()}}">View Group</a></td>
        	</form>
        </tr>
    @endforeach
    </tbody>
</table>
</div>
@endsection
</body>