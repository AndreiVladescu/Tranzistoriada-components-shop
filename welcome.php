<html>
<body>

Welcome <?php echo $_POST["name"]; ?><br>
Your email address is: <?php echo $_POST["email"]; ?>
<?php     
    for ($i=0; $i< 10; $i++)
        echo "$i <br>";
?>
</body>
</html> 