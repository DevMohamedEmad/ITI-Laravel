
<!DOCTYPE html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
<nav class="navbar bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{route('posts.index')}}">
      ITI-Blog
    </a>
  </div>
</nav>
</body>
<div class="card container">
  <div class="card-header">
    Post Info
  </div>
  <div class="card-body">
    <h5 class="card-title"> <h3>Title:</h3> {{$post['title']}}</h5>
    <p class="card-text"> <h3>Description:</h3> {{$post['description']}}</p>
    <p class="card-text">  <h3>Created_at:</h3> {{$post['created_at']}}</p>
  </div>
</div>
<br>
<hr class="container">
<br>
<div class="card container">
  <div class="card-header">
    Post Creator Info
  </div>
  <div class="card-body">
    <h5 class="card-title"> <h3>Creator:</h3>{{$post['Posted_by']}} </h5>
    <p class="card-text"> <h3>Email:</h3>{{$post['email']}}</p>
  </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</html>
