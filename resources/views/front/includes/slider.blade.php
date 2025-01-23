<div style="margin-top: 100px;">
    <div class="container mt-4">
      <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
         
          @foreach ($slide as $key => $sld)
          <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
              <div class="position-relative">
                  <img src="{{ asset('/uploads/' . ltrim($sld->gambar_slide, '/')) }}" 
                       class="d-block w-100 img-fluid rounded" 
                       alt="{{ $sld->judul ?? 'Gambar berita' }}">
                      </div>
                      <h1 class="position-absolute text-white  p-2 rounded" style="top: 10px; left: 10px;font-family: 'Protest Revolution', sans-serif; font-size: 20px;margin-left:450px;margin-top:350px;">
                           <a href="{{ $sld->link }}" style="text-decoration: none;color:white;">{{ $sld->judul_slide }}</a> 
                    </h1>
          </div>
      @endforeach
      


        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </div>
  </div>
  