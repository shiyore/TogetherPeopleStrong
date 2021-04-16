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

        <section class="contact-clean">
        <form action="/TogetherPeopleStrong/admin/submit_new_posting" method="POST">
            {{csrf_field()}}
            <h2 class="text-center">New Job Posting</h2>
            <div class="form-group"><input class="form-control" type="text" id="posting_title" name="posting_title" placeholder="Title of the Job Posting"></div><br/>
            <?php echo $errors->first('posting_title') ;?>
            <div class="form-group"><input class="form-control" type="text" id="skills" name="skills" placeholder="List of Skills"></div><br/>
            <?php echo $errors->first('skills');?>
            <div class="form-group"><textarea class="form-control" id="description" name="description" placeholder="Job Posting Description" rows="5"></textarea></div><br/>
            <?php echo $errors->first('description');?>
            <div class="form-group" align="center"><button class="btn btn-primary" type="submit">submit</button></div>
        </form>
    </section>
    </div>
</body>
@endsection
</html>