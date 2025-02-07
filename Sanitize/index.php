<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Info Sys</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 50px;
        }
        .container {
            display: flex;
            justify-content: center;
            align-items: flex-start;
            gap: 20px;
        }
        .form-container {
            width: 300px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background: #f9f9f9;
        }
        .output-container {
            width: 300px;
            margin-top: 20px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background: #f9f9f9;
        }
        .output {
            font-weight: bold;
            color: blue;
        }
    </style>

<div class="container">
    <h2 class="form-container">My Form</h2>
    
        <div class="form-container">
            <form method="post" action="">
            
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" required>
                <br><br>
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" required>
                <br><br>
                <button type="submit">Submit</button>
            </form>
        </div>

</body>
</html>

<?php
// Function to sanitize input

function sanitizeInput($data) {
    $data = trim($data); // Remove unnecessary spaces before and after
    $data = stripslashes($data); // Remove backslashes
    $data = htmlspecialchars($data, ENT_QUOTES, 'UTF-8'); // Converts spec char to prevent XSS
    return $data;
}

$sanitized_name = $sanitized_email = ""; // Default empty values

if ($_SERVER["REQUEST_METHOD"]) == "POST" {
    $sanitized_name = sanitizeInput($_POST['name']);
    $sanitized_email = sanitizeInput($_POST['email']);
}
?>

<?php if(!empty($sanitized_name)&&!empty($sanitized_email)); ?>
    <div class="output">
    <h3>Sanitized output: </h3>
    <p>Name: <?php echo htmlspecialchars($sanitized_name, ENT_QUOTES, 'UTF-8');?></p>
    <p>Email: <?php echo htmlspecialchars($sanitized_email, ENT_QUOTES, 'UTF-8');?></p>
    </div>
<?php endif; ?>