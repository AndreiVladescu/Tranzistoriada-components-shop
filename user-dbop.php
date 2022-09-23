<?php

if (!isset($_SESSION))
    session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/initconfig.php';
include_once 'dbconnect.php';

class User
{
    var $dbObj;

    public function __construct()
    {
        $this->dbObj = new db();
    }

    public function insert($first_name, $second_name, $user_mail, $password, $city, $address, $phone)
    {
        $password = hash('sha256', $password);
        $sql = " INSERT INTO users"
            . " (First_name,Last_name,Role,Mail,Password,Phone_number,City, Address)"
            . " VALUES('$first_name','$second_name',0,'$user_mail','$password','$phone','$city','$address')";
        return $this->dbObj->ExecuteQuery($sql, 2);
    }

    /*public function update($first_name, $second_name, $user_mail, $password, $city, $address, $phone, $old_password, $user_id)
    {
        if (empty($password))
            $password = $old_password;
        else
            $password = hash('sha256', $password);
        $sql = " UPDATE"
            . " user "
            . " SET user_name = '$user_name',password = '$password',name = '$name',address = '$address',"
            . " contact_no = '$contact_no',about = '$about'"
            . " WHERE user_id = '$user_id'";
        return $this->dbObj->ExecuteQuery($sql, 3);
    }*/

    public function select_by_id($user_id)
    {
        $sql = " SELECT"
            . " First_name,Last_name,Role,Mail,Password,Phone_number,Country,City,Address"
            . " FROM users WHERE ID = '$user_id'";
        return $this->dbObj->ExecuteQuery($sql, 1);
    }

    public function delete_account($user_id)
    {
        $sql = " DELETE FROM users WHERE ID = '$user_id'";
        return $this->dbObj->ExecuteQuery($sql, 3);
    }

    public function login($mail, $password)
    {
        $password = hash('sha256', $password);
        $sql = " SELECT"
            . " ID,First_name, Last_name, Role, Phone_number, Country, City, Address"
            . " FROM users WHERE"
            . " Mail = '$mail' AND Password = '$password'";
        $data = $this->dbObj->ExecuteQuery($sql, 1);
        if (mysqli_num_rows($data) > 0) {
            $fetch_data = mysqli_fetch_assoc($data);
            //////
            $_SESSION['ID'] = $fetch_data['ID'];
            $_SESSION['first_name'] = $fetch_data['First_name'];
            $_SESSION['second_name'] = $fetch_data['Last_name'];
            $_SESSION['role'] = $fetch_data['Role'];
            $_SESSION['phone'] = $fetch_data['Phone_number'];
            $_SESSION['country'] = $fetch_data['Country'];
            $_SESSION['city'] = $fetch_data['City'];
            $_SESSION['address'] = $fetch_data['Address'];
            header("location:profile.php");
        } else {
            echo "<script>window.location='index.php';alert('Invalid User Name or Password !!')</script>";
        }
    }
}
