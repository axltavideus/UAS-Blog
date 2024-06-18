<!-- resources/views/profile.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Gaya tambahan jika diperlukan -->
    <style>
        .profile-photo {
            max-width: 150px;
            border-radius: 50%; /* Membuat foto profil bulat */
            object-fit: cover; /* Mengatur gambar agar terlihat baik dalam lingkaran */
            object-position: center; /* Posisi objek gambar di tengah */
        }

        .default-profile-photo {
            background-color: #ccc; /* Warna abu-abu */
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 24px;
            border-radius: 50%; /* Membuat foto profil default bulat */
            width: 150px; /* Ukuran yang sama dengan foto profil */
            height: 150px; /* Ukuran yang sama dengan foto profil */
        }
    </style>
</head>
<body>
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
                        <!-- Informasi tambahan lainnya -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Script Bootstrap JS (Opsional jika Anda membutuhkan komponen yang memerlukan JavaScript Bootstrap) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
