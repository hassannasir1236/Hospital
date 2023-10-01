<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <meta name="copyright" content="MACode ID, https://macodeid.com/">

  <title>One Health - Medical Center HTML5 Template</title>

  <link rel="stylesheet" href="../build/assets/css/maicons.css">

  <link rel="stylesheet" href="../build/assets/css/bootstrap.css">

  <link rel="stylesheet" href="../build/assets/vendor/owl-carousel/css/owl.carousel.css">

  <link rel="stylesheet" href="../build/assets/vendor/animate/animate.css">

  <link rel="stylesheet" href="../build/assets/css/theme.css">
  <link rel="shortcut icon" href="../build/admin/assets/images/favicon.png" />
</head>
<body>

  <header>
    <div class="topbar">
      <div class="container">
        <div class="row">
          <div class="col-sm-8 text-sm">
            <div class="site-info">
              <a href="#"><span class="mai-call text-primary"></span> +00 123 4455 6666</a>
              <span class="divider">|</span>
              <a href="#"><span class="mai-mail text-primary"></span> mail@example.com</a>
            </div>
          </div>
          <div class="col-sm-4 text-right text-sm">
            <div class="social-mini-button">
              <a href="#"><span class="mai-logo-facebook-f"></span></a>
              <a href="#"><span class="mai-logo-twitter"></span></a>
              <a href="#"><span class="mai-logo-dribbble"></span></a>
              <a href="#"><span class="mai-logo-instagram"></span></a>
            </div>
          </div>
        </div> <!-- .row -->
      </div> <!-- .container -->
    </div> <!-- .topbar -->

    <nav class="navbar navbar-expand-lg navbar-light shadow-sm">
      <div class="container">
        <a class="navbar-brand" href="#"><span class="text-primary">One</span>-Health</a>

        <form action="#">
          <div class="input-group input-navbar">
            <div class="input-group-prepend">
              <span class="input-group-text" id="icon-addon1"><span class="mai-search"></span></span>
            </div>
            <input type="text" class="form-control" placeholder="Enter keyword.." aria-label="Username" aria-describedby="icon-addon1">
          </div>
        </form>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupport" aria-controls="navbarSupport" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupport">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="index.html">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.html">About Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="doctors.html">Doctors</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="blog.html">News</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.html">Contact</a>
            </li>
            @if (Route::has('login'))
            
                    @auth
                    <li class="nav-item">
                      <a class="btn btn-outline-info" href="{{ route('myappointment') }}">My Appointment</a>
                    </li>
                    <li class="nav-item">
                      <a class="btn btn-primary ml-lg-3" href="{{ route('home') }}">Home Page</a>
                    </li>

                        <x-app-layout>
                       </x-app-layout>
                    @else
                        <li class="nav-item">
                          <a class="btn btn-primary ml-lg-3" href="{{ route('login') }}">Login</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                              <a class="btn btn-primary ml-lg-3" href="{{ route('register') }}">Register</a>
                            </li>
                        @endif
                    @endauth
                </div>
            @endif
          </ul>
        </div> <!-- .navbar-collapse -->
      </div> <!-- .container -->
    </nav>
  </header>

  <div class="container">
    <div class="row mb-5">
      <div class="col-12 mt-5">
         @if(session()->has('success'))
                  <div class="alert alert-success">
                      {{ session()->get('success') }}
                  </div>
                  @endif
                  @if(session()->has('fail'))
                  <div class="alert alert-success">
                      {{ session()->get('fail') }}
                  </div>
                  @endif
         @foreach($data as $item)

                 <form method="post" action="/edit_myappointment">
                  @csrf
                  <input type="hidden" name="id" value="{{$item->id}}">
                    <div class="form-group wow fadeInRight">
                      <label for="exampleInputEmail1">User Name</label>
                      <input type="text" name="user_name" class="form-control" placeholder="Full name" 
                      value="{{$item->user_name}}" required>
                      @if ($errors->has('user_name'))
                        <span class="" style="color: red;">
                            <strong class="text-red-500" style="color: red;">{{ $errors->first('user_name') }}</strong>
                        </span>
                       @endif
                    </div>
                    <div class="form-group wow fadeInRight">
                      <label for="exampleInputEmail1">Email address</label>
                      <input type="text" name="user_email" class="form-control " placeholder="Email address.."
                        value="{{$item->user_email}}" required >
                      @if ($errors->has('user_email'))
                        <span class="" style="color: red;">
                            <strong class="text-red-500" style="color: red;">{{ $errors->first('user_email') }}</strong>
                        </span>
                       @endif
                    </div>
                    <div class="form-group wow fadeInRight">
                      <label for="exampleInputEmail1">Appointment Time</label>
                      <input type="date" name="appointment_time" class="form-control" value="{{$item->appointment_time}}" required >
                      @if ($errors->has('appointment_time'))
                        <span class="" style="color: red;">
                            <strong class="text-red-500" style="color: red;">
                              {{ $errors->first('appointment_time') }}
                            </strong>
                        </span>
                       @endif
                    </div>
                     <div class=" py-2 wow fadeInRight" data-wow-delay="300ms">
                        <select name="speciality" id="departement" class="custom-select" value="{{$item->speciality}}" required>
                            @if ($errors->has('speciality'))
                              <span class="" style="color: red;">
                                  <strong class="text-red-500" style="color: red;">{{ $errors->first('speciality') }}</strong>
                              </span>
                             @endif
                          @foreach($doctorinfo as $doctorinfos)
                          <option value="{{$doctorinfos->doctor_name}} --  Speciality --  {{$doctorinfos->doctor_speciality}}">{{$doctorinfos->doctor_name}} --  Speciality --  {{$doctorinfos->doctor_speciality}}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="form-group wow fadeInRight" >
                      <label for="exampleInputEmail1">User Phone No#</label>
                      <input  type="number" name="user_phoneNo" class="form-control" placeholder="Number.." 
                        required value="{{$item->user_phoneNo}}">
                      @if ($errors->has('user_phoneNo'))
                        <span class="" style="color: red;">
                            <strong class="text-red-500" style="color: red;">{{ $errors->first('user_phoneNo') }}</strong>
                        </span>
                       @endif
                    </div>
                    <div class="form-group wow fadeInRight">
                      <label for="exampleInputEmail1">Enter Message</label>
                       <textarea name="message" id="message" class="form-control" rows="6" placeholder="{{$item->message}}" value="{{$item->message}}" required></textarea>
                       @if ($errors->has('message'))
                        <span class="" style="color: red;">
                            <strong class="text-red-500" style="color: red;">{{ $errors->first('message') }}</strong>
                        </span>
                       @endif
                    </div>
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary" style="background-color: #00d9a5;">Save changes</button>
                </div>
                </form>
                @endforeach
      </div>
    </div>
  </div>
  



  <footer class="page-footer">
    <div class="container">
      <div class="row px-md-3">
        <div class="col-sm-6 col-lg-3 py-3">
          <h5>Company</h5>
          <ul class="footer-menu">
            <li><a href="#">About Us</a></li>
            <li><a href="#">Career</a></li>
            <li><a href="#">Editorial Team</a></li>
            <li><a href="#">Protection</a></li>
          </ul>
        </div>
        <div class="col-sm-6 col-lg-3 py-3">
          <h5>More</h5>
          <ul class="footer-menu">
            <li><a href="#">Terms & Condition</a></li>
            <li><a href="#">Privacy</a></li>
            <li><a href="#">Advertise</a></li>
            <li><a href="#">Join as Doctors</a></li>
          </ul>
        </div>
        <div class="col-sm-6 col-lg-3 py-3">
          <h5>Our partner</h5>
          <ul class="footer-menu">
            <li><a href="#">One-Fitness</a></li>
            <li><a href="#">One-Drugs</a></li>
            <li><a href="#">One-Live</a></li>
          </ul>
        </div>
        <div class="col-sm-6 col-lg-3 py-3">
          <h5>Contact</h5>
          <p class="footer-link mt-2">351 Willow Street Franklin, MA 02038</p>
          <a href="#" class="footer-link">701-573-7582</a>
          <a href="#" class="footer-link">healthcare@temporary.net</a>

          <h5 class="mt-3">Social Media</h5>
          <div class="footer-sosmed mt-3">
            <a href="#" target="_blank"><span class="mai-logo-facebook-f"></span></a>
            <a href="#" target="_blank"><span class="mai-logo-twitter"></span></a>
            <a href="#" target="_blank"><span class="mai-logo-google-plus-g"></span></a>
            <a href="#" target="_blank"><span class="mai-logo-instagram"></span></a>
            <a href="#" target="_blank"><span class="mai-logo-linkedin"></span></a>
          </div>
        </div>
      </div>

      <hr>

      <p id="copyright">Copyright &copy; 2020 <a href="https://macodeid.com/" target="_blank">MACode ID</a>. All right reserved</p>
    </div>
  </footer>

<script src="../build/assets/js/jquery-3.5.1.min.js"></script>

<script src="../build/assets/js/bootstrap.bundle.min.js"></script>

<script src="../build/assets/vendor/owl-carousel/js/owl.carousel.min.js"></script>

<script src="../build/assets/vendor/wow/wow.min.js"></script>

<script src="../build/assets/js/theme.js"></script>
</body>
</html>