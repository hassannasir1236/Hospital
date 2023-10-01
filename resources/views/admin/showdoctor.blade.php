
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Hospital Website</title>
    @include('admin.css')
    
  </head> 
  <style type="text/css">
      .table th img, .jsgrid .jsgrid-table th img, .table td img, .jsgrid .jsgrid-table td img {
    width: 157px;
    height: 123px;
    border-radius: 100%;
}
button{
  width: 100px;
  height: 50px;
}
label{
  color: white;
}
input{
  border-color: white;
}
.dataTables_wrapper .dataTables_length select {
    border: 1px solid #aaa;
    border-radius: 3px;
    padding: 5px;
    background-color: black;
    color: white;
    padding: 4px;
}
.dataTables_wrapper .dataTables_paginate {
    float: right;
    text-align: right;
    padding-top: 0.25em;
    background-color: white;
}
.dataTables_length, .dataTables_wrapper .dataTables_filter, .dataTables_wrapper .dataTables_info, .dataTables_wrapper .dataTables_processing, .dataTables_wrapper .dataTables_paginate {
    color: #fff;
}
    </style>
  <body>
    <div class="container-scroller">
    <!--   <div class="row p-0 m-0 proBanner" id="proBanner">
        <div class="col-md-12 p-0 m-0">
          <div class="card-body card-body-padding d-flex align-items-center justify-content-between">
            <div class="ps-lg-1">
              <div class="d-flex align-items-center justify-content-between">
                <p class="mb-0 font-weight-medium me-3 buy-now-text">Free 24/7 customer support, updates, and more with this template!</p>
                <a href="https://www.bootstrapdash.com/product/corona-free/?utm_source=organic&utm_medium=banner&utm_campaign=buynow_demo" target="_blank" class="btn me-2 buy-now-btn border-0">Get Pro</a>
              </div>
            </div>
            <div class="d-flex align-items-center justify-content-between">
              <a href="https://www.bootstrapdash.com/product/corona-free/"><i class="mdi mdi-home me-3 text-white"></i></a>
              <button id="bannerClose" class="btn border-0 p-0">
                <i class="mdi mdi-close text-white me-0"></i>
              </button>
            </div>
          </div>
        </div>
      </div> -->
      <!-- partial:partials/_sidebar.html -->
     @include('admin.sidebar')
      <!-- partial -->
      @include('admin.navbar')
    
        <!-- partial -->
        <div class="container py-5">
          <div class="row py5">
            <div class="col-12 py-5">
              <table class="table table-dark table-striped" id="myTable">
          <thead>
            <tr>
              <th scope="col">Doctor Image</th>
              <th scope="col">Doctor Name</th>
              <th scope="col">Doctor Phone</th>
              <th scope="col">Doctor Speciality</th>
              <th scope="col">Doctor Room</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($data as $datas)
            <tr class="price-section">
              <th scope="row"><img class="" src="{{asset('../public/uploadimages').'/'.$datas->new_image_name}}"></th>
              <td>{{$datas->doctor_name}}</td>
              <td>{{$datas->doctor_phone}}</td>
              <td>{{$datas->doctor_speciality}}</td>
              <td>{{$datas->doctor_room}}</td>
              <td class="">
                <div class="d-flex flex-column">
                <a href="edit_doctor/{{$datas->id}}" type="button" class="btn btn-outline-primary mb-3 deleteRecord1" style="    width: 100px;
                height: 50px;
                display: flex;
                align-items: center;
                justify-content: center;">
                  Edit
                  <i class="fas fa-edit ml-3"></i></a>
                <button type="button" class="btn btn-outline-danger deleteRecord"  data-id="{{$datas->id}}" data-bs-toggle="modal" data-bs-target="#exampleModal">
                  Delete <i class="fa-solid fa-delete-left"></i>
                </button>
                </div>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
            </div>
          </div>          
        </div>
        
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
       <div class="modal-header d-flex flex-column">
        <h5 class="modal-title text-center">Doctor Record Delete </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body d-flex flex-column ustify-content-center align-items-center">
        <img src="../build/admin/assets/images/cross.png" class="w-50 text-center">
        <p>Are You Sure for Delete Record</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Close</button>
        <button type="button" id="con_delete" class="btn btn-outline-danger px-4" data-dismiss="modal" 
        value="Cancel">Remove</button>
      </div>
    </div>
  </div>
</div>

    <!-- container-scroller -->
    <!-- plugins:js -->
   @include('admin.js')
    <!-- End custom js for this page -->
    <script type="text/javascript">
      $(document).ready( function () {
    $('#myTable').DataTable();
} );
    </script>
     <script type="text/javascript">
        
         $(".deleteRecord").click(function(){
                  var id = $(this).data("id");
                  var token = $("meta[name='csrf-token']").attr("content");       
          $("#con_delete").click(function(){
                  var ab = document.getElementById('con_delete').value;
                  console.log(ab);
                  // if ( ab == "deleten") {
                  $.ajax(
                  {
                      url: "delete_doctor/"+id,
                      type: 'get',
                      data: {
                          "id": id,
                          "status": ab,
                          "_token": token,
                      },
                      success: function (data) {
                    if (data.status == true) {
                        toastr.success(data.message);
                        $('body').find('.price-section').append(data.html);
                        console.log("its work");
                    } else {
                        toastr.error(data.message);
                    }
                },
                  });
                  // }
                  });
              });
     
             
            </script>
             <script type="text/javascript">
        
         $(".deleteRecord1").click(function(){
                  var id = $(this).data("id");
                  var token = $("meta[name='csrf-token']").attr("content");       
          $("#con_delete1").click(function(){
                  var ab = document.getElementById('con_delete1').value;
                  console.log(ab);
                  // if ( ab == "deleten") {
                  $.ajax(
                  {
                      url: "/"+id,
                      type: 'get',
                      data: {
                          "id": id,
                          "status": ab,
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