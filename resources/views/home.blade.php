<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .navbar {
            margin-bottom: 30px;
        }
        .hero {
            background: url('https://via.placeholder.com/1500x600') no-repeat center center;
            background-size: cover;
            height: 600px;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }
        .hero h1 {
            font-size: 4rem;
        }
        .hero p {
            font-size: 1.5rem;
        }
        .content {
            padding: 50px 0;
        }
        .content h2 {
            margin-bottom: 30px;
        }
        .footer {
            background: #f8f9fa;
            padding: 20px 0;
            text-align: center;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">Blog Saya</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="hero">
        <div class="container">
            <h1>Blog Mengenai Seputar Lingkungan</h1>
            <p>Menceritakan mengenai kehidupan seputar anda</p>
        </div>
    </div>

    <!-- Main Content -->
    <div class="content container">
        <h2>Artikel Terbaru</h2>
        <div id="articles" class="row">
            <!-- Articles will be inserted here by JavaScript -->
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <p>&copy; 2024 Blog Saya. All Rights Reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        function isAuthenticated() {
            // Mock authentication check. Replace this with real authentication check.
            return !!localStorage.getItem('authenticated');
        }

        function handleReadMore(event, loginUrl, articleUrl) {
            event.preventDefault();
            if (isAuthenticated()) {
                window.location.href = articleUrl;
            } else {
                window.location.href = loginUrl + "?redirect=" + encodeURIComponent(articleUrl);
            }
        }

        const articles = [
            {
                title: "Hot News",
                summary: "Ringkasan mengenai berita terkini...",
                url: "/posts/hot-news"
            },
            {
                title: "Sport",
                summary: "Ringkasan mengenai kejadian seputar olahraga...",
                url: "/posts/sport"
            },
            {
                title: "Pendidikan",
                summary: "Ringkasan mengenai kejadian seputar pendidikan...",
                url: "/posts/pendidikan"
            }
        ];

        function loadArticles() {
            const articlesContainer = document.getElementById('articles');
            articles.forEach(article => {
                const articleCard = document.createElement('div');
                articleCard.classList.add('col-md-4');
                articleCard.innerHTML = `
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title">${article.title}</h5>
                            <p class="card-text">${article.summary}</p>
                            <a href="#" class="btn btn-primary" onclick="handleReadMore(event, '/login', '${article.url}')">Baca Selengkapnya</a>
                        </div>
                    </div>
                `;
                articlesContainer.appendChild(articleCard);
            });
        }

        document.addEventListener('DOMContentLoaded', loadArticles);
    </script>
</body>
</html>
