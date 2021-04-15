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
      </tr>
    </thead>
    <tbody>
    @foreach($affinities as $affinity)
        <tr>
        	<form action="viewAffinity" method="POST">
        		{{csrf_field()}}
        		<td>{{$affinity->getTitle()}}<input type="hidden" id="name" name="name" value="{{$affinity->getTitle()}}"></td>
        		<td><input type="hidden" id="id" name="id" value="{{$affinity->getId()}}">
        		</td>
        		<td><button type="submit">View</button></td>
        	</form>
        </tr>
    @endforeach
    </tbody>
</table>
</div>
@endsection
</body>