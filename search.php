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
    <link rel="stylesheet" href="css/bootstrap-grid.css">
    <link rel="stylesheet" href="styles/tranzistoriada.css">
    <link rel="icon" href="images/tranzistoriada.jpg" type="image/x-icon">
    <title>
        Tranzistoriada
    </title>
</Head>

<Body>
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
    <main>
        <div class="jumbotron text-center">
            <h1>Tranzistoriada</h1>
            <p>Magazinul pentru electronistul din tine!</p>
        </div>
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
                <div class="col-sm-10">
                    <form method="GET" action="search.php">
                        <div class="input-group rounded">
                            <input type="search" class="form-control rounded" placeholder="Căutare" aria-label="Căutare" aria-describedby="search-addon" name="searchbar" />

                            <span class="input-group-text border-0" id="search-addon">
                                <i class="fas fa-search"></i>
                            </span>
                            <input class="btn btn-secondary" type="submit" value="Caută">
                        </div>
                    </form>
                    <br><br>
                    <?php
                    if (!empty($_GET)) {
                        $total_rows = 0;
                        if (isset($_GET['searchbar']) && !empty($_GET['searchbar'])) {

                            // For transistors
                            $search = $_GET['searchbar'];
                            $sql = "select * from transistors 
                            where Case_type like '%$search%'
                            or Name like '%$search%'
                            or Polarity like '%$search%'
                            or Power like '%$search%'
                            or Producer like '%$search%'
                            or Type like '%$search%'";

                            $result = mysqli_query($conn, $sql);

                            $total_rows += mysqli_num_rows($result);

                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<div class=\"row\"><div class=\"product-item-container\"><table class=\"table\"><tr>";
                                    $tmp_image = "images/componente/tranzistori/";
                                    switch ($row["Case_type"]) {
                                        case "I2PAK":
                                            $tmp_image = $tmp_image . "i2pak.png";
                                            break;
                                        case "IPAK":
                                            $tmp_image = $tmp_image . "ipak.png";
                                            break;
                                        case "SOT89":
                                            $tmp_image = $tmp_image . "sot89.png";
                                            break;
                                        case "TO39":
                                            $tmp_image = $tmp_image . "to39.png";
                                            break;
                                        case "TSOP6":
                                            $tmp_image = $tmp_image . "tsop6.png";
                                            break;
                                        case "TSOP8":
                                            $tmp_image = $tmp_image . "tsop8.png";
                                            break;
                                        case "TO220":
                                            $tmp_image = $tmp_image . "to220.png";
                                            break;
                                        default:
                                            $tmp_image = $tmp_image . "i2pak.png";
                                            break;
                                    }
                                    echo "<th><a><img src=$tmp_image width=\"120\"></a></th>";
                                    echo "<th><table><tr><h3 align=\"left\">" . $row["Name"] . "</h3></tr>";
                                    echo "<tr><h5 align=\"left\">Tranzistor: " . $row["Type"] . "; " . $row["Polarity"] . "; " . $row["Power"] . " W; " . $row["Case_type"] . "</h5></tr>";
                                    echo "<tr><h5 align=\"left\">Producator: " . $row["Producer"] . "</h5></tr>";
                                    if ($row["Quantity"] == "0") {
                                        echo "<tr><h5 align=\"left\">Indisponibil</h5></tr></table></th>";
                                    } else {
                                        echo "<tr><h5 align=\"left\">Disponibil</h5></tr></table></th>";
                                    }
                                    echo "<th><h5>Cantitate disponibila:<br>" . $row["Quantity"] . "</h5></th>";
                                    echo "<th><h5>Pret:<br><b>[RON/buc]:</b><br>1+: " . $row["Price"] . "</h5>";
                                    echo "<h5>100+: " . (float) ($row["Price"] * 0.75) . "</h5>";
                                    echo "<h5>1000+: " . (float) ($row["Price"] * 0.55) . "</h5></th>";
                                    echo "<th><h5>Multiplu: 1<br><br><input type=\"text\" id=\"transistor_" . $row["ID"] . "\" name = \"cantitate\" style=\"width: 3cm;\" value=\"1\"></h5></th>";

                                    if ($row["Quantity"] == "0") {
                                        echo "<th><button type=\"button\" class=\"btn btn-danger\">Află stoc</button></th>";
                                    } else {
                                        echo "<th><button type=\"button\" class=\"btn btn-success\">Comandă acum</button></th>";
                                    }

                                    echo "</tr></table></div></div>";
                                }
                            }

                            // Next in line: resistors


                            if ($total_rows == 0) {
                                echo "Nu s-a găsit nicio componentă care să conțină cuvântul '" . $search . "'";
                            }
                        } else {
                            echo "<h3>Componentele așteaptă să le folosești în noul tău proiect! Caută acum!<h3>";
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </main>
</Body>

</Html>