<?php


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '/home/u741814184/domains/musselmanartistry.com/public_html/PHPMailer.php';
require '/home/u741814184/domains/musselmanartistry.com/public_html/SMTP.php';
require '/home/u741814184/domains/musselmanartistry.com/public_html/Exception.php';

?>





<!DOCTYPE html>

<html>


<head>
    <title>Commissions ~ Musselman Artistry</title>

    <link rel="icon" href="images/favicon.ico?" type="image/x-icon">

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

    <img src = "images/Title.png" class = "title">

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


<main>

<div class = "buy-container">


<p class = "buy-prompt">Interested in buying a piece from me? Let's exchange information.<br><br> I handle my sales privately, this way as little cost burden is placed on the customer as possible. </p>


</div>

<form method = 'POST' class = 'buy-form' enctype = "multipart/form/data">

<div class = "product-placement">
<label for="piece" class = "product">I want to purchase:</label>
<select id="piece" name="piece" class = "product-options">
            <option value = "default" selected>Choose Original</option>
            <option value="apt6">APT6 Original</option>
            <option value="stickaround">STICKAROUND Original</option>
            <option value="2019">2019 Original</option>
            <option value="mac">MAC Original</option>
            <option value="posiedon">POSIEDON Original</option>
            <option value="david">DAVID Original</option>
</select><br>

</div>

    <input type = 'text' placeholder = 'First Name' name = 'firstName' class = 'firstLast'> <input type = 'text' placeholder = 'Last Name' name = 'lastName' class = 'firstLast'><br>
    <input type = 'text' placeholder = 'Email' name = 'email' class = 'contact-info' required><br>
    <input type = 'text' placeholder = 'Message' name = 'message' class = 'contact-info' id = 'customer-msg' required><br>
    <button><input type = 'submit' value = 'Send' class = 'send-btn'><a href = "thank-you-page.html"></a><button>


</form>


    <?php 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST["firstName"] . " " . $_POST["lastName"];
    $email = $_POST["email"];
    $subject = $_POST["piece"];
    $message = $_POST["message"];

    // Create a new PHPMailer instance
    $mail = new PHPMailer(true);

    try {
        // SMTP settings (replace with your email provider's configuration)
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // e.g., smtp.example.com
        $mail->SMTPAuth = true;
        $mail->Username = 'commissions.musselmanartistry@gmail.com';
        $mail->Password = 'ajexkfgukrclqdvm';
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

<p class = "location">Sydney Musselman</p>
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