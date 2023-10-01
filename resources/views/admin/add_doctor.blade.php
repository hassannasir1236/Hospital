
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
<div class="main-panel">
  <div class="content-wrapper">
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
      <div class="col-12 grid-margin stretch-card">
        <div class="w-full max-w-xs">
  <form method="post" action="{{route('upload_doctor')}}" enctype="multipart/form-data"  class="bg-dark shadow-md rounded px-5 pt-6 pb-5 mb-4">

    @csrf
    <div class="mb-4">
      <label class="block text-white-700 text-sm font-bold mb-2" for="username">
        Enter Doctor Name
      </label>
      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="docotr_name" name="doctor_name" type="text" placeholder="Enter Doctor Name" required :value="old('doctor_name')">
      @if ($errors->has('doctor_name'))
        <span class="">
            <strong class="text-red-500">{{ $errors->first('doctor_name') }}</strong>
        </span>
       @endif
    </div>
    <div class="mb-4">
      <label class="block text-white-700 text-sm font-bold mb-2" for="username">
        Enter Phone No#
      </label>
      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="doctor_phone" name="doctor_phone" type="number" placeholder="Enter Phone No#" required :value="old('doctor_phone')">
       @if ($errors->has('doctor_phone'))
        <span class="">
            <strong class="text-red-500">{{ $errors->first('doctor_phone') }}</strong>
        </span>
       @endif
    </div>
    <div class="mb-4">
      <label for="countries" class="block text-white-700 text-sm font-bold mb-2">Select an Speciality</label>
        <select id="countries"  name="doctor_speciality" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required value="old('doctor_speciality')">
          @if ($errors->has('doctor_speciality'))
          <span class="">
              <strong class="text-red-500">{{ $errors->first('doctor_speciality') }}</strong>
          </span>
         @endif
          <option selected>Choose a Speciality</option>
          <option value="Heart">Heart</option>
          <option value="Eye">Eye</option>
          <option value="Kindey">Kindey</option>
          <option value="Brain">Brain</option>
        </select>
    </div>
    <div class="mb-4">
      <label class="block text-white-700 text-sm font-bold mb-2" for="username">
        Select Room NO#
      </label>
      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username" name="doctor_room" type="text" placeholder="Select Room NO#" required :value="old('doctor_room')">
       @if ($errors->has('doctor_room'))
          <span class="">
              <strong class="text-red-500">{{ $errors->first('doctor_room') }}</strong>
          </span>
         @endif
    </div>
    <div class="mb-4">
      <label class="block text-white-700 text-sm font-bold mb-2" for="username">
         Select Doctor Image
      </label>
      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="imgInp" name="image" type="file" placeholder="Username"
      required :value="old('image')">
      @if ($errors->has('image'))
          <span class="">
              <strong class="text-red-500">{{ $errors->first('image') }}</strong>
          </span>
         @endif
      <img id="blah" class="mt-4" src="#" alt="your image" />
    </div>
    <div class="flex items-center justify-between">
      <button type="submit" class="btn bg-gray-100 hover:bg-red-700 text-black font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" >
        Register Doctor
      </button>
    </div>
  </form>
  <p class="text-center text-gray-500 text-xs">
    &copy;2020 Acme Corp. All rights reserved.
  </p>
</div>
      </div>
    </div>
  </div>
</div>
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