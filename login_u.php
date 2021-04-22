<?php
    include('filter.php');
    session_start();
    $err="Enter the username in alphanumeric and .- format";

    if(isset($_POST['user-btn'])){

        $username=filt($_POST['username']);
        $password=filt($_POST['userpass']);

        // echo "$username $password";

        require 'connection.php';
        $conn=Connect();

        $sql="SELECT username,password FROM CUSTOMER WHERE username=? AND password=?";

        $stmt=$conn->prepare($sql);
        $stmt->bind_param("ss",$username,$password);
        $stmt->execute();
        $stmt->bind_result($username,$password);
        $stmt->store_result();

        if($stmt->fetch()){
            $_SESSION['login_user']=$username;
            header("Location:foodpage.php");
        }
        else{
            $err="Username or Password invalid";
        }
    }

?>