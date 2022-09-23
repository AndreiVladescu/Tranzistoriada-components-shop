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
    <?php if (!empty($_SESSION["role"]) && $_SESSION["role"] > 0) {
        // Normal Admin
        if ($_SESSION["role"] == 1) {
            echo '<div class = "jumbotron"><form method="post" action="' . htmlspecialchars($_SERVER["PHP_SELF"]) . '">
                <div class="form-group">
                    <label for="tran_name">Nume Tranzistor:</label>
                    <input type="text" class="form-control" id="tran_name" placeholder="nume" name="tran_name" style="width:8cm">
                </div>
                <div class="form-group">
                    <label for="tran_prod">Producator Tranzistor:</label>
                    <input type="text" class="form-control" id="tran_prod" placeholder="producator" name="tran_prod" style="width:8cm">
                </div>
                <div class="form-group">
                    <label for="tran_type">Tip Tranzistor:</label>
                    <input type="text" class="form-control" id="tran_type" placeholder="tip" name="tran_type" style="width:8cm">
                </div>
                <div class="form-group">
                    <label for="tran_power">Putere Tranzistor:</label>
                    <input type="text" class="form-control" id="tran_power" placeholder="putere disipare" name="tran_power" style="width:8cm">
                </div>
                <div class="form-group">
                    <label for="tran_case">Tip Carcasa Tranzistor:</label>
                    <input type="text" class="form-control" id="tran_case" placeholder="tip carcasa" name="tran_case" style="width:8cm">
                </div>
                <div class="form-group">
                    <label for="tran_pol">Polaritate Tranzistor:</label>
                    <input type="text" class="form-control" id="tran_pol" placeholder="polaritate" name="tran_pol" style="width:8cm">
                </div>
                <div class="form-group">
                    <label for="tran_quan">Cantitate Tranzistor:</label>
                    <input type="text" class="form-control" id="tran_quan" placeholder="cantitate disponibila" name="tran_quan" style="width:8cm">
                </div>
                <div class="form-group">
                    <label for="tran_price">Pret Tranzistor:</label>
                    <input type="text" class="form-control" id="tran_price" placeholder="pret per unitate" name="tran_price" style="width:8cm">
                </div>
                
                <br><br>
                <input class="btn btn-lg btn-secondary" type="submit" value="Adaugă tranzistor">
                </form>';

            if (!empty($_POST)) {

                echo "<br><br>";
                $sql = "insert into transistors (Name, Producer, Type, Power, Case_type, Polarity, Quantity, Price) values
                    ('" . $_POST['tran_name'] . "', '" . $_POST['tran_prod'] . "', '" . $_POST['tran_type'] . "', " . $_POST['tran_power'] . ", '" .
                    $_POST['tran_case'] . "', '" . $_POST['tran_pol'] . "', " . $_POST['tran_quan'] . ", " . $_POST['tran_price'] . ")";
                //$sql = "select * from Users where Mail ='" . $_POST["mail"] . "'";
                mysqli_query($conn, $sql);
                //echo $sql;
                echo "<br>Tranzistor adaugat.";
            }
        }
        // Super-user account
        else {
            echo '<div class = "jumbotron"><form method="post" action="' . htmlspecialchars($_SERVER["PHP_SELF"]) . '">
                <div class="form-group">
                    <label for="user_first_name">Prenume utilizator:</label>
                    <input type="text" class="form-control" id="user_first_name" placeholder="Prenume utilizator" name="user_first_name" style="width:8cm">
                </div>
                <div class="form-group">
                    <label for="user_last_name">Nume utilizator:</label>
                    <input type="text" class="form-control" id="user_last_name" placeholder="Nume utilizator" name="user_last_name" style="width:8cm">
                </div>
                <div class="form-group">
                    <label for="mail">Mail utilizator:</label>
                    <input type="text" class="form-control" id="mail" placeholder="Mail utilizator" name="mail" style="width:8cm">
                </div>
                <div class="form-group">
                    <label for="role">Rol utilizator:</label>
                    <input type="text" class="form-control" id="role" placeholder="Rol utilizator: 0 user, 1 admin, 2 superuser" name="role" style="width:8cm">
                </div>
                <div class="form-group">
                    <label for="password">Parola utilizator:</label>
                    <input type="password" class="form-control" id="password" placeholder="Parola utilizator" name="password" style="width:8cm">
                </div>
                <div class="form-group">
                    <label for="phone_number">Numar de telefon:</label>
                    <input type="text" class="form-control" id="phone_number" placeholder="Numar de telefon" name="phone_number" style="width:8cm">
                </div>
                <div class="form-group">
                    <label for="address">Adresa:</label>
                    <input type="text" class="form-control" id="address" placeholder="Adresa" name="address" style="width:8cm">
                </div>
                <div class="form-group">
                    <label for="city">Oras:</label>
                    <input type="text" class="form-control" id="city" placeholder="Oras" name="city" style="width:8cm">
                </div>
                
                <br><br>
                <input class="btn btn-lg btn-secondary" type="submit" value="Adaugă utilizator">
                </form>';
        }

        if (!empty($_POST)) {
            $sql = "select * from Users where Mail ='" . $_POST["mail"] . "'";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                echo "<br>Contul acesta este deja înregistrat pe adresa" . $_POST["mail"] . ". Vă rugăm să încercați iarăși cu altă adresă de mail.";
            } else {
                $sql = "insert into users (First_name, Last_name, Role, Mail, Password, Phone_number, City, Address)
            values ('" . $_POST["user_first_name"] . "', '" .
                    $_POST["user_last_name"] . "', " .
                    $_POST["role"] . ", '" .
                    $_POST["mail"] . "', '" .
                    password_hash($_POST["password"], PASSWORD_ARGON2ID) . "', '" .
                    $_POST["phone_number"] . "', '" .
                    $_POST["city"] . "', '" .
                    $_POST["address"] . "');";
                //echo $sql;
                mysqli_query($conn, $sql);
                echo "<br>Utilizator adaugat cu succes!";
            }
        }
    } else {
        echo 'Nu puteți vedea pagina cu drepturile dumneavoastră de utilizator.';
    }
    ?>

</body>

</Html>