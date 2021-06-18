<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{url('web/assets/images/favicon.ico')}}">

    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>Car Dealer</title>

    <!-- Bootstrap core CSS -->
    <link href="{{url('web/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{url('web/assets/css/fontawesome.css')}}">
    <link rel="stylesheet" href="{{url('web/assets/css/style.css')}}">
    <link rel="stylesheet" href="{{url('web/assets/css/owl.css')}}">

  </head>
    <body>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->

    <!-- Header -->
    <header class="">
      <nav class="navbar navbar-expand-lg">
        <div class="container">
          <a class="navbar-brand" href="{{url('/')}}"><h2>Car Dealer <em>Website</em></h2></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/')}}">Home
                      <span class="sr-only">(current)</span>
                    </a>
                </li>
                @auth
                 <li class="nav-item"> <a class="nav-link" style="cursor: pointer;" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">Logout</a>
                     <form id="logout-form" action="{{ url('log_out_customer') }}"
                      method="POST" style="display: none;">@csrf </form></li>
                @endauth
                @guest
                <li class="nav-item"><a class="nav-link" href="{{url('login')}}">Login</a></li>
                @endguest
            </ul>
          </div>
        </div>
      </nav>
    </header>