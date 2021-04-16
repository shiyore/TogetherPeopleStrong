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
	$description = MarkdownParserService::parse($posting->getDescription());
?>
    <div>
        <div class="row">
			<p><h1 class="display-1 text-center">{{$posting->getTitle()}}</h1></p>
		<hr/>
		<br/>
		<p class="text-left font-weight-normal">{!! $description !!}</p>
          
        @if ($applied)
            <h1></h1><p class="text-center font-weight-heavy">Thanks for applying!</p></h1>
        @else
        <div align="center">
        <form action="/TogetherPeopleStrong/apply" method="post">
        {{ csrf_field() }}
         	<input type="hidden" id="posting_id" name="posting_id" value="{{$id}}">
         	<input type="hidden" id="user_id" name="user_id" value="{{Auth::id()}}">
         	<button id="apply_button" name="apply_button" type="submit">Apply</button>
         </form>
         </div>
        @endif
        </div>
    </div>
@endsection
</body>