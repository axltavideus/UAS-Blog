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
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('posts.index') }}">Post</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Random Background Image</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f4f4f9;
        }

        .hero {
            height: 600px;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            position: relative;
            background-size: cover;
            background-position: center;
            transition: background-image 0.3s ease-in-out;
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

        .hero-content {
            position: relative;
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
    <!-- Hero Section -->
    <div class="hero" id="heroSection">
        <div class="container">
            <div class="hero-content text-white text-center">
                <h1>Blog Mengenai Seputar Lingkungan</h1>
                <p>Menceritakan mengenai kehidupan seputar anda</p>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Array of background image URLs related to environment
        const backgroundImages = [
            'https://tse2.mm.bing.net/th?id=OIP.PXccZFtrD8s8Q6XBPZUDVQHaE7&pid=Api&P=0&h=220',
            'https://th.bing.com/th/id/OIP.flMjvy1Ou-BQFuEAYRwYCAHaFj?rs=1&pid=ImgDetMain',
            'https://th.bing.com/th/id/OIP.-qBY5gHJuF6QuAWYkbTu0gHaE7?rs=1&pid=ImgDetMain'
            // Add more URLs as needed
        ];

        // Function to set a random background image related to environment
        function setRandomBackground() {
            const randomIndex = Math.floor(Math.random() * backgroundImages.length);
            const randomImageUrl = backgroundImages[randomIndex];
            document.getElementById('heroSection').style.backgroundImage = `url('${randomImageUrl}')`;
        }

        // Call the function when the page loads
        window.onload = setRandomBackground;
    </script>
</body>
</html>

<!-- Main Content -->
<div class="content container">
    <h2>Artikel Terbaru</h2>
    <div id="articleCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://img-s-msn-com.akamaized.net/tenant/amp/entityid/BB1ow3uq.img?w=650&h=366&m=6&x=120&y=120&s=280&d=280" class="d-block w-100" alt="First slide">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Test Drive Mobil Hadiah, Putin Sopiri Kim Jong Un di Pyongyang Korea Utara</h5>
                    <a href="#" class="btn btn-primary">Baca Selengkapnya</a>
                </div>
            </div>
            <div class="carousel-item">
                <img src="https://img-s-msn-com.akamaized.net/tenant/amp/entityid/BB1iTzvV.img?w=768&h=512&m=6" class="d-block w-100" alt="Second slide">
                <div class="carousel-caption d-none d-md-block">
                <h5>Ramai-ramai Cuan Lewat AI: Memanfaatkan AI untuk Meningkatkan Penghasilan</h5>
                    <p>Ringkasan artikel pertama. Deskripsi singkat tentang artikel ini.</p>
                    <a href="#" class="btn btn-primary">Baca Selengkapnya</a>
                </div>
            </div>
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
        <div class="row">
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Artikel Menarik 1</h5>
                        <p class="card-text">Ringkasan artikel rekomendasi pertama.</p>
                        <a href="#" class="btn btn-primary">Baca Selengkapnya</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Artikel Menarik 2</h5>
                        <p class="card-text">Ringkasan artikel rekomendasi kedua.</p>
                        <a href="#" class="btn btn-primary">Baca Selengkapnya</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Artikel Menarik 3</h5>
                        <p class="card-text">Ringkasan artikel rekomendasi ketiga.</p>
                        <a href="#" class="btn btn-primary">Baca Selengkapnya</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer mt-5">
        <div class="container">
            <p>&copy; 2024 Blog Saya. All Rights Reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
