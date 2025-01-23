@extends('front.layouts.frontend')

@section('content')
<div class="row" style="margin-top: 120px">
    <!-- Konten Utama -->
    <div class="content col-lg-8">
        <!-- Pengaturan (Font Size dan Focus Mode) -->
        <div class="main-container p-3 rounded shadow-sm mb-4" style="background:var(--bs-body-bg);">
            <button id="toggleSettings" class="btn btn-secondary w-100">
                Pengaturan <i class="fas fa-chevron-down"></i>
            </button>
            <div id="settingsPanel" style="display: none; margin-top: 15px;">
                <!-- Pengaturan Ukuran Font -->
                <div class="font-size-container d-flex align-items-center mb-3">
                    <label for="fontSizeSlider" class="me-3">Font Size:</label>
                    <input type="range" id="fontSizeSlider" min="14" max="24" value="16" class="form-range">
                    <span id="fontSizeValue" class="ms-3">16px</span>
                </div>
                <!-- Pengaturan Mode Fokus -->
                <div class="toggle-container d-flex align-items-center">
                    <input type="checkbox" id="focusModeToggle" class="form-check-input me-2">
                    <label for="focusModeToggle">Focus Mode</label>
                </div>
            </div>
        </div>

        <!-- Artikel -->
        @foreach ($article as $art)
        <div class="mb-5">
            <!-- Gambar Artikel -->
            <img src="{{ asset('uploads/'.$art->gambar_article) }}" alt="{{ $art->title }}" class="img-fluid rounded shadow-sm">
            
            <!-- Detail Artikel -->
            <div class="detail-content mt-3 p-4 rounded shadow-sm" style="">
                <!-- Badges -->
                <div class="mb-2">
                    <a href="#" class="badge bg-warning text-dark text-decoration-none">{{ $art->categories->name_category }}</a>
                    <a href="#" class="badge bg-info text-dark text-decoration-none">{{ $art->users->name }}</a>
                </div>
                <!-- Judul -->
                <h3>{{ $art->judul }}</h3>
                <!-- Isi Artikel -->
                <div id="articleBody">
                    {!! $art->body !!}
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Sidebar -->
    <div class="col-lg-4 focus-sidebar">
        <!-- Iklan -->
        <div class="sidebar p-3 rounded shadow-sm mb-4" style="">
            <h4>{{ $iklanA->judul }}</h4>
            <hr>
            <a href="#">
                <img src="{{ asset('uploads/'.$iklanA->gambar_iklan) }}" alt="Iklan" class="img-fluid rounded">
            </a>
        </div>
        <!-- Kategori -->
        <div class="sidebar p-3 rounded shadow-sm mb-4" style="">
            <h4>Category</h4>
            <hr>
            @foreach ($category as $cat)
            <div class="d-flex justify-content-between align-items-center mb-2">
                <a href="#" class="text-decoration-none " style="color:var(--bs-light-text-emphasis)">{{ $cat->name_category }}</a>
                <span class="badge bg-dark">{{ $cat->article->count() }}</span>
            </div>
            @endforeach
        </div>
        <!-- Artikel Terbaru -->
        <div class="sidebar p-3 rounded shadow-sm" style="">
            <h4>Artikel Terbaru</h4>
            <hr>
            @foreach ($postinganTerbaru as $iya)
            <div class="d-flex align-items-start mb-3">
                <img src="{{ asset('uploads/'.$iya->gambar_article) }}" width="70px" class="rounded me-3" alt="...">
                <a href="{{ route('detail-article',$iya->slug) }}" class="text-decoration-none " style="color:var(--bs-light-text-emphasis)">
                    <h5 class="mb-0">{{ $iya->judul }}</h5>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</div>

<!-- JavaScript -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Elemen tombol dan panel pengaturan
        const toggleSettings = document.getElementById('toggleSettings');
        const settingsPanel = document.getElementById('settingsPanel');

        // Tampilkan/Sembunyikan Panel Pengaturan
        toggleSettings.addEventListener('click', () => {
            settingsPanel.style.display = settingsPanel.style.display === 'none' || settingsPanel.style.display === '' ? 'block' : 'none';
        });

        // Slider Ukuran Font
        const fontSizeSlider = document.getElementById('fontSizeSlider');
        const fontSizeValue = document.getElementById('fontSizeValue');
        const articleBody = document.getElementById('articleBody');

        fontSizeSlider.addEventListener('input', function () {
            const newSize = `${this.value}px`;
            articleBody.style.fontSize = newSize;
            fontSizeValue.textContent = newSize;
        });

        // Mode Fokus
        const focusModeToggle = document.getElementById('focusModeToggle');
        const sidebar = document.querySelector('.focus-sidebar');

        focusModeToggle.addEventListener('change', function () {
            sidebar.style.display = this.checked ? 'none' : 'block';
        });
    });
</script>
@endsection
