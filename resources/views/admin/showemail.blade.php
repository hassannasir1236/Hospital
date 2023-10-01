<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Hospital Website</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    @include('admin.css')
   
  </head>
  <body>
    <div class="container-scroller bg-dark">
  
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
  <form method="get" action="{{url('/sendemail')}}"  class="bg-dark shadow-md rounded px-5 pt-6 pb-5 mb-4">
    @csrf
    <input type="hidden" name="id" value="{{$data->user_id}}">
    <div class="mb-4">
      <label class="block text-white-700 text-sm font-bold mb-2" for="username">
        Enter Greeting
      </label>
      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="Greeting" name="greeting" type="text" placeholder="Enter Greeting" required :value="old('greeting')">
      @if ($errors->has('Greeting'))
        <span class="">
            <strong class="text-red-500">{{ $errors->first('greeting') }}</strong>
        </span>
       @endif
    </div>
    <div class="mb-4">
      <label class="block text-white-700 text-sm font-bold mb-2" for="username">
        Enter Body
      </label>
      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="body" name="body" type="text" placeholder="Enter Phone No#" required :value="old('body')">
       @if ($errors->has('body'))
        <span class="">
            <strong class="text-red-500">{{ $errors->first('body') }}</strong>
        </span>
       @endif
    </div>
    <div class="mb-4">
      <label for="countries" class="block text-white-700 text-sm font-bold mb-2">Enter actiontext </label>
       <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="actiontext" name="actiontext" type="text" placeholder="Select Room NO#" required :value="old('actiontext')">
       @if ($errors->has('actiontext'))
          <span class="">
              <strong class="text-red-500">{{ $errors->first('actiontext') }}</strong>
          </span>
         @endif 
    </div>
    <div class="mb-4">
      <label class="block text-white-700 text-sm font-bold mb-2" for="username">
        Enter Action Url
      </label>
      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="actionurl" name="actionurl" type="text" placeholder="Enter Action Url" required :value="old('actionurl')">
       @if ($errors->has('actionurl'))
          <span class="">
              <strong class="text-red-500">{{ $errors->first('actionurl') }}</strong>
          </span>
         @endif
    </div>
    <div class="mb-4">
      <label class="block text-white-700 text-sm font-bold mb-2" for="username">
         Enter End part
      </label>
      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="endpart" name="endpart" type="text" placeholder="Select Room NO#" required :value="old('endpart')">
       @if ($errors->has('endpart'))
          <span class="">
              <strong class="text-red-500">{{ $errors->first('endpart') }}</strong>
          </span>
         @endif
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
       @include('admin.js')
  </body>
</html>