<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/signup.css') }}">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Blog | Sign-Up</title>
    <style>
        /* Modal styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0,0,0);
            background-color: rgba(0,0,0,0.4);
            padding-top: 60px;
        }

        .modal-content {
            background-color: #fefefe;
            margin: 5% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
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
                <label for="showPasswordCheckbox">Show Password</label>
            </div>
            <div>
                <button type="submit" class="btn">Create account</button>
            </div>
        </form>     
    </div>

    <!-- The Modal -->
    <div id="emailErrorModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <p>Email is already registered. Please use a different email.</p>
        </div>
    </div>

    <script>
        function showHidePassword() {
            var passwordInput = document.querySelector('input[name="password"]');
            var passwordConfirmation = document.querySelector('input[name="password_confirmation"]');
            var checkbox = document.getElementById('showPasswordCheckbox');
            if (checkbox.checked) {
                passwordInput.type = 'text';
                passwordConfirmation.type = 'text';
            } else {
                passwordInput.type = 'password';
                passwordConfirmation.type = 'password';
            }
        }

        function closeModal() {
            document.getElementById('emailErrorModal').style.display = "none";
        }

        @if ($errors->has('email'))
            document.getElementById('emailErrorModal').style.display = "block";
        @endif
    </script>
</body>
</html>
