@extends('layouts.app');
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Portfolios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

</head>
@section('content')
<body>
<div>
<table class="table" style="width:100%">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Name</th>
        <th scope="col">Position</th>
        <th scope="col">View</th>
      </tr>
    </thead>
    <tbody>
    @foreach($portfolios as $portfolio)
        <tr>
        	<form action="viewPortfolio" method="POST">
        		{{csrf_field()}}
        		<td>{{$portfolio->getName()}}<input type="hidden" id="name" name="name" value="{{$portfolio->getName()}}"></td>
        		<td>{{$portfolio->getPosition()}}<input type="hidden" id="position" name="position" value="{{$portfolio->getPosition()}}">
        			<input type="hidden" id="experience" name="experience" value="{{$portfolio->getExperience()}}">
        			<input type="hidden" id="proficiencies" name="proficiencies" value="{{$portfolio->getProficiencies()}}">
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