<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SQLI Sellect ID Challenge</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            margin: 0;
            padding: 0;
            background: url(background.jpg) no-repeat center center fixed;
            background-size: cover;
            font-family: Arial, sans-serif;
            color: white;
        }

        .wrapper {
    width: 450px;
    background-color: transparent;
    border: 2px solid rgba(255, 255, 255, 0.345);
    backdrop-filter: blur(20px);
    box-shadow: 0 0 10px rgb(0, 0, 0, .2);
    color: white;
    border-radius: 10px;
    padding: 30px 40px;
        }

        h1, h2 {
            text-align: center;
            color:rgb(255, 255, 255);
        }

        h3, p {
            color:rgb(223, 238, 255);
        }

        label {
            display: block;
            margin: 10px 0 5px;
        }

        select, input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: none;
            border-radius: 5px;
            outline: none;
        }

        button {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color:rgba(255, 213, 181, 0.95);
            color: black;
            font-size: 16px;
            cursor: pointer;
            margin-bottom: 10px;
        }

        button:hover {
            background-color:rgb(203, 221, 255);
        }

        .input-box {
    margin-bottom: 10px;
    width: 100%;
    height: 100%;
    background: transparent;
    border: none;
    outline: none;
    border: 2px solid rgba(255, 255, 255, 0.332);
    border-radius: 40px;
    font-size: 20px;
    color: #ffffff;
    padding: 10px 20px 20px 20px;
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
    </style>
</head>

<body>
    <div class="wrapper">
        <form action="" method="GET">
            <h1>GDG Benha SQLi Challenges</h1>

            <label for="id">Select ID:</label>
            <select name="id" id="id">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
            </select>

            <button type="submit" name="Submit">Submit</button>

            <p>Hint: Can you retrieve all users?</p>

            <?php
            if (isset($_GET['Submit'])) {
                $servername = "localhost";
                $username = "maro";
                $password = "gdgchallenges";
                $dbname = "ctf_challenge";

                $conn = new mysqli($servername, $username, $password, $dbname);

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $id = $_GET['id'];
                $query = "SELECT first_name, last_name FROM users WHERE id = '$id'";
                $result = $conn->query($query);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<div class="result">';
                        echo '<p>ID: ' . htmlspecialchars($id) . '</p>';
                        echo '<p>First Name: ' . htmlspecialchars($row['first_name']) . '</p>';
                        echo '<p>Last Name: ' . htmlspecialchars($row['last_name']) . '</p>';
                        echo '</div>';
                    }
                } else {
                    echo '<p class="result">No data found for the given ID.</p>';
                }
                $conn->close();
            }
            ?>

            <hr>

            <h2>Verify Last Name</h2>
            <br>
            <p>    Enter the last name of "assem" below:</p>

            <div class="input-box">
                <input type="text" name="verify_last_name" placeholder="Last Name">
            </div>

            <button type="submit" name="Verify">Verify</button>

            <?php
            if (isset($_GET['Verify'])) {
                $servername = "localhost";
                $username = "maro";
                $password = "gdgchallenges";
                $dbname = "ctf_challenge";

                $conn = new mysqli($servername, $username, $password, $dbname);

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $input_last_name = $_GET['verify_last_name'];
                $verify_query = "SELECT last_name FROM users WHERE first_name = 'assem'";
                $verify_result = $conn->query($verify_query);

                if ($verify_result->num_rows > 0) {
                    $row = $verify_result->fetch_assoc();
                    $correct_last_name = $row['last_name'];

                    if ($input_last_name === $correct_last_name) {
                        echo '<p style="color:rgb(197, 255, 208);">Success! You provided the correct last name.</p>';
                        echo "<script>setTimeout(() => { window.location.href = 'sqlmap.php'; }, 3000);</script>";
                    } else {
                        echo '<p style="color: red;">Incorrect last name. Try again!</p>';
                    }
                } else {
                    echo '<p style="color: red;">Error: Could not find the user "assem".</p>';
                }
                $conn->close();
            }
            ?>
        </form>
    </div>
</body>

</html>
