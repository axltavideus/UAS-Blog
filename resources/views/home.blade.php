<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f4f4f9;
        }

        .navbar {
            margin-bottom: 30px;
            background-color: #007bff;
        }

        .navbar-brand,
        .nav-link {
            color: #fff !important;
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
            position: relative;
        }

        .hero::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 1;
        }

        .hero h1,
        .hero p {
            z-index: 2;
        }

        .hero h1 {
            font-size: 4rem;
            animation: fadeInDown 1s;
        }

        .hero p {
            font-size: 1.5rem;
            animation: fadeInUp 1s;
        }

        .content {
            padding: 50px 0;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
        }

        .content h2 {
            margin-bottom: 30px;
            text-align: center;
        }

        .footer {
            background: #343a40;
            color: #fff;
            padding: 20px 0;
            text-align: center;
        }

        .footer a {
            color: #007bff;
            margin: 0 10px;
        }

        .recommendation {
            background: #f8f9fa;
            padding: 50px 0;
        }

        .recommendation h2 {
            margin-bottom: 30px;
            text-align: center;
        }

        .recommendation .card {
            background: #fff;
            border: none;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
        }

        .recommendation .card:hover {
            transform: translateY(-10px);
        }

        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light">
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
                    <a class="nav-link" href="/posts">Post</a> 
                </li>
                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li>
                                <a class="dropdown-item" href="/profile">Profile</a>
                            </li>
                            <li>
                                <form id="logoutForm" action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="/login">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/register">Register</a>
                    </li>
                @endauth
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
        <div id="articleCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner" id="carouselItems">
                <!-- Carousel items will be inserted here by JavaScript -->
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#articleCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#articleCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    <!-- Recommendation Section -->
    <div class="recommendation container mt-5">
        <h2>Rekomendasi untuk Anda</h2>
        <div class="row" id="recommendationItems">
            <!-- Recommendation items will be inserted here by JavaScript -->
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <p>&copy; 2024 Blog Saya. All Rights Reserved.</p>
            <p>
                <a href="#"><img src="https://via.placeholder.com/20x20?text=FB" alt="Facebook"></a>
                <a href="#"><img src="https://via.placeholder.com/20x20?text=TW" alt="Twitter"></a>
                <a href="#"><img src="https://via.placeholder.com/20x20?text=IG" alt="Instagram"></a>
            </p>
        </div>
    </footer>

    <!-- Login Modal -->
    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginModalLabel">Login</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="loginEmail" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="loginEmail" required>
                        </div>
                        <div class="mb-3">
                            <label for="loginPassword" class="form-label">Password</label>
                            <input type="password" class="form-control" id="loginPassword" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Register Modal -->
    <div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="registerModalLabel">Register</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="registerName" class="form-label">Name</label>
                            <input type="text" class="form-control" id="registerName" required>
                        </div>
                        <div class="mb-3">
                            <label for="registerEmail" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="registerEmail" required>
                        </div>
                        <div class="mb-3">
                            <label for="registerPassword" class="form-label">Password</label>
                            <input type="password" class="form-control" id="registerPassword" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Register</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

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
                url: "/posts/hot-news",
                imageUrl: "https://via.placeholder.com/1500x600?text=Hot+News"
            },
            {
                title: "Sport",
                summary: "Ringkasan mengenai kejadian seputar olahraga...",
                url: "/posts/sport",
                imageUrl: "https://via.placeholder.com/1500x600?text=Sport"
            },
            {
                title: "Pendidikan",
                summary: "Ringkasan mengenai kejadian seputar pendidikan...",
                url: "/posts/pendidikan",
                imageUrl: "https://via.placeholder.com/1500x600?text=Pendidikan"
            }
        ];

        function loadArticles() {
            const carouselItemsContainer = document.getElementById('carouselItems');
            const articleCarousel = document.getElementById('articleCarousel');
            articles.forEach((article, index) => {
                const carouselItem = document.createElement('div');
                carouselItem.classList.add('carousel-item');
                if (index === 0) carouselItem.classList.add('active');
                carouselItem.innerHTML = `
                    <img src="${article.imageUrl}" class="d-block w-100" alt="${article.title}">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>${article.title}</h5>
                        <p>${article.summary}</p>
                        <a href="#" class="btn btn-primary" onclick="handleReadMore(event, '/login', '${article.url}')">Baca Selengkapnya</a>
                    </div>
                `;
                carouselItemsContainer.appendChild(carouselItem);
            });
            if (articles.length > 1) {
                articleCarousel.classList.add('carousel');
            }
        }

        document.addEventListener('DOMContentLoaded', loadArticles);

        // Rekomendasi Artikel
        const recommendationItemsContainer = document.getElementById('recommendationItems');
        const recommendationArticles = [
            {
                title: "Tips Hemat Energi di Rumah",
                summary: "Bagaimana cara menghemat energi di rumah Anda...",
                url: "/posts/tips-hemat-energi",
                imageUrl: "https://via.placeholder.com/300x200?text=Tips+Hemat+Energi"
            },
            {
                title: "Mengenal Jenis-Jenis Bahan Daur Ulang",
                summary: "Mengapa daur ulang penting dan apa saja jenisnya...",
                url: "/posts/jenis-bahan-daur-ulang",
                imageUrl: "https://via.placeholder.com/300x200?text=Jenis+Bahan+Daur+Ulang"
            },
            {
                title: "Cara Memulai Kebun Sayur di Rumah",
                summary: "Langkah-langkah sederhana untuk memulai kebun sayur...",
                url: "/posts/kebun-sayur-di-rumah",
                imageUrl: "https://via.placeholder.com/300x200?text=Kebun+Sayur+di+Rumah"
            }
        ];

        recommendationArticles.forEach((article) => {
            const recommendationItem = document.createElement('div');
            recommendationItem.classList.add('col-md-4', 'mb-3');
            recommendationItem.innerHTML = `
                <div class="card">
                    <img src="${article.imageUrl}" class="card-img-top" alt="${article.title}">
                    <div class="card-body">
                        <h5 class="card-title">${article.title}</h5>
                        <p class="card-text">${article.summary}</p>
                        <a href="#" class="btn btn-primary" onclick="handleReadMore(event, '/login', '${article.url}')">Baca Selengkapnya</a>
                    </div>
                </div>
            `;
            recommendationItemsContainer.appendChild(recommendationItem);
        });
    </script>
</body>

</html>
