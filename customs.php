<?php


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'C:/MAMP/htdocs/Musselman-art/PHPMailer.php';
require 'C:/MAMP/htdocs/Musselman-art/SMTP.php';
require 'C:/MAMP/htdocs/Musselman-art/Exception.php';

?>





<!DOCTYPE html>

<html>

<head>
    <title>Commissions ~ Musselman Artistry</title>

    <link rel="icon" href="images/favicon.ico?" type="image/x-icon">
    <meta name = "keywords" content = "Musselman Artistry, artistry, Musselman, art, Sydney, Art, Every artist, Hand Crafted, custom, originals, commissions">

    <meta charset="utf-8">
        <link rel = "stylesheet" type = "text/css" href = "styles.css">
        <link rel = "stylesheet" type = "text/css" href = "mobile.css">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Merriweather&family=Montserrat:wght@300;500&family=Roboto:wght@100;300&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>

<div class = "container">


    <header>

        <img class = "title" src = "images/Title.png">

    </header>


<nav>
    <ul>
            <li><a class = "animated-underline" href = "index.php">Home</a><li>
            <li><a class = "animated-underline" href = "originals.php">Originals</a><li>
            <li><a class = "animated-underline" href = "customs.php">Commissions</a><li>
            <li><a class = "animated-underline" href = "pricing.php">Pricing</a><li>
            <li><a class = "animated-underline" href = "portfolio.php">Portfolio</a><li>
    </ul>
</nav>


<main class = "customs-width">


<div class = "prompt">

        <div class = "vision-container">
    <img class = "vision" src = "images/vision.png">
        </div>
    <p class = "prompt-paragraph">Let’s make something custom. If you want something painted, or want me to create a custom piece for you, it all begins with an idea.
     Contact me by filling out the form below so we can create something beautiful together.
</p>

</div>

<form method = 'POST' class = 'cmsform' enctype = "multipart/form/data">
    
    <input type = 'text' placeholder = 'First Name' name = 'firstName' class = 'firstLast'> <input type = 'text' placeholder = 'Last Name' name = 'lastName' class = 'firstLast'><br>
    <input type = 'text' placeholder = 'Email' name = 'email' class = 'contact-info' required><br>
    <input type = 'text' placeholder = 'Subject' name = 'subject' class = 'contact-info' required><br>
    <input type = 'text' placeholder = 'Tell me more' name = 'message' class = 'contact-info' id = 'customer-msg' required><br>
    <button><input type = 'submit' value = 'Send' class = 'send-btn'><a href = "thank-you-page.html"></a><button>


</form>


    <?php 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST["firstName"] . " " . $_POST["lastName"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];

    // Create a new PHPMailer instance
    $mail = new PHPMailer(true);

    // import config credentials
    $configs = include('config.php');

    try {
        // SMTP settings (replace with your email provider's configuration)
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // e.g., smtp.example.com
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Sender and recipient
        $mail->setFrom($email, $name);
        $mail->addAddress('Musselmanartistry@gmail.com'); // Change this to your recipient's email address

        // Email content
        $mail->isHTML(false);
        $mail->Subject = $subject;
        $mail->Body = "Name: $name\nEmail: $email\nSubject: $subject\n\nMessage:\n$message";

        // Send the email
        $mail->send();
          header("Location:thank-you-page.html");          
    } catch (Exception $e) {
        echo "Oops! Something went wrong. Please try again later. Error: " . $mail->ErrorInfo;
    }
}

    ?>

</main>

<aside></aside>

<footer>

<p class = "location" style = "font-size: 25px;">Sydney Musselman</p>
<p class = "location">Located in Peoria, Illinois</p>

<div class = "clear-float"><div>

    <div class = "footcontainer">


<a href="https://www.instagram.com/Musselmanartistry/" target="_blank">
        <button>
            <i class="fab fa-instagram"></i>
        </button>
    </a>

    <a href="https://www.facebook.com/Musselmanartistry/" target="_blank">
        <button>
            <i class="fab fa-facebook"></i>
        </button>
    </a>

    <a href="mailto: Musselmanartistry@gmail.com">
        <button>
        <i class="fa fa-envelope" aria-hidden="true"></i>
        </button>
    </a>

    </div>
</footer>





</div>
    
</body>

<script src = "musselman.js"></script>

</html>