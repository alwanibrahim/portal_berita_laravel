<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Itim&family=Kablammo&family=Protest+Revolution&family=Sour+Gummy:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <style>
        /* Gaya untuk animasi loading */
        #loading-screen {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.8);
            z-index: 9999;
            display: flex;
            justify-content: center;
            align-items: center;
            opacity: 1;
            visibility: visible;
            transition: opacity 0.5s ease, visibility 0.5s ease;
        }

        #loading-screen.hidden {
            opacity: 0;
            visibility: hidden;
        }

        /* Animasi untuk kata NEWS */
        .news-container {
            font-size: 80px;
            font-weight: bold;
            color: white;
            text-transform: uppercase;
            display: flex;
            justify-content: center;
            align-items: center;
            animation: changeNews 2.5s infinite ease-in-out, blink 1s infinite step-start;
        }

        @keyframes changeNews {
            0% {
                transform: scale(1);
                opacity: 1;
            }
            25% {
                transform: scale(1.2);
                opacity: 1;
            }
            50% {
                transform: scale(1);
                opacity: 1;
            }
            75% {
                transform: scale(1.2);
                opacity: 1;
            }
            100% {
                transform: scale(1);
                opacity: 1;
            }
        }

        @keyframes blink {
            0% {
                opacity: 1;
            }
            50% {
                opacity: 0;
            }
            100% {
                opacity: 1;
            }
        }

    </style>
    <title>Portal Berita</title>
</head>
<body>

    <!-- Loading screen -->
    <div id="loading-screen" class="hidden">
        <div class="news-container" style="font-family: 'Protest Revolution', sans-serif;">NEWS</div>
    </div>

    <!-- Header section -->
    <header class="d-flex justify-content-center align-items-center text-center text-white" 
            style="background: #6c757d; height: 100vh; width: 100%; overflow: hidden;">
        <div class="container">
            <h1 class="display-4" data-aos="fade-down">Selamat Datang di Portal Berita</h1>
            <p class="lead" data-aos="fade-up" data-aos-delay="200">
                Temukan berita terbaru, terpercaya, dan terlengkap setiap hari.
            </p>
            <a href="/login" class="btn btn-outline-light btn-lg" data-aos="fade-left" data-aos-delay="600">Get Started</a>
        </div>
    </header>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>

    <script>
        // Inisialisasi AOS (Animate on Scroll)
        AOS.init();

        // Menambahkan animasi loading saat tombol diklik
        document.addEventListener("DOMContentLoaded", function () {
            const links = document.querySelectorAll("a"); // Semua link

            links.forEach(link => {
                link.addEventListener("click", function (e) {
                    // Cek apakah link menuju halaman eksternal atau _blank
                    if (link.target === "_blank" || !link.href.includes(window.location.origin)) {
                        return; // Abaikan link dengan target _blank atau eksternal
                    }

                    e.preventDefault(); // Cegah navigasi langsung
                    const loadingScreen = document.getElementById("loading-screen");
                    loadingScreen.classList.remove("hidden"); // Tampilkan loading screen

                    // Hapus loading screen setelah halaman selesai dimuat
                    setTimeout(() => {
                        window.location.href = link.href; // Pindah halaman setelah loading selesai
                    }, 2000); // Durasi loading screen (2 detik)
                });
            });
        });

        // Menambahkan event listener untuk page load baru
        window.addEventListener('load', function () {
            const loadingScreen = document.getElementById("loading-screen");
            loadingScreen.classList.add("hidden"); // Sembunyikan loading screen setelah halaman selesai dimuat
        });
    </script>

</body>
</html>
