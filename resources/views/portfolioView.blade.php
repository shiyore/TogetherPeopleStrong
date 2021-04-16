@extends('layouts.app');
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Job Postings</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

</head>
@section('non-center-content')
<body class="text-left">
<?php 
	use App\Services\Businesses\MarkdownParserService;
	$description = MarkdownParserService::parse($portfolio->getBio());
?>
    <div>
        <div class="row">
			<p><h1 class="display-1 text-center">{{$portfolio->getName()}}'s Portfolio</h1></p>
    		<hr/>
    		<br/>
    		<div align="center">
    		<h2>{{$portfolio->getPosition()}}</h2>
    		<h3>{{$portfolio->getExperience()}}</h3>
    		<h4>{{$portfolio->getProficiencies()}}</h4>
    		</div>
    		<p class="text-left font-weight-normal">{!! $description !!}</p>
        
        </div>
    </div>
@endsection
</body>