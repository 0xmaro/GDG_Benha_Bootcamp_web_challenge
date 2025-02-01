<?php
$flag = "GDG{0xCommend_injection101}";
$message = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['query'])) {
        $query = $_POST['query'];
        
        
        $output = shell_exec("bash -c \"$query\" 2>&1");
    } elseif (isset($_POST['flag'])) {
        $user_flag = $_POST['flag'];
        if ($user_flag === $flag) {
            header("Location: XSS__.php");
            exit();
        } else {
            $message = "Incorrect flag. Try again!";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>GDG Command Injection</title>
</head>
<body>
    <div class="wrapper">
        <form action="" method="POST">
            <h1>GDG Benha Bootcamp Command Injection Challenge</h1>
            <br>
            <hr>
            <br>
            <h2>Search Utility</h2>
            <div class="input-box">
                <input type="text" name="query" placeholder="Enter domain or IP" required>
            </div>
            <button type="submit" class="btn">Search</button>
        </form>

        <form action="" method="POST">
            <br>
            <h2>Submit Flag</h2>
            <div class="input-box">
                <input type="text" name="flag" placeholder="Enter the flag" required>
            </div>
            <button type="submit" class="btn">Submit</button>
        </form>

        <?php if (!empty($message)): ?>
            <div class="error-box">
                <p><?php echo htmlspecialchars($message); ?></p>
            </div>
        <?php endif; ?>

        <?php if (isset($output)): ?>
            <div class="output-box">
                <br>
                <h2>Results:</h2>
                <pre style="margin: 10px 0; padding: 10px;
                background: rgba(255, 255, 255, 0.1);
                border-radius: 5px;
                font-size: 13px;">
                    <?php echo htmlspecialchars($output); ?>
                </pre>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
