@extends('layouts.adminApp')
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Job Postings</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

</head>

@section('content')
<div>
<table class="table" style="width:100%">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Username</th>
        <th scope="col">Email</th>
        <th scope="col">Suspend</th>
        <th scope="col">Delete</th>
      </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
        	<form action="manageUser" method="post">
        		{{csrf_field()}}
        		<td>{{$user->getUsername()}}<input type="hidden" id="name" name="name" value="{{$user->getUsername()}}"></td>
        		<td>{{$user->getEmail()}}<input type="hidden" id="email" name="email" value="{{$user->getUsername()}}">
        			<input type="hidden" id="password" name="password" value="{{$user->getPassword()}}">
        			<input type="hidden" id="ssn" name="ssn" value="{{$user->getSsn()}}">
        		</td>
        		<td><button id="suspend_button" name="suspend_button" type="submit">Suspend</button></td>
        		<td><button id="delete_button" name="delete_button" type="submit">Delete</button></td>
        	</form>
        </tr>
    @endforeach
    </tbody>
</table>
</div>
@endsection