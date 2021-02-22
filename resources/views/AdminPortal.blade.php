<html>
	<head>
		<title>Admin Portal</title>
	</head>
	<body>
		<table style="width:100%">
          <tr>
            <th>Username</th>
            <th>Email</th>
            <th>Suspend</th>
            <th>Delete</th>
          </tr>
          @foreach($users as $user)
            <tr>
            	<form action="manageUser" method="post">
					{{csrf_field()}}
            		<td>{{$user->getUsername()}}<input type="hidden" id="name" name="name" value="{{$user->getUsername()}}"></td>
            		<td>{{$user->getEmail()}}<input type="hidden" id="email" name="email" value="{{$user->getUsername()}}">
            			<input type="hidden" id="password" name="password" value="{{$user->getPassword()}}">
            		</td>
            		<td><button id="suspend_button" name="suspend_button" type="submit">Suspend</button></td>
            		<td><button id="delete_button" name="delete_button" type="submit">Delete</button></td>
            	</form>
         	</tr>
          @endforeach
        </table>
	</body>	
</html>