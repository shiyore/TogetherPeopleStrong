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
	<div class="row">
    @foreach($portfolios as $portfolio)
		<div class="col-sm-2">
    		<form action="viewPortfolio" method="POST">
    		{{csrf_field()}}
        		<div class="card">
        		<img src="/TogetherPeopleStrong/resources/img/monke{{($loop->index % 5) + 1}}.jpg" class="card-img-top w-100 d-block" style="height: 200px">
                	<div class="card-body">
                        <h4 class="card-title">{{$portfolio->getName()}}</h4><input type="hidden" id="name" name="name" value="{{$portfolio->getName()}}">
                        <p class="card-text">Last held postiton: {{$portfolio->getPosition()}}</p><input type="hidden" id="position" name="position" value="{{$portfolio->getPosition()}}">
                        <input type="hidden" id="experience" name="experience" value="{{$portfolio->getExperience()}}">
            			<input type="hidden" id="proficiencies" name="proficiencies" value="{{$portfolio->getProficiencies()}}">
            			<input type="hidden" id="bio" name="bio" value="{{$portfolio->getBio()}}">
                        <button class="btn btn-primary btn-banana" type="submit">View Portfolio</button>
            		</div>
        		</div>
    		</form>
		</div>
    @endforeach
    </div>
</div>
@endsection
</body>