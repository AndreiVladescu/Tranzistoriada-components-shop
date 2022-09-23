<?php
session_start();
require 'dbconnect.php';
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
    <br><br>
    <h2 style="text-align:center">Sumarul coșului de cumpărături</h2>
    <br><br>
    <?php
    if (empty($_SESSION["first_name"])) {
        echo "<h3>Vă rugăm să vă logați mai întâi.<h3>";
        return;
    }
    ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-2">
                <h4>Produse</h4>
                <br>
                <ul>
                    <li class="product-button-menu btn btn-secondary">
                        <a class="product-button-menu-text" href="tranzistori.php">
                            <span>
                                Tranzistori
                            </span>
                        </a>
                    </li>
                    <li class="product-button-menu btn btn-secondary">
                        <a class="product-button-menu-text" href="inductori.php">
                            <span>
                                Inductori
                            </span>
                        </a>
                    </li>
                    <li class="product-button-menu btn btn-secondary">
                        <a class="product-button-menu-text" href="rezistori.php">
                            <span>
                                Rezistori
                            </span>
                        </a>
                    </li>
                    <li class="product-button-menu btn btn-secondary">
                        <a class="product-button-menu-text" href="condensatori.php">
                            <span>
                                Condensatori
                            </span>
                        </a>
                    </li>
                    <li class="product-button-menu btn btn-secondary">
                        <a class="product-button-menu-text" href="diode.php">
                            <span>
                                Diode
                            </span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-sm-8">
                <br><br>
                <?php
                if (!empty($_POST)) {
                    echo '<script type ="text/JavaScript"> alert("Comanda a fost plasată! Veți fi contactat de un operator pentru a confirma în cel mai scurt timp.") </script>';
                    $sql = "delete from cart_item where ID_client = " . $_SESSION["id"];
                    mysqli_query($conn, $sql);
                }
                ?>
                <table class="table table-light js-serial">
                    <thead>
                        <tr>
                            <th scope="col">Număr Produs</th>
                            <th scope="col">Produs</th>
                            <th scope="col">Cantitate</th>
                            <th scope="col">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        //echo $_SESSION["id"];
                        $sql = "select * from cart_item where ID_client = " . $_SESSION["id"];
                        //echo $sql;
                        $result = mysqli_query($conn, $sql);
                        $total_price = 15;
                        $i = 1;
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>";
                                echo "<td>$i</td>";
                                $i++;
                                echo '<td>' . $row["Product_name"] . '</td>';
                                echo '<td>' . $row["Quantity"] . ' Buc</td>';
                                $price = $row["Price"];
                                if ($row["Quantity"] >= 1000)
                                    $price = $price * 0.55;
                                else if ($row["Quantity"] >= 100)
                                    $price = $price * 0.75;
                                $price = $price * $row["Quantity"];
                                echo '<td>' . $price . ' RON</td>';
                                echo "</tr>";
                                $total_price += $price;
                            }
                        }
                        ?>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>Cost livrare</td>
                            <td>15 RON</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><?php echo $total_price . " RON fără TVA"  ?></td>
                        </tr>
                    </tbody>
                </table>
                <div class="row">
                    <div class=" col-sm-4">
                        <h3>Adresa de livrare</h3><br>
                        <?php echo $_SESSION['first_name'] . " " . $_SESSION['last_name'] . "<br>"; ?>
                        <?php echo $_SESSION['address'] . "<br>"; ?>
                        <?php echo $_SESSION['city'] . "<br>"; ?>
                        <?php echo $_SESSION['country'] . "<br>"; ?>
                        <?php echo $_SESSION['phone_number'] . "<br>"; ?>
                    </div>
                    <div class=" col-sm-4">
                        <h3>Adresa de facturare</h3><br>
                        <?php echo $_SESSION['first_name'] . " " . $_SESSION['last_name'] . "<br>"; ?>
                        <?php echo $_SESSION['address'] . "<br>"; ?>
                        <?php echo $_SESSION['city'] . "<br>"; ?>
                        <?php echo $_SESSION['country'] . "<br>"; ?>
                        <?php echo $_SESSION['phone_number'] . "<br>"; ?>
                    </div>
                </div>
                <form method="POST" action="">
                    <div style="text-align:right">
                        <button class="btn btn-lg btn-success btn-block" type="submit" name="login" style="width:3cm">Comandă</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</Html>