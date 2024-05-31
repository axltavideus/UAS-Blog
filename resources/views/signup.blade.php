<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/signup.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Blog | Sign-Up</title>
</head>
<body>
    <div class="signup">
        <form action="">
            <h1>Sign-Up</h1>
            <div class="input-box">
            <input type="Email" placeholder="Email"required>
                <i class='bx bxs-user'></i>
            </div>
            <div class="input-box">
                <input type="User Name" placeholder="User Name"required>
            </div>
            <div class="input-box">
                <input type="Password" placeholder="Password"require>
            </div>
            <div class="input-box">
                <input type="Confirm Password" placeholder="Confirm Passsword">
            </div>
            <input type="checkbox" onclick="showHide()">
            <div>
                <button type="submit" class="btn">Create account</button>
            </div>
        </form>     
    </div>
</body>
</html>