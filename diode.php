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

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/tranzistoriada.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
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
                <br><br>
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
                <div class="product-filter-container">
                    <h4>
                        Filtre
                    </h4>
                    <form method="post" action="">
                        <table class="table">
                            <tr>
                                <th>
                                    <div class="product-filter-item-container" style="overflow:auto; height:6cm">
                                        <h5>
                                            Producator
                                        </h5>
                                        <?php
                                        $sql = "select distinct Producer from diodes";
                                        $result = mysqli_query($conn, $sql);
                                        $counter = 0;

                                        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                            echo "<div class=\"form-check\"><input class=\"form-check-input\" type='checkbox' name='producer[]' value='" . $row['Producer'] . "' id=\"producer_" . $counter . "\"/>"
                                                . "<label class=\"form-check-label\" for=\"producer_" . $counter . "\">" . $row['Producer'] . "</label></div>";
                                            $counter++;
                                        }
                                        ?>
                                    </div>
                                </th>
                                <th>
                                    <div class="product-filter-item-container" style="overflow:auto; height:6cm">
                                        <h5>
                                            Tip Diodă
                                        </h5>
                                        <?php
                                        $sql = "select distinct Type from diodes";
                                        $result = mysqli_query($conn, $sql);
                                        $counter = 0;
                                        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                            echo "<div class=\"form-check\"><input class=\"form-check-input\" type='checkbox' name='type[]' value='" . $row['Type'] . "' id=\"type_" . $counter . "\"/>"
                                                . "<label class=\"form-check-label\" for=\"type_" . $counter . "\">" . $row['Type'] . "</label></div>";
                                            $counter++;
                                        }
                                        ?>
                                    </div>
                                </th>
                                <th>
                                    <div class="product-filter-item-container" style="overflow:auto; height:6cm">
                                        <h5>
                                            Putere
                                        </h5>
                                        <?php
                                        $sql = "select distinct Power from diodes order by Power";
                                        $result = mysqli_query($conn, $sql);
                                        $counter = 0;
                                        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                            echo "<div class=\"form-check\"><input class=\"form-check-input\" type='checkbox' name='power[]' value='" . $row['Power'] . "' id=\"power_" . $counter . "\"/>"
                                                . "<label class=\"form-check-label\" for=\"power_" . $counter . "\">" . $row['Power'] . " W</label></div>";
                                            $counter++;
                                        }
                                        ?>
                                    </div>
                                </th>
                                <th>
                                    <div class="product-filter-item-container" style="overflow:auto; height:6cm">
                                        <h5>
                                            Curent de șoc direct max.
                                        </h5>
                                        <?php
                                        $sql = "select distinct Max_current from diodes order by Max_current";
                                        $result = mysqli_query($conn, $sql);
                                        $counter = 0;
                                        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                            echo "<div class=\"form-check\"><input class=\"form-check-input\" type='checkbox' name='max_curr[]' value='" . $row['Max_current'] . "' id=\"max_curr_" . $counter . "\"/>"
                                                . "<label class=\"form-check-label\" for=\"max_curr_" . $counter . "\">" . $row['Max_current'] . " A</label></div>";
                                            $counter++;
                                        }
                                        ?>
                                    </div>
                                </th>
                            </tr>
                            <tr>
                                <th>
                                    <div class="product-filter-item-container" style="overflow:auto; height:6cm">
                                        <h5>
                                            Curent de scurgere
                                        </h5>
                                        <?php
                                        $sql = "select distinct Leakage_current from diodes order by Leakage_current";
                                        $result = mysqli_query($conn, $sql);
                                        $counter = 0;
                                        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                            echo "<div class=\"form-check\"><input class=\"form-check-input\" type='checkbox' name='leakage_curr[]' value='" . $row['Leakage_current'] . "' id=\"leakage_curr_" . $counter . "\"/>"
                                                . "<label class=\"form-check-label\" for=\"leakage_curr_" . $counter . "\">" . $row['Leakage_current'] . " nA</label></div>";
                                            $counter++;
                                        }
                                        ?>
                                    </div>
                                </th>
                                <th>
                                    <div class="product-filter-item-container" style="overflow:auto; height:6cm">
                                        <h5>
                                            Tensiune inversă max.
                                        </h5>
                                        <?php
                                        $sql = "select distinct Max_reverse_voltage from diodes order by Max_reverse_voltage";
                                        $result = mysqli_query($conn, $sql);
                                        $counter = 0;
                                        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                            echo "<div class=\"form-check\"><input class=\"form-check-input\" type='checkbox' name='voltage[]' value='" . $row['Max_reverse_voltage'] . "' id=\"voltage_" . $counter . "\"/>"
                                                . "<label class=\"form-check-label\" for=\"voltage_" . $counter . "\">" . $row['Max_reverse_voltage'] . " V</label></div>";
                                            $counter++;
                                        }
                                        ?>
                                    </div>
                                </th>
                            </tr>
                        </table>
                        <input class="btn btn-secondary dropdown-toggle" type="submit" value="Aplică Filtre" name="filter">
                        <input class="btn btn-secondary dropdown-toggle" type="submit" value="Resetare Filtre" name="reset_filters" style="float: right;">
                    </form>
                </div>
                </form>
            </div>

            <div class="container">
                <div class="jumbotron">
                    <?php
                    $sql = "select * from diodes";

                    $filtre = array(array(""), array(""), array(""), array(""), array(""));
                    if (isset($_POST['filter'])) {

                        if (!empty($_POST['producer'])) {
                            foreach ($_POST['producer'] as $value) {
                                array_push($filtre[0], "Producer = '" . $value . "'");
                            }
                        }
                        if (!empty($_POST['type'])) {
                            foreach ($_POST['type'] as $value) {
                                array_push($filtre[1], "Type = '" . $value . "'");
                            }
                        }
                        if (!empty($_POST['power'])) {
                            foreach ($_POST['power'] as $value) {
                                array_push($filtre[2], "Power = " . $value);
                            }
                        }
                        if (!empty($_POST['max_curr'])) {
                            foreach ($_POST['max_curr'] as $value) {
                                array_push($filtre[3], "Max_current = " . $value);
                            }
                        }
                        if (!empty($_POST['leakage_curr'])) {
                            foreach ($_POST['leakage_curr'] as $value) {
                                array_push($filtre[4], "Leakage_current = " . $value);
                            }
                        }
                        if (!empty($_POST['voltage'])) {
                            foreach ($_POST['voltage'] as $value) {
                                array_push($filtre[5], "Max_reverse_voltage = " . $value);
                            }
                        }
                    }
                    $prev_count = count($filtre[0]) + count($filtre[1]) + count($filtre[2]) + count($filtre[3]) + count($filtre[4]);

                    if ($prev_count > 5) {
                        $sql = $sql . " where ";
                        for ($i = 0; $i < count($filtre); $i++) {
                            if ($i != count($filtre) - 1) {
                                $sql = $sql . " and ";
                            }

                            for ($j = 0; $j < count($filtre[$i]); $j++) {
                                if ($j > 1) {
                                    $sql = $sql . " or ";
                                }
                                $sql =  $sql . $filtre[$i][$j] . ' ';
                            }
                        }

                        $aux_sql = "select ";
                        $token = strtok($sql, " ");
                        $prev_token;
                        while ($token !== false) {
                            $prev_token = $token;
                            $token = strtok(" ");
                            if (!($token == "and" && ($prev_token == "and" || $prev_token == "where"))) {
                                $aux_sql = $aux_sql . " " . $token;
                            }
                        }
                        $sql = $aux_sql;
                        $pos = strrpos($sql, "and");
                        if ($pos > strlen($sql) - 5) {
                            $sql[$pos] = " ";
                            $sql[$pos + 1] = " ";
                            $sql[$pos + 2] = " ";
                        }
                    }

                    $result = mysqli_query($conn, $sql);
                    $num_rows = mysqli_num_rows($result);
                    echo "<h2 style=\"color: rgb(157, 11, 11);\">Toate produsele gasite: " . $num_rows . "</h2>";
                    ?>
                </div>
            </div>
            <div class="container">
                <br>
                <br>
                <br>
            </div>
            <?php

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<div class=\"row\"><div class=\"product-item-container\"><table class=\"table\"><tr>";
                    $tmp_image = "images/componente/diode/";
                    switch ($row["Type"]) {
                        case "comutatie":
                            $tmp_image = $tmp_image . "comutatie.png";
                            break;
                        case "redresoare":
                            $tmp_image = $tmp_image . "redresoare.png";
                            break;
                        case "Schottky":
                            $tmp_image = $tmp_image . "Schottky.png";
                            break;
                        case "Zener":
                            $tmp_image = $tmp_image . "Zener.png";
                            break;
                        default:
                            $tmp_image = $tmp_image . "redresoare.png";
                            break;
                    }
                    echo "<th><a><img src=$tmp_image width=\"120\"></a></th>";
                    echo "<th><table><tr><h3 align=\"left\">" . $row["Name"] . "</h3></tr>";
                    echo "<tr><h5 align=\"left\">Tranzistor: " . $row["Type"] . "; " . $row["Power"] . " W; "  . $row["Leakage_current"] . " nA; "  . $row["Max_reverse_voltage"] . " V; " . $row["Max_current"] . " A</h5></tr>";
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
                    echo "<th><h5>Multiplu: 1<br><br><form action=\"\" method=\"post\"><input type=\"text\" id=\"transistor_" . $row["ID"] .
                        "\" name = \"cantitate\" style=\"width: 3cm;\" value=\"1\"><input type=\"hidden\" name=ID value=" . $row["ID"] . "></h5></th>";

                    if ($row["Quantity"] == "0") {
                        echo "<th><input type=\"submit\" class=\"btn btn-danger\" value=\"Află stoc\"x></th>";
                    } else {
                        echo "<th><input type=\"submit\" class=\"btn btn-success\" value=\"Comandă acum\"></th>";
                    }
                    echo "</form>";
                    echo "</tr></table></div></div>";
                }
            }
            ?>


            <?php
            if (!empty($_SESSION["mail"])) {
                if (!empty($_POST["ID"]) && $_POST["cantitate"] > 0) {
                    $sql = "select * from diodes where id = " . $_POST["ID"];

                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_assoc($result);

                    $sql = "select Quantity from cart_item where ID_diode = " . $row["ID"] . " and ID_client = " . $_SESSION["id"];
                    $diode_id = $row["ID"];
                    $result = mysqli_query($conn, $sql);

                    $row = mysqli_fetch_assoc($result);
                    if (mysqli_num_rows($result) > 0) {

                        $quantity = $row["Quantity"] + $_POST["cantitate"];

                        $sql = "delete from cart_item where ID_diode = " . $diode_id . " and ID_client = " . $_SESSION["id"];
                        //echo $sql;
                        mysqli_query($conn, $sql);

                        $sql = "select * from diodes where id = " . $_POST["ID"];
                        $result = mysqli_query($conn, $sql);

                        $row = mysqli_fetch_assoc($result);
                        $sql = "insert into cart_item (ID_client, ID_diode, Product_name, Price, Quantity) values ("
                            . $_SESSION["id"] . ', '
                            . $row["ID"] . ', \''
                            . $row["Name"] . '\', '
                            . $row["Price"] . ', '
                            .  $quantity
                            . ");";
                        //echo $sql;
                        mysqli_query($conn, $sql);
                    } else {
                        $sql = "select * from diodes where id = " . $_POST["ID"];

                        $result = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_assoc($result);

                        $sql = "insert into cart_item (ID_client, ID_diode, Product_name, Price, Quantity) values ("
                            . $_SESSION["id"] . ', '
                            . $row["ID"] . ', \''
                            . $row["Name"] . '\', '
                            . $row["Price"] . ', '
                            . $_POST["cantitate"]
                            . ");";
                        mysqli_query($conn, $sql);
                    }
                }
            } else {
                echo '<script type ="text/JavaScript"> alert("Prima oară trebuie să vă logați!") </script>';
            }
            ?>
        </div>

</body>

</Html>