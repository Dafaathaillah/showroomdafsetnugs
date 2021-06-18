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
    <script src="https://use.fontawesome.com/f2fc9ac3b2.js"></script>
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
                <li class="nav-item active"><a class="nav-link" href="{{url('login')}}">Login</a></li>
            </ul>
          </div>
        </div>
      </nav>
    </header>

    <!-- Page Content -->
    <div class="page-heading contact-heading header-text" 
    style="background-image: url(<?php echo url('web/assets/images/heading-4-1920x500.jpg')?>);">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="text-content">
              <h4>Lorem ipsum dolor</h4>
              <h2>Login</h2>
            </div>
          </div>
        </div>
      </div>
    </div>


    
    <div class="send-message">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Login for order now!</h2>
            </div>
          </div>
          <div class="col-md-12">
            <div class="contact-form">
               @if($message=Session::get('success'))
                <div class="alert bg-teal" role="alert">
                    <em class="fa fa-lg fa-check">&nbsp;</em> 
                   {{$message}}
                </div>
                @endif
                @php $modelT = new App\Models\User(); @endphp
                @php $check = $modelT->get_contact(); @endphp
                @php $fix = str_split($check); 
                     unset($fix[0]);
                     $fix1=implode("",$fix);
                     $fix2 = '62'.$fix1;
                @endphp
             <form role="form" method="POST" action="{{route('login')}}">
                         @csrf
                <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12">
                    <fieldset>
                      <input name="email" type="email" class="form-control" id="name" placeholder="Email" required="">
                    </fieldset>
                  </div>
                  <div class="col-lg-12 col-md-12 col-sm-12">
                    <fieldset>
                      <input class="form-control" required placeholder="Password" name="password" type="password" value="">
                    </fieldset>
                  </div>

                  <div class="col-lg-12">
                    <fieldset>
                     <button  type="submit" class="btn btn-primary">Login</button>
                     OR
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#AddCustomer">
                        Register
                        </button>
            
                    </fieldset>
                  </div>
                   If forgot the password , you can contact administator by click this con wahtsapp &nbsp;
                            <a target="_blank" href="https://wa.me/{{$fix2}}"> <i style="cursor: pointer;" class="fa fa-whatsapp"></i></a>
                            <br>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  <div class="modal" id="AddCustomer">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Register</h4>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
             <form role="form" action="{{url('register_customer')}}" method="POST">
                @csrf
                  <div class="row">
                       <div class="col-md-6">
                          <fieldset>
                           <label>Name Of User</label>
                            <input class="form-control" 
                            name="name" placeholder="Name Of User">
                          </fieldset>
                       </div>

                       <div class="col-md-6">
                          <fieldset>
                            <label>Email Of User</label>
                          <input class="form-control" 
                          name="email" placeholder="Email Of User">
                          </fieldset>
                       </div>
                  </div>

                  <div class="row">
                       <div class="col-md-6">
                          <fieldset>
                             <label>Password</label>
                              <input type="password" class="form-control see_create" 
                              name="password" value="" placeholder="Password Of User">
                          </fieldset>
                       </div>

                       <div class="col-md-6">
                          <fieldset>
                            <label>Phone Number</label>
                            <input class="form-control" 
                            name="phone_number" placeholder="Phone Of User">
                          </fieldset>
                       </div>
                  </div>
                  <label>Address</label>
                      <textarea class="form-control" 
                      name="address" placeholder="Address Of User">
                          
                      </textarea>
           </div>
          <div class="modal-footer">
            <a href="{{url('login')}}" class="btn btn-info">Login</a>
              OR
            <button type="submit" class="btn btn-primary">Register</button>
          </div>
           </form>
      </div>
    </div>
  </div>
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="inner-content">
              <p>Copyright © 2020 Company Name - Template by: <a href="https://www.phpjabbers.com/">PHPJabbers.com</a></p>
            </div>
          </div>
        </div>
      </div>
    </footer>


    <!-- Bootstrap core JavaScript -->
    <!-- Bootstrap core JavaScript -->
    <script src="{{url('web/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{url('web/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>


    <!-- Additional Scripts -->
    <script src="{{url('web/assets/js/custom.js')}}"></script>
    <script src="{{url('web/assets/js/owl.js')}}"></script>
  </body>

</html>
