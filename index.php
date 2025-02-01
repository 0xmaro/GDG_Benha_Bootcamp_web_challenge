<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Challenge 1 Login Page</title>
</head>
<body>
    <?php
    $host = 'localhost';
    $db = 'ctf_challenge';
    $user = 'maro';
    $pass = 'gdgchallenges';

    $conn = new mysqli($host, $user, $pass, $db);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = $_POST['username'];
        $password = $_POST['password'];

      
        $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            
            echo "<div class='input-box'><h2 style='color: white;'>Login successful! Here is your flag: GDG{SQLi_success}</h2></div>";
            echo "<script>setTimeout(() => { window.location.href = 'selectid.php'; }, 3000);</script>";
        } else {
            echo "<h3 style='color: red;'>Invalid credentials!</h3>";
        }
    }
    ?>
    <div class="wrapper"> 
        <form action="" method="POST">
            <h1>Welcome To GDG Benha Bootcamp 2025</h1>
            <div class="input-box">
                <input type="text" name="username" placeholder="user name" required>
                <i class='bx bxs-user'></i>
            </div>
            <div class="input-box">
                <input type="password" name="password" placeholder="password" required>
                <i class='bx bx-lock-alt'></i>
            </div>
            <div class="remember_forget">
                <label><input type="checkbox"> Remember me</label>
                <a href="#">Forget password</a>
            </div>
            <button type="submit" class="btn">Login</button>
            <div class="resisteration">
                <p>Don't have an account? <a href="#">Register</a></p>
            </div>
        </form>
    </div>
</body>
</html>
