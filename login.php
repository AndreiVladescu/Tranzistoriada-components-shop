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
        <h2 style="text-align:center">Logare</h2>
        <br><br>
        <div class="container" style="text-align:center">
            <form method="post" action="' . htmlspecialchars($_SERVER["PHP_SELF"]) . '">
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" placeholder="Email" name="mail" style="width:8cm;margin:auto" required autofocus>
                </div>
                <div class="form-group">
                    <label for="pwd">Parolă:</label>
                    <input type="password" class="form-control" id="pwd" placeholder="Parolă" name="password" style="width:8cm;margin:auto">
                </div>
                <br><br>
                <button type="submit" class="btn btn-lg btn-primary btn-block" style="width:5cm" name="login">Loghează-mă</button>
            </form>
        </div>
    ';

        if (!empty($_POST)) {
            //echo $_POST["mail"] . ' ' . $_POST["password"]; // . ' ' . $conn;
            //var_dump($conn);
            $sql = "select * from Users where Mail ='" . $_POST["mail"] . "'";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) == 0) {
                echo "<br>Contul nu există sau parola este greșită. Contactează-ne pe numărul de telefon pentru a solicita o altă parolă.";
                return;
            } else {
                $password = $_POST["password"]; // Parola introdusa

                $row = mysqli_fetch_assoc($result);
                $hash = $row["Password"];
                if (!password_verify($password, $hash)) {
                    echo "<br>Contul nu există sau parola este greșită. Contactează-ne pe numărul de telefon pentru a solicita o altă parolă.";
                    return;
                }

                $password = "";
                $hash = "";

                $_SESSION["id"] = $row["ID"];
                $_SESSION["mail"] = $row["Mail"];
                $_SESSION["first_name"] = $row["First_name"];
                $_SESSION["last_name"] = $row["Last_name"];
                $_SESSION["role"] = $row["Role"];
                $_SESSION["phone_number"] = $row["Phone_number"];
                $_SESSION["country"] = $row["Country"];
                $_SESSION["city"] = $row["City"];
                $_SESSION["address"] = $row["Address"];
            }
        }
    } else {
        echo "<br><h3>Bine ai venit, " . $_SESSION["first_name"] . ' ' . $_SESSION["last_name"] . '</h3>';
    }

    if (!empty($_SESSION["first_name"])) {
        echo '<form action="logout.php" method="post">
            <input class="btn btn-lg btn-secondary" type="submit" value="Deloghează-te">
            </form>';
    }
    ?>

</body>

</Html>