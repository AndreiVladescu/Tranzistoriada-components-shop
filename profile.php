<?php
if (!isset($_SESSION))
    session_start();
if (empty($_SESSION['ID'])) {
    header("location:index.php");
    exit();
} else {
    include_once $_SERVER['DOCUMENT_ROOT'] . '/initconfig.php';
    include_once 'php-login-form/user-dbop.php';
    $objUser = new User();
    $user_resource = $objUser->select_by_id($_SESSION['ID']);
    $user_data = mysqli_fetch_assoc($user_resource);
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
    <link rel="icon" href="../../favicon.ico">

    <title>Php Login Form</title>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://fortawesome.github.io/Font-Awesome/assets/font-awesome/css/font-awesome.css">
    <!--<link href='https://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>-->
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
                        <h1 class="at_font col-md-8">User Profile</h1>
                    </div>
                    <hr>
                    <table class="table table-striped">
                        <tr>
                            <th>
                                User Email
                            </th>
                            <td>
                                <?= $user_data['user_name']; ?>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                Name
                            </th>
                            <td>
                                <?= $user_data['name']; ?>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                Address
                            </th>
                            <td>
                                <?= $user_data['address']; ?>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                Contact No
                            </th>
                            <td>
                                <?= $user_data['contact_no']; ?>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                About User
                            </th>
                            <td>
                                <?= $user_data['about']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a href="update-profile.php" class="btn btn-success">Update</a>
                            </td>
                            <td>
                                <a href="delete_acc.php" class="btn btn-danger">Delete Account</a>
                                <a href="logout.php" class="btn btn-primary">Logout</a>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>

        </div>

    </div> <!-- /container -->
</body>

</html>