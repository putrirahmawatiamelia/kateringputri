@extends('layouts.user')

@section('title', 'Katering Putri - Home')

@section('contents')
<!DOCTYPE html>
<html>
<head>
  <title>Homepage</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>
<body>

  <div class="jumbotron jumbotron-fluid">
    <div class="container">
      <h1 class="display-4">Selamat Datang!</h1>
      <p class="lead">Nikmati hidangan lezat dari berbagai penjuru dunia.</p>
    </div>
  </div>

  <div id="foodCarousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#foodCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#foodCarousel" data-slide-to="1"></li>
      <li data-target="#foodCarousel" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="https://unsplash.com/photos/f1o3oQUlMDs/download?ixid=MnwxMjA3fDB8MXxzZWFyY2h8Mnx8bmFzaSUyMGdvcmVuZ3xlbnwwfHx8fDE2OTUxMDU4OTM&force=true&w=800" class="d-block w-100" alt="Nasi Goreng">
      </div>
      <div class="carousel-item">
        <img src="https://unsplash.com/photos/oT3jzdQ_AOI/download?ixid=MnwxMjA3fDB8MXxzZWFyY2h8NXx8c2F0YXl8ZW58MHx8fHwxNjk1MTA1ODkz&force=true&w=800" class="d-block w-100" alt="Sate">
      </div>
      <div class="carousel-item">
        <img src="https://unsplash.com/photos/560-bXiZO7k/download?ixid=MnwxMjA3fDB8MXxzZWFyY2h8MTB8fGdhZG8lMjBnYWRvJTIwJTI4cGVhbnV0JTI5fGVufDB8fHx8fDE2OTUxMDU4OTM&force=true&w=800" class="d-block w-100" alt="Gado-gado">
      </div>
    </div>
    <a class="carousel-control-prev" href="#foodCarousel" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#foodCarousel" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>
</body>
</html>
@endsection
