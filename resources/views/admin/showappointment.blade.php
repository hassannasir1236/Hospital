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
   
        <!-- partial -->
        <div class="container mt-5 bg-dark">
          <div class="row mt-5">
            <div class="col-12 text-white mt-3 mr-5">
              <table class="table table-dark text-white mr-5">
          <thead>
            <tr class="text-white">
              <th class="text-white" scope="col">User Name</th>
              <th class="text-white" scope="col">User Email</th>
              <th class="text-white" scope="col">Appointment Time</th>
              <th class="text-white" scope="col">User Phone No#</th>
              <th class="text-white" scope="col">Speciality</th>
              <th class="text-white" scope="col">Status</th>
              <th class="text-white" scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($data as $datas)
            <tr>
              <td>{{$datas->user_name}}</td>
              <td>{{$datas->user_email}}</td>
              <td>{{$datas->appointment_time}}</td>
              <td>{{$datas->user_phoneNo}}</td>
              <td>{{$datas->speciality}}</td>
              <td>{{$datas->status}}</td>
              <td class="d-flex flex-column">
                 <button type="button" class="btn btn-outline-success mb-3 deleteRecord1" data-id="{{$datas->id}}" data-bs-toggle="modal" data-bs-target="#exampleModal1">
                  Approved
                </button>
                <button type="button" class="btn btn-outline-danger deleteRecord" data-id="{{$datas->id}}" data-bs-toggle="modal" data-bs-target="#exampleModal">
                  Cancel
                </button>
                <a href="showemail/{{$datas->id}}" class="btn btn-outline-secondary mt-2">Send Mail</a>
                  <!--  <button type="button" class="btn btn-outline-danger mt-3 w-75 deleteRecord" 
                data-id="{{$datas->id}}" value="{{$datas->id}}" data-toggle="modal" data-target="#my-modal">Cancel</button> -->
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
            </div>
          </div>
        </div>
        <!-- Delete Modal  -->
     <!--    <div id="my-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content border-0">   
                      <div class="modal-body p-0">
                          <div class="card border-0 p-sm-3 p-2 justify-content-center">
                              <div class="card-header pb-0 bg-white border-0 "><div class="row"><div class="col ml-auto"><button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button></div> </div>
                              <p class="font-weight-bold mb-2"> Are you sure you wanna delete this ?</p><p class="text-muted "> This change will reflect in your portal after an hour.</p></div>
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
          </div>  --> 
          <!-- Button trigger modal -->

 
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
       <div class="modal-header d-flex flex-column">
        <h5 class="modal-title text-center">Delete Appointment</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body d-flex flex-column ustify-content-center align-items-center">
        <img src="../build/admin/assets/images/cross.png" class="w-50 text-center">
        <p>Are You Sure for Cancel Appointment</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Close</button>
        <button type="button" id="con_delete" class="btn btn-outline-danger px-4" data-dismiss="modal" 
        value="Cancel">Cancel</button>
      </div>
    </div>
  </div>
</div>



<!--Edit Modal -->
<div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
       <div class="modal-header d-flex flex-column">
        <h5 class="modal-title text-center">Approved Appointment</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body d-flex flex-column ustify-content-center align-items-center">
        <img src="../build/admin/assets/images/approve.png" class="w-50 text-center">
        <p>Are You Sure for Approved Appointment</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Close</button>
        <button type="button" id="con_delete1" class="btn btn-outline-success px-4" data-dismiss="modal" 
        value="Approve">Approve Appointment</button>
      </div>
    </div>
  </div>
</div>
    <!-- container-scroller -->
    <!-- plugins:js -->
   @include('admin.js')
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- End custom js for this page -->
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
                      url: "editappointment/"+id,
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
                      url: "editappointment/"+id,
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