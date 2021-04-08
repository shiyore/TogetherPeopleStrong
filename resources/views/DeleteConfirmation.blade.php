<html>
<!-- 
    Written by Aiden Yoshioka
    
    This is just the basic template for all the articles to be output. If I find time, I will be encorporating parsedown to format the articles to look better.
 -->
<head>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>
<body>
		<p><h1 class="display-1 text-center">Are you sure you would like to delete: {{$posting->getTitle()}} ?</h1></p>
		<div class="container">
          <div class="row">
            <div class="col-sm-2">
            </div>
            <div class="col-sm-8">
                <form action="deleteConfirmed" method="POST">
                    {{csrf_field()}}
                    <input type="hidden" id="id" name="id" value="{{$posting->getId()}}">
                    <div class="row">
                        <div class="col-sm-4"><button id="delete_button" name="delete_button" type="submit" class="btn btn-danger ">Delete</button></div>
                        <div class="col-sm-4"><button id="cancel_button" name="cancel_button" type="submit" class="btn btn-danger ">Cancel</button></div>
                    </div>
                </form>
            </div>
            <div class="col-sm-2">
         	</div>
         </div>
        </div>
</body>
</html>