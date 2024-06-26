<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/signup.css') }}">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Blog | Sign-Up</title>
</head>
<body>
    <div class="signup">
        <form method="POST" action="{{ route('register') }}">
        @csrf
        <!-- Form fields here -->
            <h1>Sign-Up</h1>
            <div class="input-box">
                <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
                <i class='bx bxs-user'></i>
                @error('email')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <div class="input-box">
                <input type="text" name="name" placeholder="User Name" value="{{ old('name') }}" required>
                <i class='bx bxs-user'></i>
                @error('name')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <div class="input-box">
                <input type="password" name="password" placeholder="Password" required>
                <i class='bx bxs-lock-alt' ></i>
                @error('password')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <div class="input-box">
                <input type="password" name="password_confirmation" placeholder="Confirm Password" required>
                <i class='bx bxs-lock-alt' ></i>
                @error('password_confirmation')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <div class="showpassword">
                <input type="checkbox" id="showPasswordCheckbox" onclick="showHidePassword()">
            </div>
            <div>
                <button type="submit" class="btn">Create account</button>
            </div>
        </form>     
    </div>
</body>
</html>
