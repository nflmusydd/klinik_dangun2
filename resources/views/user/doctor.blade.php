<div class="page-section">
    <div class="container">
      <h1 class="text-center mb-5 wow fadeInUp">Dokter Kami</h1>

      <div class="owl-carousel wow fadeInUp" id="doctorSlideshow">

      @foreach($dokter as $dokters)
        <div class="item">
          <div class="card-doctor">
            <div class="header">
              <img height = "230px" src="doctorimage/{{$dokters->foto_dokter}}" alt="">
              <div class="meta">
                <a href="#"><span class="mai-call"></span></a>
                <a href="#"><span class="mai-logo-whatsapp"></span></a>
              </div>
            </div>
            <div class="body">
              <p class="text-xl mb-0">{{ $dokters->nama_dokter}}</p>
              <span class="text-sm text-grey">Dokter {{ $dokters->spesialisasi }}</span>
            </div>
          </div>
        </div>
      @endforeach
        
      </div>


    </div>
  </div>