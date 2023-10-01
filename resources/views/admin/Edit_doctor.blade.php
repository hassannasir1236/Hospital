
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Hospital Website</title>
    @include('admin.css')
    
  </head> 
  
  <body>
    <div class="container-scroller">
  
      <!-- partial:partials/_sidebar.html -->
     @include('admin.sidebar')
      <!-- partial -->
      @include('admin.navbar')
    
       <div class="container mt-5">
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
                 <form method="post" action="/edit_doctor_record" enctype="multipart/form-data" class=" bg-dark text-white">
                  @csrf
                  <input type="hidden" name="id" value="{{$data->id}}">
                    <div class="form-group wow fadeInRight">
                      <label for="exampleInputEmail1">User Name</label>
                      <input type="text" name="doctor_name" class="form-control bg-dark" placeholder="Full name" 
                      value="{{$data->doctor_name}}" required>
                      @if ($errors->has('doctor_name'))
                        <span class="" style="color: red;">
                            <strong class="text-red-500" style="color: red;">{{ $errors->first('doctor_name') }}</strong>
                        </span>
                       @endif
                    </div>
                    <div class="form-group wow fadeInRight">
                      <label for="exampleInputEmail1">Doctor Phone</label>
                      <input type="text" name="doctor_phone" class="form-control bg-dark" placeholder="Doctor Phone"
                        value="{{$data->doctor_phone}}" required >
                      @if ($errors->has('doctor_phone'))
                        <span class="" style="color: red;">
                            <strong class="text-red-500" style="color: red;">{{ $errors->first('doctor_phone') }}</strong>
                        </span>
                       @endif
                    </div>
                    <div class="form-group wow fadeInRight">
                      <label for="exampleInputEmail1">Doctor Speciality</label>
                      <input type="text" name="doctor_speciality" class="form-control bg-dark" 
                      value="{{$data->doctor_speciality}}" required >
                      @if ($errors->has('doctor_speciality'))
                        <span class="" style="color: red;">
                            <strong class="text-red-500" style="color: red;">
                              {{ $errors->first('doctor_speciality') }}
                            </strong>
                        </span>
                       @endif
                    </div>
                      <div class="form-group wow fadeInRight" >
                      <label for="exampleInputEmail1">Doctor Room No#</label>
                      <input  type="number" name="doctor_room" class="form-control bg-dark" placeholder="Number.." required value="{{$data->doctor_room}}">
                      @if ($errors->has('doctor_room'))
                        <span class="" style="color: red;">
                            <strong class="text-red-500" style="color: red;">{{ $errors->first('doctor_room') }}</strong>
                        </span>
                       @endif
                    </div>
                    <div class="form-group wow fadeInRight bg-dark">
                      <label for="exampleInputEmail1">Choice Doctor image</label> 
                      <input type="file" name="image" id="imgInp">  <br>
                        @if ($errors->has('image'))
                        <span class="" style="color: red;">
                            <strong class="text-red-500" style="color: red;">{{ $errors->first('image') }}</strong>
                        </span>
                       @endif
                      <label>Current image Choice</label> 
                      <img id="blah" class="mt-4" src="#" alt="your image" /> 
                      <label class="">Old image Choice</label>                 
                      <img class=" bg-dark mb-5" 
                      src="{{asset('../public/uploadimages').'/'.$data->new_image_name}}" 
                      value="{{$data->new_image_name}}">
                      
                    </div>
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary" style="background-color: #00d9a5;">Save changes</button>
                </div>
                </form>
      </div>
    </div>
  </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
   @include('admin.js')
    <!-- End custom js for this page -->
  <script type="text/javascript">
      function readURL(input) {
          if (input.files && input.files[0]) {
              var reader = new FileReader();

              reader.onload = function (e) {
                  $('#blah').attr('src', e.target.result);
              }

              reader.readAsDataURL(input.files[0]);
          }
      }

      $("#imgInp").change(function(){
          readURL(this);
      });
    </script>
  </body>
</html>