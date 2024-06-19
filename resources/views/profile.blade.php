<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Gaya tambahan jika diperlukan -->
    <style>
        body {
            background-color: #f0f8ff; /* Light blue background */
        }

        .profile-photo {
            max-width: 150px;
            border-radius: 50%;
            object-fit: cover;
            object-position: center;
        }

        .default-profile-photo {
            background-color: #ccc;
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 24px;
            border-radius: 50%;
            width: 150px;
            height: 150px;
        }

        .logout-button {
            text-align: center;
            margin-top: 20px;
        }

        .logout-button button {
            background-color: #dc3545; /* Bootstrap danger color */
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
        }

        .logout-button button:hover {
            background-color: #c82333; /* Darker shade of danger color */
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <div class="navbar-nav">
                <a class="nav-link active" aria-current="page" href="/posts">Posts</a>
                <a class="nav-link" href="profile">Profile</a>
            </div>
            <form class="d-flex ms-auto search-container" role="search" onsubmit="event.preventDefault(); addSearchHistory(); filterPosts();">
                <input class="form-control me-2" type="search" id="searchInput" placeholder="Search" aria-label="Search" oninput="showSearchSuggestions()">
                <ul class="dropdown-menu" id="searchSuggestions"></ul>
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </nav> 
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body text-center">
                        @if($user->profile_photo_path)
                            <img src="{{ asset('storage/' . $user->profile_photo_path) }}" class="img-fluid rounded-circle mb-3 profile-photo" alt="Profile Photo">
                        @else
                            <div class="default-profile-photo">
                                <span>{{ substr($user->name, 0, 1) }}</span> <!-- Menggunakan huruf pertama dari nama sebagai inisial -->
                            </div>
                        @endif
                        <h5 class="card-title">{{ $user->name }}</h5>
                        <p class="card-text">{{ $user->email }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Informasi Profil</h5>
                        <p><strong>Nama:</strong> {{ $user->name }}</p>
                        <p><strong>Email:</strong> {{ $user->email }}</p>
                        <p><strong>Member Since:</strong> {{ $user->created_at->format('M d, Y') }}</p>
                    </div>
                </div>
                <div class="logout-button">
                    <form id="logoutForm" action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button class="btn btn-danger" type="submit">Logout</button> <!-- Used btn-danger class for red color -->
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Script Bootstrap JS (Opsional jika Anda membutuhkan komponen yang memerlukan JavaScript Bootstrap) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>