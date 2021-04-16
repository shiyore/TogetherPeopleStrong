<!DOCTYPE html>
<html lang="en">
@extends('layouts.adminApp')
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Job Postings</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

</head>

@section('content')
<body>
    <div class="table-responsive">
        <table class="table">
            <thead class="text-truncate">
                <tr>
                    <th>Job Postings</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($postings as $posting)
                    <tr>
                    	<form action="/TogetherPeopleStrong/admin/managePosting" method="post">
        					{{csrf_field()}}
                    		<td>{{$posting->getTitle()}}
                    		</td>
                    		<input type="hidden" id="id" name="id" value="{{$posting->getId()}}">
                    		<td><button name="edit_button" id="edit_button" class="btn btn-dark text-center" type="submit">Edit</button></td>
                    		<td><button name="delete_button" id="delete_button" class="btn btn-danger" type="submit">Delete</button></td>
                    	</form>
                 	</tr>
                  @endforeach
            </tbody>
        </table>
    </div>
</body>
@endsection
</html>