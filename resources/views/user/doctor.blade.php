 <div class="page-section">
    <div class="container">
      <h1 class="text-center mb-5 wow fadeInUp text-2xl">Our Doctors</h1>

      <div class="owl-carousel wow fadeInUp" id="doctorSlideshow">
        @foreach($doctorinfo as $doctorinfos)
        <div class="item">
          <div class="card-doctor">
            <div class="header">
              <img height="300px" src="{{ url('public/uploadimages/'.$doctorinfos->new_image_name) }}" alt="">
              <div class="meta">
                <a href="#"><span  class="mai-call" value='{{$doctorinfos->doctor_phone}}'></span></a>
                <a href="#"><span class="mai-logo-whatsapp" value='{{$doctorinfos->doctor_phone}}'></span></a>
              </div>
            </div>
            <div class="body">
              <p class="text-xl mb-0">{{$doctorinfos->doctor_name}}</p>
              <span class="text-sm text-grey">{{$doctorinfos->doctor_speciality}}</span>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>