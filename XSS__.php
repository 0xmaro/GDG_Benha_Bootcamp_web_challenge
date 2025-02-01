<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Challenge xss </title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #000;
            color: #0f0;
            margin: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            background-color: rgba(0, 255, 0, 0.1);
            padding: 30px;
            border-radius: 12px;
            border: 2px solid #0f0;
            box-shadow: 0 0 20px #0f0;
            text-align: center;
            width: 400px;
        }

        h1 {
            color: #0f0;
            font-size: 2rem;
            text-shadow: 0 0 10px #0f0, 0 0 20px #0f0;
        }

        input[type="text"] {
            width: 90%;
            padding: 12px;
            background-color: black;
            color: #0f0;
            border: 2px solid #0f0;
            border-radius: 6px;
            font-size: 1rem;
            text-align: center;
            margin-top: 10px;
        }

        button {
            margin-top: 15px;
            padding: 12px 25px;
            background-color: black;
            color: #0f0;
            border: 2px solid #0f0;
            border-radius: 6px;
            font-size: 1rem;
            cursor: pointer;
            text-shadow: 0 0 5px #0f0;
            box-shadow: 0 0 15px #0f0;
        }

        button:hover {
            background-color: #0f0;
            color: black;
            text-shadow: none;
        }

        .next-btn {
            font-size: 0.8rem;
            padding: 8px 16px;
            margin-top: 10px;
            float: right;
            background-color: black;
            color: green;
            border: 2px solid #0f0;
            border-radius: 6px;
            text-shadow: 0 0 5px #f00;
            box-shadow: 0 0 15px #f00;
            cursor: pointer;
            transition: 0.3s;
        }

        .next-btn:hover {
            background-color: #0f0;
            color: black;
            text-shadow: 0 0 5px #f00;
            box-shadow: 0 0 15px #f00;
        }

        h2 {
            margin-top: 20px;
            text-shadow: 0 0 10px #0f0;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>GDG Benha Bootcamp XSS Challenge 1</h1>
        <form method="POST" action="">
            <label for="username">Enter Your name:</label><br>
            <input type="text" name="username" id="username"><br><br>
            <button type="submit">Submit</button>
        </form>
        <h2>Hello,
            <?php
            if (isset($_POST['username'])) {
                $username = $_POST['username'];
                echo $username; 
                ?>
            </h2>
            <button class="next-btn" onclick="nextChallenge()">Next Challenge</button>
        <?php } ?>
    </div>

    <script>
        function nextChallenge() {
            window.location.href = 'XSS2.php';
        }
    </script>
</body>

</html>