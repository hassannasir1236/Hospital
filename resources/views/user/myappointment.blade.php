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

  <!-- Back to top button -->
  <div class="back-to-top"></div>

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
    <div class="row">
         @if(session()->has('success'))
                 <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800" role="alert">
                  <span class="font-medium">Success alert!</span> 
                      {{ session()->get('success') }}
                </div>
    </div>
                  @endif
      @if(session()->has('fail'))
     <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
      <span class="font-medium">Danger alert!</span> {{ session()->get('fail') }}
    </div>
      @endif
      <div class="col-12">
        <table class="table mt-5 mb-5">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Your Name</th>
              <th scope="col">Your Email</th>
              <th scope="col">Appointment Time</th>
              <th scope="col">User Phone No#</th>
              <th scope="col">Doctor Name & Speciality</th>
              <th scope="col">Status</th>
              <th scope="col">Created_at</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($appoint as $appoints)
            <tr>
              <th scope="row">{{$appoints->user_id}}</th>
              <td>{{$appoints->user_name}}</td>
              <td>{{$appoints->user_email}}</td>
              <td>{{$appoints->appointment_time}}</td>
              <td>{{$appoints->user_phoneNo}}</td>
              <td>{{$appoints->speciality}}</td>
              <td>{{$appoints->status}}</td>
              <td>{{$appoints->created_at->diffForHumans()}}</td>
              <td>
                <a href="fetch_myappointment/{{$appoints->id}}"  type="button" class="btn btn-outline-primary w-75" >Edit</a>
                <button type="button" class="btn btn-outline-danger mt-3 w-75 deleteRecord" 
                data-id="{{$appoints->id}}" value="{{$appoints->id}}" data-toggle="modal" data-target="#my-modal">Delete</button>
              </td>
            </tr>
            @endforeach
          
          </tbody>
        </table>
      </div>
    </div>
  </div>
 <!-- Delete Modal  -->
        <div id="my-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content border-0">   
                      <div class="modal-body p-0">
                          <div class="card border-0 p-sm-3 p-2 justify-content-center">
                              <div class="card-header pb-0 bg-white border-0 "><div class="row"><div class="col ml-auto"><button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button></div> </div>
                              <p class="font-weight-bold mb-2"> Are you sure you wanna delete this ?</p><p class="text-muted "> This change will reflect in your portal after an hour.</p>     </div>
                          </div>  
                      </div>
                      <div class="card-body px-sm-4 mb-2 pt-1 pb-0"> 
                        <div class="row justify-content-end no-gutters">
                          <div class="col-auto"><button type="button" class="btn btn-light text-muted" data-dismiss="modal">Cancel</button>
                          </div>
                          <div class="col-auto">
                            <button type="button" id="con_delete" class="btn btn-outline-danger px-4" data-dismiss="modal" value="delete">Delete</button>
                          </div>
                        </div>
                    </div>
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
    <script type="text/javascript">
        
         $(".deleteRecord").click(function(){
                  var id = $(this).data("id");
                  var token = $("meta[name='csrf-token']").attr("content");       
          $("#con_delete").click(function(){

                  // var ab = document.getElementById('con_delete').value;
                  // console.log(ab);
                  // if ( ab == "deleten") {
                  $.ajax(
                  {
                      url: "delete_myappointment/"+id,
                      type: 'get',
                      data: {
                          "id": id,
                          "_token": token,
                      },
                      success: function (){
                          console.log("it Works");
                      }
                  });
                  // }
                  });
              });
     
             
            </script>
</body>
</html>