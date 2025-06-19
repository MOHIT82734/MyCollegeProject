<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get and sanitize inputs
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $phone = htmlspecialchars(trim($_POST['phone']));
    $dob = htmlspecialchars(trim($_POST['dob']));
    $gender = htmlspecialchars(trim($_POST['gender']));
    $course = htmlspecialchars(trim($_POST['course']));
    $address = htmlspecialchars(trim($_POST['address']));
    $city = htmlspecialchars(trim($_POST['city']));
    $state = htmlspecialchars(trim($_POST['state']));
    $pincode = htmlspecialchars(trim($_POST['pincode']));

    // Save data to CSV
    $file = 'registration.csv';
    $data = [$name, $email, $phone, $dob, $gender, $course, $address, $city, $state, $pincode, date('Y-m-d H:i:s')];
    $fp = fopen($file, 'a');
    fputcsv($fp, $data);
    fclose($fp);
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Registration Successful</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                background: #f5f7fa;
                margin: 0;
                padding: 0;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
            }
            .success-box {
                background-color: #ffffff;
                padding: 40px;
                border-radius: 10px;
                box-shadow: 0 0 10px rgba(0,0,0,0.1);
                text-align: center;
                max-width: 500px;
            }
            h2 {
                color: #0d47a1;
            }
            p {
                font-size: 18px;
            }
            a {
                color: #0d47a1;
                text-decoration: none;
                font-weight: bold;
            }
            a:hover {
                text-decoration: underline;
            }
        </style>
    </head>
    <body>
        <div class="success-box">
            <h2>Registration Successful!</h2>
            <p>Thank you, <strong><?php echo $name; ?></strong>, for registering for the <strong><?php echo $course; ?></strong> course.</p>
            <p><a href="registration.html">&larr; Go back to Registration</a></p>
        </div>
    </body>
    </html>

    <?php
} else {
    echo "Invalid request method.";
}
?>
