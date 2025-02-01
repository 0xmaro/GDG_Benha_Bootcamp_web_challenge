<?php
$servername = "localhost";
$username = "maro";
$password = "gdgchallenges";
$dbname = "ctf_challenge";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$resultHTML = "";
$passwordVerifyHTML = "";

if (isset($_GET['Submit'])) {
    $id = $_GET['id'];
    $query = "SELECT first_name, last_name FROM users WHERE id = '$id'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $resultHTML .= '<div class="result">';
            $resultHTML .= '<p>First Name: ' . htmlspecialchars($row['first_name']) . '</p>';
            $resultHTML .= '<p>Last Name: ' . htmlspecialchars($row['last_name']) . '</p>';
            $resultHTML .= '</div>';
        }

        $passwordVerifyHTML = '
        <hr>
            <form action="" method="POST">
                <label for="password">Enter Password of GDG</label>
                <input type="password" id="password" name="password" class="input-box" placeholder="Enter Password">
                <label for="flag">Enter Flag</label>
                <input type="text" id="flag" name="flag" class="input-box" placeholder="Enter Flag">
                <button type="submit" name="Verify">Verify</button>
            </form>
        ';
    } else {
        $resultHTML = '<p class="result">No data found for the given ID.</p>';
    }
}

if (isset($_POST['Verify'])) {
    $password = $_POST['password'];
    $flag = $_POST['flag'];

    if ($password === "bootcamp2025" && $flag === "GDG{GDG_BENHA_SQLI_Challenges}") {
        $resultHTML .= '<p class="result success">Congratulations! You have successfully completed the SQlI challenges.</p>';
        echo "<script>setTimeout(() => { window.location.href = 'Commendinjection.php'; }, 3000);</script>";
    } else {
        $resultHTML .= '<p class="result">Invalid password or flag. Please try again.</p>';
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SQL Injection Challenge</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            margin: 0;
            padding: 0;
            background: url('background.jpg') no-repeat center center fixed;
            background-size: cover;
            font-family: Arial, sans-serif;
            color: white;
        }

        .wrapper {
            width: 600px;
            background-color: transparent;
            border: 2px solid rgba(255, 255, 255, 0.345);
            backdrop-filter: blur(20px);
            box-shadow: 0 0 10px rgb(0, 0, 0, .2);
            color: white;
            border-radius: 10px;
            padding: 30px 40px;
        }

        h1,
        h2 {
            text-align: center;
            color: rgb(255, 255, 255);
        }

        label {
            display: block;
            margin: 10px 0 5px;
        }

        input[type="text"],
        input[type="password"] {
    width: 100%;
    height: 100%;
    background: transparent;
    border: none;
    outline: none;
    border: 2px solid rgba(255, 255, 255, 0.332);
    border-radius: 40px;
    font-size: 20px;
    color: #ffffff;
    padding: 20px 45px 20px 20px;
        }

        button {
            width: 100%;
            height: 45px;
            background: #ffffff;
            border: none;
            outline: none;
            border-radius: 45px;
            font-size: 18px;
            box-shadow: 0 0 10px rgb(0, 0, 0, .1);
            cursor: pointer;
            font-weight: 600;
            color: rgb(30, 31, 31);
            margin-top: 11px;
        }

        button:hover {
            background-color: rgb(203, 221, 255);
        }

        hr {
            margin: 20px 0;
            border: 1px solid white;
        }

        .result {
            margin: 10px 0;
            padding: 10px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 5px;
        }

        .result.success {
            color: limegreen;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <form action="" method="GET">
            <h1>GDG Benha SQLi Challenges</h1>

            <input type="text" id="id" name="id" class="input-box" placeholder="Enter ID">

            <button type="submit" name="Submit">Submit</button>
            <?php echo $resultHTML; ?>
        </form>

        <?php echo $passwordVerifyHTML; ?>
    </div>
</body>

</html>