<?php
if ($_SERVER['HTTP_HOST'] == 'localhost/directory_name')
    set_include_path("C:\apache24\htdocs\directory_name\\"); //if you are using xampp then it should be C:\xampp\htdocs\directory_name
else
    set_include_path('/your server path');//if you are working locally it does not need to be set
