<nav class="navbar navbar-dark navbar-expand-md bg-dark">
    <div class="container-fluid"><a class="navbar-brand" href="#">Together People Strong</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navcol-1">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link active" href="/TogetherPeopleStrong/admin/users">Users</a></li>
                <li class="nav-item"><a class="nav-link active" href="/TogetherPeopleStrong/admin/postings">Job Postings</a></li>
            </ul>
        </div><button class="btn btn-primary" id="newPost" type="button">New Job Posting</button>
    </div>
</nav>
<script>
var btn = document.getElementById('newPost');
btn.addEventListener('click', function() {
  document.location.href = '/TogetherPeopleStrong/admin/new_posting';
});
</script>