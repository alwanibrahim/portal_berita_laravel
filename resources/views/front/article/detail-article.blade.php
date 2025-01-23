@extends('front.layouts.frontend')

@section('content')
<div class="row">
    <!-- Bagian Artikel -->
    <div class="content col-lg-8" style="margin-top: 120px;">
        <div class="article-image text-center">
            <img src="{{ asset('uploads/'.$article->gambar_article) }}" class="img-fluid rounded" alt="Gambar Artikel">
        </div>
        <div class="detail-content mt-4 p-4 shadow-sm rounded" style="background-color: var(--bs-body-bg);">
            <!-- Badge -->
            <div class="mb-3">
                <a href="#" class="badge" style="background-color: var(--bs-warning); color: black; text-decoration: none;">
                    {{ $article->categories->name_category }}
                </a>
                <a href="#" class="badge" style="background-color: var(--bs-info); color: black; text-decoration: none;">
                    {{ $article->users->name }}
                </a>
            </div>
            <!-- Judul Artikel -->
            <h3 class="mb-3">{{ $article->judul }}</h3>
            <!-- Isi Artikel -->
            <div class="detail-body">
                <div id="articleBody" style="font-size: 16px;">
                    {!! $article->body !!}
                </div>
            </div>
            <!-- Bagikan Artikel -->
            <div id="share" class="mt-4 text-center">
                <button onclick="shareToFacebook()" class="btn btn-primary me-2">
                    <i class="fab fa-facebook"></i> Share to Facebook
                </button>
                <button onclick="shareToTwitter()" class="btn btn-info me-2">
                    <i class="fab fa-twitter"></i> Share to Twitter
                </button>
                <button onclick="copyLink()" class="btn btn-success">
                    <i class="fas fa-link"></i> Copy Link
                </button>
            </div>
            <!-- Toggle untuk Focus Mode dan Font Size -->
            <div class="main-container mt-4">
                <button id="toggleSettings" class="btn btn-secondary mb-3">
                    Pengaturan <i class="fas fa-chevron-down"></i>
                </button>
                <div id="settingsPanel" style="display: none;">
                    <!-- Font Size Slider -->
                    <div class="font-size-container d-flex align-items-center mb-3">
                        <label for="fontSizeSlider" class="me-3">Font Size:</label>
                        <input type="range" id="fontSizeSlider" min="14" max="24" value="16" class="form-range">
                        <span id="fontSizeValue" class="ms-3">16px</span>
                    </div>
                    <!-- Focus Mode Toggle -->
                    <div class="toggle-container d-flex align-items-center">
                        <input type="checkbox" id="focusModeToggle" class="form-check-input me-2">
                        <label for="focusModeToggle">Focus Mode</label>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Sidebar -->
    <div class="col-lg-4 focus-sidebar" id="sidebar" style="margin-top:30px;">
        <!-- Iklan -->
        <div class="sidebar mt-5 p-3 shadow-sm rounded" style="background-color: var(--bs-body-bg);">
            <h4>{{ $iklanA->judul }}</h4>
            <hr>
            <a href="#">
                <img src="{{ asset('uploads/'.$iklanA->gambar_iklan) }}" class="img-fluid rounded" alt="Iklan">
            </a>
        </div>
        <!-- Kategori -->
        <div class="sidebar mt-4 p-3 shadow-sm rounded" style="background-color: var(--bs-body-bg);">
            <h4>Category</h4>
            <hr>
            @foreach ($category as $cat)
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <a href="#" class=" text-decoration-none" style="color:var(--bs-light-text-emphasis);">
                        {{ $cat->name_category }}
                    </a>
                    <span class="badge bg-dark">{{ $cat->article->count() }}</span>
                </div>
            @endforeach
        </div>
        <!-- Artikel Terbaru -->
        <div class="sidebar mt-4 p-3 shadow-sm rounded" style="background-color: var(--bs-body-bg);">
            <h4>Artikel Terbaru</h4>
            <hr>
            @foreach ($postinganTerbaru as $iya)
                <div class="d-flex align-items-start mb-3">
                    <img src="{{ asset('uploads/'.$iya->gambar_article) }}" width="70px" class="rounded me-3" alt="...">
                    <a href="{{ route('detail-article',$iya->slug) }}" class="text-decoration-none" style="color:var(--bs-light-text-emphasis);">
                        <h5 class="mb-0">{{ $iya->judul }}</h5>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>

<script>
    // Mengatur toggle pengaturan
    const toggleSettingsButton = document.getElementById('toggleSettings');
    const settingsPanel = document.getElementById('settingsPanel');
    toggleSettingsButton.addEventListener('click', () => {
        settingsPanel.style.display = settingsPanel.style.display === 'none' ? 'block' : 'none';
    });

    // Mengubah ukuran font artikel
    const fontSizeSlider = document.getElementById('fontSizeSlider');
    const fontSizeValue = document.getElementById('fontSizeValue');
    const articleBody = document.querySelectorAll('.detail-body *'); // Pilih semua elemen dalam detail-body

    fontSizeSlider.addEventListener('input', function () {
        const newSize = `${this.value}px`;
        articleBody.forEach((element) => {
            element.style.fontSize = newSize; // Ubah ukuran font masing-masing elemen
        });
        fontSizeValue.textContent = newSize; // Update tampilan nilai slider
    });

    // Mengaktifkan atau menonaktifkan Focus Mode
    const focusModeToggle = document.getElementById('focusModeToggle');
    const sidebar = document.getElementById('sidebar');

    focusModeToggle.addEventListener('change', function () {
        sidebar.style.display = this.checked ? 'none' : 'block';
    });

    // Fungsi untuk membagikan ke Facebook
    function shareToFacebook() {
        const url = window.location.href; // Mengambil URL halaman saat ini
        const facebookUrl = `https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(url)}`;
        window.open(facebookUrl, '_blank');
    }

    // Fungsi untuk membagikan ke Twitter
    function shareToTwitter() {
        const url = window.location.href; // Mengambil URL halaman saat ini
        const text = document.title; // Mengambil judul artikel
        const twitterUrl = `https://twitter.com/intent/tweet?url=${encodeURIComponent(url)}&text=${encodeURIComponent(text)}`;
        window.open(twitterUrl, '_blank');
    }

    // Fungsi untuk menyalin link artikel
    function copyLink() {
        const url = window.location.href; // Mengambil URL halaman saat ini
        navigator.clipboard.writeText(url).then(function() {
            alert("Link copied to clipboard!");
        }, function(err) {
            alert("Failed to copy link: " + err);
        });
    }
</script>

@endsection
