<?php
if (isset($_POST['login'])) {
    include_once $_SERVER['DOCUMENT_ROOT'] . '/initconfig.php';
    include_once 'user-dbop.php';
    $objUser = new User();
    $objUser->login($_POST['mail'], $_POST['password']);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Php Login Form</title>
    <!-- Bootstrap core CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://fortawesome.github.io/Font-Awesome/assets/font-awesome/css/font-awesome.css">

    <link href='https://fonts.googleapis.com/css?family=Indie+Flower' rel='stylesheet' type='text/css'>
    <style>
        .at_background {
            background: url(back2.jpg) no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }

        .at_font {
            color: navy;
            /*font-family: 'Indie Flower', cursive;*/
            font-family: 'Lobster', cursive;
        }
    </style>
</head>

<body class="at_background">
    <div style="height: 100px;">

    </div>
    <div class="container bs-docs-container ">
        <div class="row well">
            <div style="">
                <img src="https://www.alphansotech.com/wp-content/uploads/2015/12/Alphansotech.png" />
            </div>
            <div class="col-md-9 " role="main">
                <div class="bs-docs-section">
                    <div class="header clearfix">
                        <h1 class="at_font col-md-8">Php Login Form With Database</h1>
                    </div>
                    <hr>
                    <form action="index.php" method="post">
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email" placeholder="Enter email" name="mail">
                        </div>
                        <div class="form-group">
                            <label for="pwd">Password:</label>
                            <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password">
                        </div>
                        <button type="submit" class="btn btn-primary" name="login">Login</button>
                        <a href="register.php" class="btn btn-danger">Register</a>
                    </form>
                </div>
            </div>

        </div>

    </div> <!-- /container -->
</body>

</html>