<?php
session_start();
require 'dbconnect.php'
?>

<?php
/*
echo 'Argon2id hash: ' . password_hash('daniel_mocanu', PASSWORD_ARGON2ID);
echo password_verify() */
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
            <?php if (!empty($_SESSION["role"])) {
                if ($_SESSION["role"] == 1 || $_SESSION["role"] == 2)
                    echo '<button type="button" class="btn"><a href="admin.php" style="color: rgb(255, 255, 255)"> Pagină Admin </a></button>';
            } else
                echo '<button type="button" class="btn"><a href="cart.php" style="color: rgb(255, 255, 255)"> Coș client </a></button>';
            ?>
        </div>
    </div>
</header>

<body>
    <?php if (empty($_SESSION["first_name"])) {
        echo '
    <br><br>
    <h2 style="text-align:center">Înregistrare</h2>
    <br><br>
    <form class="jumbotron" method="post" style="text-align: center;" action="' . htmlspecialchars($_SERVER["PHP_SELF"]) . '">
        <div class="form-group" style="width:8cm;margin:auto">
            <label for="second_name">Nume:</label>
            <input type="text" class="form-control" id="second_name" placeholder="Popescu" name="second_name">

            <label for="first_name">Prenume:</label>
            <input type="text" class="form-control" id="first_name" placeholder="Ion" name="first_name">

            <label for="email">Email:</label>
            <input type="email" class="form-control" id="mail" placeholder="popescu.ion@mail.com" name="mail">

            <label for="pwd">Parolă:</label>
            <input type="password" class="form-control" id="pwd" placeholder="************" name="password">

            <label for="city">Oraș:</label>
            <input type="text" class="form-control" id="city" placeholder="Milcoiu" name="city">

            <label for="address">Adresă casă:</label>
            <textarea id="address" class="form-control" name="address"></textarea>

            <label for="phone">Număr de telefon:</label>
            <input type="text" class="form-control" id="phone" placeholder="07xx xxx xxx" name="phone">

        </div>
        <br><br>
        <button type="submit" class="btn btn-primary" name="register">Înregistrează-mă</button>
</body>';


        if (!empty($_POST)) {
            if (!isset($_POST["mail"]) || trim($_POST["mail"]) == '') {
                echo "<br><br>Emailul nu este setat.";
            } else if (!isset($_POST["second_name"]) || trim($_POST["second_name"]) == '') {
                echo "<br><br>Numele de familie nu este setat.";
            } else if (!isset($_POST["first_name"]) || trim($_POST["first_name"]) == '') {
                echo "<br><br>Prenumele nu este setat.";
            } else if (!isset($_POST["password"]) || trim($_POST["password"]) == '') {
                echo "<br><br>Parola nu este setată.";
            } else if (!isset($_POST["city"]) || trim($_POST["city"]) == '') {
                echo "<br><br>Orașul nu este setat.";
            } else if (!isset($_POST["address"]) || trim($_POST["address"]) == '') {
                echo "<br><br>Adresa nu este setată.";
            } else if (!isset($_POST["phone"]) || trim($_POST["phone"]) == '') {
                echo "<br><br>Numărul de telefon nu este setat.";
            } else {
                $sql = "select * from Users where Mail ='" . $_POST["mail"] . "'";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    echo "<br>Contul acesta este deja înregistrat pe adresa" . $_POST["mail"] . ". Vă rugăm să încercați iarăși cu altă adresă de mail.";
                } else {
                    //echo "<br>We may consider letting you in, nigga";
                    $sql = "insert into users (First_name, Last_name, Role, Mail, Password, Phone_number, City, Address)
            values ('" . $_POST["first_name"] . "', '" .
                        $_POST["second_name"] . "', 0, '" .
                        $_POST["mail"] . "', '" .
                        password_hash($_POST["password"], PASSWORD_ARGON2ID) . "', '" .
                        $_POST["phone"] . "', '" .
                        $_POST["city"] . "', '" .
                        $_POST["address"] . "');";
                    //echo $sql;
                    mysqli_query($conn, $sql);
                    echo "<br><br>Bine ai venit pe platforma noastră!";
                }
            }
        }
    } else {
        echo "<br><h3>Bine ai venit, " . $_SESSION["first_name"] . ' ' . $_SESSION["last_name"] . '</h3>';
        if (!empty($_SESSION["first_name"])) {
            echo '<form action="logout.php" method="post">
                <input class="btn btn-lg btn-secondary" type="submit" value="Deloghează-te">
                </form>';
        }
    }
    ?>

</Html>