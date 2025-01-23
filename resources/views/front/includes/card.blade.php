<div class="row g-3" style="margin-top:10px;">
  @foreach ($article as $art)
      <div class="col-md-4">
          <div class="card h-100 shadow" style="border-radius: 10px; overflow: hidden;">
              <!-- Gambar Artikel -->
              <img src="{{ asset('uploads/' .$art->gambar_article ) }}" class="card-img-top" alt="Gambar Artikel" style="object-fit: cover; height: 200px;">
              
              <!-- Konten Artikel -->
              <div class="card-body" style="background-color: var(--bs-body-bg);">
                  <h5 class="card-title  mutar">
                      <a href="{{ route('detail-article', $art->slug) }}" style="text-decoration: none;color:var(--bs-light-text-emphasis);">
                          {{ $art->judul }}
                      </a>
                  </h5>
              </div>
              
              <!-- Kategori dan Pengguna -->
              <div class="card-body d-flex justify-content-between align-items-center" style="background-color: var(--bs-body-bg); border-top: 1px solid #e9ecef;">
                  <a href="#" class="badge" style="background-color: var(--bs-warning); color: black; text-decoration: none; padding: 5px 10px; border-radius: 20px;">
                      {{ $art->users->name }}
                  </a>
                  <a href="#" class="badge" style="background-color: var(--bs-info); color: black; text-decoration: none; padding: 5px 10px; border-radius: 20px;">
                      {{ $art->categories->name_category }}
                  </a>
              </div>
          </div>
      </div>
  @endforeach
</div>

<script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js"></script>
<script>
    gsap.from('.mutar',{duration:1.5,x:-50, opacity:0,ease:'back' });
</script>