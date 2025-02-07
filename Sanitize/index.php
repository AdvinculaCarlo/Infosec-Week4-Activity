<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Info Sys</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 50px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 20px;
        }
        .form-container {
            width: 300px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background: pink;
            text-align: center;
        }
        .output-container {
            width: 300px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background: lightgreen;
            text-align: center;
        }
        .output {
            font-weight: bold;
            color: blue;
            background-color: lightblue;
        }
        input {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            box-sizing: border-box;
        }
        button {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            box-sizing: border-box;
            background-color: yellow;
        }
        button:hover{
            color: gray;
        }
        .sanitized-output, .output-name, .output-email {
            color: darkblue;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>My Form</h2>
        <div class="form-container">
            <form method="post" action="">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" required>
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" required>
                <button type="submit">Submit</button>
            </form>
        </div>
    </div>
</body>
</html>

<?php
// Function to sanitize input
function sanitizeInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
    return $data;
}

$sanitized_name = $sanitized_email = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sanitized_name = sanitizeInput($_POST['name']);
    $sanitized_email = sanitizeInput($_POST['email']);
}
?>

<?php if (!empty($sanitized_name) && !empty($sanitized_email)): ?>
    <div class="output-container">
        <h3 style="sanitized-output">Sanitized output:</h3>
        <p style="output-name">Name: <?php echo htmlspecialchars($sanitized_name, ENT_QUOTES, 'UTF-8'); ?></p>
        <p style="output-email">Email: <?php echo htmlspecialchars($sanitized_email, ENT_QUOTES, 'UTF-8'); ?></p>
    </div>
<?php endif; ?>

