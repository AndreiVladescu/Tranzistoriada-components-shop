<?php
session_start();
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
                    <h4>Recomandări</h4>
                    <br><br>

                    <div class="row">
                        <div class="col-sm-3">
                            <div class="product-recommendation-container">
                                <a>
                                    <div>
                                        <h5>
                                            1N4002
                                        </h5>
                                        <h6 class="product-recommendation-container-text">
                                            Vishay
                                        </h6>
                                    </div>
                                    <div>
                                        <a href="diode.php">
                                            <img src="images/componente/diode/d1.png" width="100">
                                        </a>
                                    </div>
                                    <h6 class="product-recommendation-container-description-text">
                                        Dioda 1N4002, 0.6V Cadere Tensiune, Dioda Silicon
                                    </h6>
                                </a>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="product-recommendation-container">
                                <a>
                                    <div>
                                        <h5>
                                            1/4W 2k2R
                                        </h5>
                                        <h6 class="product-recommendation-container-text">
                                            Meanwell
                                        </h6>
                                    </div>
                                    <div>
                                        <a href="rezistori.php">
                                            <img src="images/componente/rezistori/r1.png" width="100">
                                        </a>
                                    </div>
                                    <h6 class="product-recommendation-container-description-text">
                                        Rezistor Carbon, 2200 Ohmi, THT, Color-codat
                                    </h6>
                                </a>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="product-recommendation-container">
                                <a>
                                    <div>
                                        <h5>
                                            MOSFET IRFZ44N
                                        </h5>
                                        <h6 class="product-recommendation-container-text">
                                            Bourns
                                        </h6>

                                    </div>
                                    <div>
                                        <a href="tranzistori.php">
                                            <img src="images/componente/tranzistori/t1.png" width="100">
                                        </a>
                                    </div>
                                    <h6 class="product-recommendation-container-description-text">
                                        MOSFET N-Channel, 1.4V Low Dropout, TO-92
                                    </h6>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="product-recommendation-container">
                                <a>
                                    <div>
                                        <h5>
                                            AHP50W-10KJ
                                        </h5>
                                        <h6 class="product-recommendation-container-text">
                                            SR Passives
                                        </h6>
                                    </div>
                                    <div>
                                        <a href="rezistori.php">
                                            <img src="images/componente/rezistori/r2.png" width="100">
                                        </a>
                                    </div>
                                    <h6 class="product-recommendation-container-description-text">
                                        Rezistor Bobinat, 10K Ohmi, THT, Cu radiator
                                    </h6>
                                </a>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="product-recommendation-container">
                                <a>
                                    <div>
                                        <h5>
                                            1N4004
                                        </h5>
                                        <h6 class="product-recommendation-container-text">
                                            Vishay
                                        </h6>
                                    </div>
                                    <div>
                                        <a href="diode.php">
                                            <img src="images/componente/diode/d1.png" width="100">
                                        </a>
                                    </div>
                                    <h6 class="product-recommendation-container-description-text">
                                        Dioda 1N4004, 0.65V Cadere Tensiune, Dioda Silicon
                                    </h6>
                                </a>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="product-recommendation-container">
                                <a>
                                    <div>
                                        <h5>
                                            IGBT AIHD06N60RFATMA1
                                        </h5>
                                        <h6 class="product-recommendation-container-text">
                                            Infineon Technologies
                                        </h6>

                                    </div>
                                    <div>
                                        <a href="tranzistori.php">
                                            <img src="images/componente/tranzistori/t2.png" width="100">
                                        </a>
                                    </div>
                                    <h6 class="product-recommendation-container-description-text">
                                        IGBT, 600V, 100W, DPAK
                                    </h6>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="product-recommendation-container">
                                <a>
                                    <div>
                                        <h5>
                                            8107-RC
                                        </h5>
                                        <h6 class="product-recommendation-container-text">
                                            Bourns
                                        </h6>
                                    </div>
                                    <div>
                                        <a href="rezistori.php">
                                            <img src="images/componente/inductori/i2.png" width="100">
                                        </a>
                                    </div>
                                    <h6 class="product-recommendation-container-description-text">
                                        Inductor fir, THT, 2mH, 6.6A, 22mΩ, Raster 20,32x10,16mm
                                    </h6>
                                </a>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="product-recommendation-container">
                                <a>
                                    <div>
                                        <h5>
                                            1N5818-ST
                                        </h5>
                                        <h6 class="product-recommendation-container-text">
                                            STMicroelectronics
                                        </h6>
                                    </div>
                                    <div>
                                        <a href="diode.php">
                                            <img src="images/componente/diode/d2.png" width="100">
                                        </a>
                                    </div>
                                    <h6 class="product-recommendation-container-description-text">
                                        Diodă redresoare Schottky, THT, 30V, 1A, DO41
                                    </h6>
                                </a>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="product-recommendation-container">
                                <a>
                                    <div>
                                        <h5>
                                            MOSFET 2N6661
                                        </h5>
                                        <h6 class="product-recommendation-container-text">
                                            Microchip
                                        </h6>

                                    </div>
                                    <div>
                                        <a href="tranzistori.php">
                                            <img src="images/componente/tranzistori/t3.png" width="100">
                                        </a>
                                    </div>
                                    <h6 class="product-recommendation-container-description-text">
                                        Tranzistor N-MOSFET, unipolar, 90V, 1.5A, TO39
                                    </h6>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="product-recommendation-container">
                                <a>
                                    <div>
                                        <h5>
                                            CE-100/50PHT-Y
                                        </h5>
                                        <h6 class="product-recommendation-container-text">
                                            Aishi
                                        </h6>
                                    </div>
                                    <div>
                                        <a href="condensatori.php">
                                            <img src="images/componente/condensatori/c2.png" width="100">
                                        </a>
                                    </div>
                                    <h6 class="product-recommendation-container-description-text">
                                        Condensator electrolitic, THT, 100uF, 50VDC, Ø8x12mm, ±20%
                                    </h6>
                                </a>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="product-recommendation-container">
                                <a>
                                    <div>
                                        <h5>
                                            CW0603-22
                                        </h5>
                                        <h6 class="product-recommendation-container-text">
                                            Ferrocore
                                        </h6>
                                    </div>
                                    <div>
                                        <a href="inductori.php">
                                            <img src="images/componente/inductori/i1.png" width="100">
                                        </a>
                                    </div>
                                    <h6 class="product-recommendation-container-description-text">
                                        Bobină SMD, 0603, 180nH, 240mA, 1.25Ω; ±5%
                                    </h6>
                                </a>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="product-recommendation-container">
                                <a>
                                    <div>
                                        <h5>
                                            CC-101/100
                                        </h5>
                                        <h6 class="product-recommendation-container-text">
                                            SR Passives
                                        </h6>

                                    </div>
                                    <div>
                                        <a href="condensatori.php">
                                            <img src="images/componente/condensatori/c1.png" width="100">
                                        </a>
                                    </div>
                                    <h6 class="product-recommendation-container-description-text">
                                        Condensator ceramic, 1nF, 100V, ±20%, THT, 5mm
                                    </h6>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</Body>

</Html>