<?php session_start();
?>

<!DOCTYPE html>
<Html lang="en">


<Head>
    <meta charset="UTF-8">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>Metin2 Marketplace chat</title>
</Head>
<?php

$conn = pg_connect("host=20.205.115.226 dbname=apache user=apache password=apache port=5432");

$result = pg_query($conn, "SELECT CURRENT_TIMESTAMP");
$row = pg_fetch_array($result);

$_SESSION["timestamp"] = $row[0];

echo $_SESSION["timestamp"];
pg_close($conn);
?>

<body>

    <div class="jumbotron">
        <h3 class="display-4">
            Welcome to the Metin2 Marketplace global chat!
        </h3>
        <form method="post" action="chat.php">
            <div class="form-group">
                <label for="user">Username:</label>
                <input type="user" class="form-control" id="user" placeholder="Username" name="user" style="width:8cm" required autofocus>
            </div>
            <br>
            <button type="submit" class="btn btn-lg btn-primary btn-block" name="login">Login</button>

        </form>
        <br><br>
        <form method="post" action="logout_chat.php">
            <button type="submit" class="btn btn-lg btn-primary btn-block" name="logout">Logout</button>
        </form>
    </div>
</body>

</Html>

<?php
if (!empty($_POST)) {
    //echo "HERE";
    //session_destroy();
}

?>