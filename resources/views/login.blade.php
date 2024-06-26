<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Blog | Login</title>
</head>
<body>
    <div class="login">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <h1>Login</h1>
            <div class="input-box">
                <input type="email" name="email" placeholder="Email" required>
                <i class='bx bxs-user'></i>
            </div>
            <div class="input-box">
                <input type="Password" id="password" name="password" placeholder="Password"required>
                <i class='bx bxs-lock-alt' ></i>
            </div>
            <div class="showpassword">
                <input type="checkbox" id="showPasswordCheckbox" onclick="showHidePassword()">
            </div>
            <div class="remember-forgot">
                <label><input type="checkbox">Remember Me</label>
            </div>
                <button type="submit" class="btn">login</button>
            <div class="register-link"></div>
                <p>Don't have an account?<a href="register">Register</a></p>
        </form>
    </div>
    <script>
        function showHidePassword() {
            var passwordInput = document.getElementById("password");
            var checkbox = document.getElementById("showPasswordCheckbox");
            if (checkbox.checked) {
                passwordInput.type = "text";
            } else {
                passwordInput.type = "password";
            }
        }
    </script>
</body>
</html>