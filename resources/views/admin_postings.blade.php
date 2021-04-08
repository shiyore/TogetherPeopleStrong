<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Job Postings</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

</head>

<body>
    <nav class="navbar navbar-dark navbar-expand-md bg-dark">
        <div class="container-fluid"><a class="navbar-brand" href="#">Together People Strong</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link active" href="/admin/postings">Users</a></li>
                    <li class="nav-item"><a class="nav-link active" href="/TogetherPeopleStrong/public/admin/postings">Job Postings</a></li>
                </ul>
            </div><button class="btn btn-primary" id="newPost" type="button">New Job Posting</button>
        </div>
    </nav>
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
                    	<form action="/TogetherPeopleStrong/public/admin/managePosting" method="post">
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
<script>
var btn = document.getElementById('newPost');
btn.addEventListener('click', function() {
  document.location.href = '/TogetherPeopleStrong/public/admin/new_posting';
});
</script>
</html>