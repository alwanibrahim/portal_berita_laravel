<!doctype html>
<html lang="en" data-bs-theme="dark">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Itim&family=Kablammo&family=Protest+Revolution&family=Sour+Gummy:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    <style>

      body{
       
      }
      .carousel-item img {
          height: 480px; /* Tinggi slider */
          object-fit: cover; /* Gambar proporsional */
          border-radius: 20px; /* Custom rounded */
      }
  
      @media (max-width: 768px) {
          .carousel-item img {
              height: 300px; /* Tinggi untuk mobile */
              border-radius: 15px; /* Radius lebih kecil di mobile */
          }
      }
      .img-article {
  width: 100%; /* Gambar akan responsif */
  max-width: 1000px; /* Lebar maksimal */
  height: auto; /* Menyesuaikan tinggi berdasarkan lebar */
  margin: 0 auto; /* Memposisikan di tengah */
  display: block; /* Menghilangkan margin default inline */
}
.img-sidebar {
  width: 100%; /* Responsif mengikuti container */
  max-width: 400px; /* Lebar maksimal */
  height: auto; /* Menjaga proporsi */
  margin: 0 auto; /* Agar rapi di tengah */
  display: block;
}
.position-relative {
    position: relative;
}

.text-overlay {
    position: absolute;
    top: 50%; /* Mengatur teks ke tengah secara vertikal */
    left: 50%; /* Mengatur teks ke tengah secara horizontal */
    transform: translate(-50%, -50%); /* Untuk menggeser posisi teks ke tengah */
    color: white; /* Warna teks */
    font-size: 24px; /* Ukuran font */
    font-weight: bold; /* Tebal teks */
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7); /* Bayangan untuk visibilitas */
}
.footer {
    background-color: #000; /* Warna latar belakang hitam */
    color: #fff; /* Warna teks putih */
    text-align: center;
    padding: 20px 0;
    font-family: Arial, sans-serif;
}

.footer-links a,
.footer-social a {
    color: #fff;
    margin: 0 15px;
    text-decoration: none;
    font-size: 14px;
    font-weight: 400;
}

.footer-social a i {
    font-size: 18px;
}

.footer-links a:hover,
.footer-social a:hover {
    color: #ccc; /* Warna saat hover */
}

.footer-copyright {
    margin-top: 10px;
    font-size: 12px;
    color: #aaa; /* Warna teks hak cipta lebih terang */
}
.shadow-on-hover {
  transition: box-shadow 0.3s ease; /* Animasi transisi untuk efek halus */
}

.shadow-on-hover:hover {
  box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.3); /* Efek bayangan saat hover */
}

.font1 {
  font-family: "Protest Revolution", sans-serif;
  
}
.navbar {
    position: fixed; /* Agar navbar tetap berada di atas */
    top: 0;
    width: 100%;
    z-index: 1030; /* Pastikan di atas elemen lain */
}
/* Menyembunyikan elemen */
/* styles.css */

/* Menyembunyikan elemen sidebar saat focus mode diaktifkan */
.hidden {
    display: none;
}

/* Memperbesar konten utama ketika focus mode diaktifkan */
.focus-mode {
    width: 100%;
}

/* Mengatur lebar kolom sidebar jika focus mode aktif */
.focus-sidebar {
    transition: all 0.3s ease;
}

/* Toggle Container */
.toggle-container {
  
    position: relative;
    display: inline-block;
    width: 60px;
    height: 30px;
}

/* Hide default checkbox */
.toggle-checkbox {
    opacity: 0;
    width: 0;
    height: 0;
}

/* Background of the toggle */
.toggle-label {
    position: absolute;
    cursor: pointer;
    background-color: #ccc;
    border-radius: 15px;
    width: 100%;
    height: 100%;
    transition: background-color 0.3s;
}

/* Circle inside the toggle */
.toggle-ball {
    position: absolute;
    top: 3px;
    left: 3px;
    width: 24px;
    height: 24px;
    background-color: white;
    border-radius: 50%;
    transition: transform 0.3s;
}

/* When checked, change background and move ball */
.toggle-checkbox:checked + .toggle-label {
    background-color: #4caf50;
}

.toggle-checkbox:checked + .toggle-label .toggle-ball {
    transform: translateX(30px);
}

/* Font Size Slider */
.font-size-container input[type="range"] {
    -webkit-appearance: none;
    width: 100%;
    background: #ddd;
    height: 5px;
    border-radius: 5px;
    outline: none;
}

.font-size-container input[type="range"]::-webkit-slider-thumb {
    -webkit-appearance: none;
    width: 15px;
    height: 15px;
    background: #4caf50;
    border-radius: 50%;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.font-size-container input[type="range"]::-webkit-slider-thumb:hover {
    background-color: #388e3c;
}

<style>
    .share-button {
        display: inline-flex;
        align-items: center;
        background-color: #f1f1f1;
        color: #333;
        border: none;
        border-radius: 5px;
        padding: 10px 15px;
        margin: 5px;
        font-size: 16px;
        cursor: pointer;
        transition: all 0.3s ease;
        text-decoration: none;
    }

    .share-button i {
        margin-right: 8px;
    }

    .share-button.facebook {
        background-color: #3b5998;
        color: white;
    }

    .share-button.twitter {
        background-color: #1da1f2;
        color: white;
    }

    .share-button:hover {
        opacity: 0.9;
    }
</style>


  </style>
  
  
    <title>Hello, world!</title>
  </head>
  <body>
    {{-- navbar --}}
     @include('front.includes.navbar')
      {{-- slider --}}
      {{-- content --}}
      <div class="container">
       @yield('content')
      </div>
      {{-- footer --}}
      @include('front.includes.footer')
      @include('front.includes.js')


      
  </body>
</html>