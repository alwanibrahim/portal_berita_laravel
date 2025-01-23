<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Berita</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 20px;
        }
        .news-item {
            border: 1px solid #ddd;
            margin-bottom: 20px;
            padding: 10px;
            border-radius: 5px;
        }
        .news-item img {
            max-width: 100%;
            height: auto;
        }
        .news-item a {
            color: blue;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <h1>Berita Teknologi Terkini</h1>
    @if (!empty($articles))
    @foreach ($articles as $article)
        <div class="news-item">
            <h2>{{ $article['title'] ?? 'Judul tidak tersedia' }}</h2>
            <img src="{{ $article['urlToImage'] ?? 'placeholder.jpg' }}" alt="Gambar Berita">
            <p>{{ $article['description'] ?? 'Deskripsi tidak tersedia' }}</p>
            <a href="{{ $article['url'] ?? '#' }}" target="_blank">Baca Selengkapnya</a>
        </div>
    @endforeach
@else
    <p>Tidak ada berita yang tersedia.</p>
@endif

</body>
</html>
