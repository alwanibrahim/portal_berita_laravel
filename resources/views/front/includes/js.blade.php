 <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
      /*!
 * Color mode toggler for Bootstrap's docs (https://getbootstrap.com/)
 * Copyright 2011-2024 The Bootstrap Authors
 * Licensed under the Creative Commons Attribution 3.0 Unported License.
 */

(() => {
  'use strict'

  const getStoredTheme = () => localStorage.getItem('theme')
  const setStoredTheme = theme => localStorage.setItem('theme', theme)

  const getPreferredTheme = () => {
    const storedTheme = getStoredTheme()
    if (storedTheme) {
      return storedTheme
    }

    return window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light'
  }

  const setTheme = theme => {
    if (theme === 'auto') {
      document.documentElement.setAttribute('data-bs-theme', (window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light'))
    } else {
      document.documentElement.setAttribute('data-bs-theme', theme)
    }
  }

  setTheme(getPreferredTheme())

  const showActiveTheme = (theme, focus = false) => {
    const themeSwitcher = document.querySelector('#bd-theme')

    if (!themeSwitcher) {
      return
    }

    const themeSwitcherText = document.querySelector('#bd-theme-text')
    const activeThemeIcon = document.querySelector('.theme-icon-active ')
    const btnToActive = document.querySelector(`[data-bs-theme-value="${theme}"]`)
    const iconOfActiveBtn = btnToActive.querySelector('i').dataset.themeIcon

    document.querySelectorAll('[data-bs-theme-value]').forEach(element => {
      element.classList.remove('active')
      element.setAttribute('aria-pressed', 'false')
    })

    btnToActive.classList.add('active')
    btnToActive.setAttribute('aria-pressed', 'true')
    activeThemeIcon.classList.remove(activeThemeIcon.dataset.themeIconActive)
    activeThemeIcon.classList.add(iconOfActiveBtn)
    activeThemeIcon.dataset.iconActive =iconOfActiveBtn
    const themeSwitcherLabel = `${themeSwitcherText.textContent} (${btnToActive.dataset.bsThemeValue})`
    themeSwitcher.setAttribute('aria-label', themeSwitcherLabel)

    if (focus) {
      themeSwitcher.focus()
    }
  }

  window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', () => {
    const storedTheme = getStoredTheme()
    if (storedTheme !== 'light' && storedTheme !== 'dark') {
      setTheme(getPreferredTheme())
    }
  })

  window.addEventListener('DOMContentLoaded', () => {
    showActiveTheme(getPreferredTheme())

    document.querySelectorAll('[data-bs-theme-value]')
      .forEach(toggle => {
        toggle.addEventListener('click', () => {
          const theme = toggle.getAttribute('data-bs-theme-value')
          setStoredTheme(theme)
          setTheme(theme)
          showActiveTheme(theme, true)
        })
      })
  })
})()
    </script>
    
      <script>
    document.getElementById("focusModeToggle").addEventListener("click", function () {
        const sidebar = document.querySelectorAll(".focus-sidebar .sidebar");  // Memilih elemen sidebar di dalam .col-lg-4
        const content = document.querySelector(".content");

        // Toggle kelas 'hidden' pada semua elemen sidebar dan 'focus-mode' pada konten
        sidebar.forEach(function(element) {
            element.classList.toggle("hidden");  // Menyembunyikan elemen sidebar
        });

        content.classList.toggle("focus-mode");  // Memperbesar konten utama
    });

    // Font Size Adjustment
const fontSizeSlider = document.getElementById("fontSizeSlider");
const fontSizeValue = document.getElementById("fontSizeValue");
const articleBody = document.getElementById("articleBody");

fontSizeSlider.addEventListener("input", function () {
    const fontSize = `${this.value}px`;
    articleBody.style.fontSize = fontSize;
    fontSizeValue.textContent = fontSize;
});

// Focus Mode Logic
document.getElementById("focusModeToggle").addEventListener("change", function () {
    const content = document.querySelector(".content");
    if (this.checked) {
        content.classList.add("focus-mode");
    } else {
        content.classList.remove("focus-mode");
    }
});

function shareToFacebook() {
        const url = encodeURIComponent(window.location.href);
        const facebookShareUrl = `https://www.facebook.com/sharer/sharer.php?u=${url}`;
        window.open(facebookShareUrl, '_blank', 'width=600,height=400');
    }

    function shareToTwitter() {
        const url = encodeURIComponent(window.location.href);
        const twitterShareUrl = `https://twitter.com/intent/tweet?url=${url}`;
        window.open(twitterShareUrl, '_blank', 'width=600,height=400');
    }

    document.querySelectorAll('.category-link').forEach(link => {
        link.addEventListener('click', (event) => {
            alert(`Filter: ${link.textContent}`);
        });
    });

    document.addEventListener("DOMContentLoaded", function () {
    // Tombol utama untuk mengontrol tampilan opsi
    const toggleMainButton = document.getElementById("toggleMainButton");
    const toggleOptions = document.getElementById("toggleOptions");

    toggleMainButton.addEventListener("click", function () {
        // Toggle tampilan container opsi
        if (toggleOptions.style.display === "none" || toggleOptions.style.display === "") {
            toggleOptions.style.display = "block";
        } else {
            toggleOptions.style.display = "none";
        }
    });

    // Slider untuk mengubah ukuran font
    const fontSizeSlider = document.getElementById("fontSizeSlider");
    const fontSizeValue = document.getElementById("fontSizeValue");

    fontSizeSlider.addEventListener("input", function () {
        fontSizeValue.textContent = `${fontSizeSlider.value}px`;
        fontSizeValue.style.fontSize = `${fontSizeSlider.value}px`;
    });
});

</script>
<script>
  document.addEventListener('DOMContentLoaded', function () {
      const toggleMainButton = document.getElementById('toggleMainButton');
      const toggleOptions = document.getElementById('toggleOptions');

      // Log untuk memastikan elemen ditemukan
      console.log(toggleMainButton, toggleOptions);

      toggleMainButton.addEventListener('click', () => {
          console.log('Tombol toggle diklik');
          if (toggleOptions.style.display === 'none' || toggleOptions.style.display === '') {
              toggleOptions.style.display = 'block';
              console.log('Opsi ditampilkan');
          } else {
              toggleOptions.style.display = 'none';
              console.log('Opsi disembunyikan');
          }
      });

      const fontSizeSlider = document.getElementById('fontSizeSlider');
      const fontSizeValue = document.getElementById('fontSizeValue');
      const articleBody = document.getElementById('articleBody');

      fontSizeSlider.addEventListener('input', function () {
          const newSize = `${this.value}px`;
          articleBody.style.fontSize = newSize;
          fontSizeValue.textContent = newSize;
          console.log(`Font size diubah menjadi: ${newSize}`);
      });

      const focusModeToggle = document.getElementById('focusModeToggle');
      const sidebar = document.querySelector('.focus-sidebar');

      focusModeToggle.addEventListener('change', function () {
          console.log(`Focus Mode: ${this.checked}`);
          sidebar.style.display = this.checked ? 'none' : 'block';
      });
  });
</script>

<script>
  
</script>
   
    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->