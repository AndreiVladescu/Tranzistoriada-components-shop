<?php
session_start();
require 'dbconnect.php'

?>
<!DOCTYPE html>
<Html lang="ro">

<Head>
    <meta charset="UTF-8">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="styles/tranzistoriada.css">
    <link rel="icon" href="images/tranzistoriada.jpg" type="image/x-icon">

    <title>
        Tranzistoriada
    </title>
</Head>
<header>
    <div style="background-color: rgb(63, 63, 63);" class="row">
        <div class="col-sm-4">
            <a href="index.php">
                <img height="50" width="50" src="images/tranzistoriada.jpg" class="img-rounded" alt="Tranzistoriada">
            </a>
        </div>
        <div style="color: rgb(255, 255, 255)" class="col-sm-4">
            <h6>Date de contact (România): +40785 276 375</h6>
        </div>
        <div class="col-sm-4">
            <button type="button" class="btn"><a href="login.php" style="color: rgb(255, 255, 255)"> Logare
                </a></button>
            <button type="button" class="btn"><a href="register.php" style="color: rgb(255, 255, 255)"> Înregistrare
                </a></button>
            <button type="button" class="btn"><a href="client-panel.php" style="color: rgb(255, 255, 255)"> Detalii
                    Client </a></button>
            <?php if ($_SESSION["role"] == 1 || $_SESSION["role"] == 2)
                echo '<button type="button" class="btn"><a href="admin.php" style="color: rgb(255, 255, 255)"> Pagină Admin </a></button>';
            else
                echo '<button type="button" class="btn"><a href="cart.php" style="color: rgb(255, 255, 255)"> Coș client </a></button>';
            ?>
        </div>
    </div>
</header>

<body>
    <br><br>
    <h2 style="text-align:center">Detalii Client</h2>
    <br><br>

    <?php
    if (!empty($_SESSION["first_name"])) {
        if ($_SESSION["role"] == 0) {
            echo "<br><div class=\"container-fluid\" ><h2 align=\"center\">Bine ai venit, " . $_SESSION["first_name"] . ' ' . $_SESSION["last_name"] . '</h2>';
            echo "<br><br><h3 align=\"center\"><br><p>Email: " . $_SESSION["mail"] . '</p>';
            echo "<p>Număr de telefon: " . $_SESSION["phone_number"] . '</p>';
            echo "<p>Adresă: " . $_SESSION["address"] . '</p>';
            echo "<p>Oraș: " . $_SESSION["city"] . '</p>';
            echo "<p>Țară: " . $_SESSION["country"] . '</p></h3></div>';
        } else if ($_SESSION["role"] == 1) {
            echo "<h3>Bine ai venit, admine.<h3>";

            echo "<br><div class=\"container-fluid\" ><h2 align=\"center\">Bine ai venit, " . $_SESSION["first_name"] . ' ' . $_SESSION["last_name"] . '</h2>';
            echo "<br><br><h3 align=\"center\"><br><p>Email: " . $_SESSION["mail"] . '</p>';
            echo "<p>Număr de telefon: " . $_SESSION["phone_number"] . '</p>';
        } else if ($_SESSION["role"] == 2) {
            echo "<h3>Bine ai venit, super-usere.<h3>";

            echo "<br><div class=\"container-fluid\" ><h2 align=\"center\">Bine ai venit, " . $_SESSION["first_name"] . ' ' . $_SESSION["last_name"] . '</h2>';
            echo "<br><br><h3 align=\"center\"><br><p>Email: " . $_SESSION["mail"] . '</p>';
            echo "<p>Număr de telefon: " . $_SESSION["phone_number"] . '</p>';
        }
    } else {
        echo "<br><h3>Bine ai venit, te rugăm să te loghezi sau înregistrezi pentru a vedea panoul de client.</h3>";
    }
    ?>
    <br>
</body>

</Html>