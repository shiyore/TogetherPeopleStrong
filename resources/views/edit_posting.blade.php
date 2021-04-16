<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Editing Posting</title>
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
        <section class="contact-clean">
        <form action="/TogetherPeopleStrong/admin/updatePosting" method="POST">
            {{csrf_field()}}
            <input type="hidden" id="id" name="id" value="{{$posting[0]->getId()}}">
            <h2 class="text-center">Editing Job Posting</h2>
            <div class="form-group"><input class="form-control" type="text" id="posting_title" name="posting_title" placeholder="Title of the Job Posting" value="{{$posting[0]->getTitle()}}"></div><br/>
            <?php echo $errors->first('posting_title') ;?>
            <div class="form-group"><input class="form-control" type="text" id="skills" name="skills" placeholder="List of Skills" value="{{$posting[0]->getDesired_skills()}}"></div><br/>
            <?php echo $errors->first('skills');?>
            <div class="form-group"><textarea class="form-control" id="description" name="description" placeholder="Job Posting Description" rows="5" >{{$posting[0]->getDescription()}}</textarea></div><br/>
            <?php echo $errors->first('description') ;?>
            <div class="form-group" align="center"><button class="btn btn-primary" type="submit">submit</button></div>
        </form>
    </section>
    </div>
</body>
<script>
var btn = document.getElementById('newPost');
btn.addEventListener('click', function() {
  document.location.href = '/TogetherPeopleStrong/public/admin/new_posting';
});
</script>
</html>