<?php
    include('filter.php');
    session_start();
    $err="Enter the username in alphanumeric and .- format";

    if(isset($_POST['manager-btn'])){

        $username=filt($_POST['managername']);
        $password=filt($_POST['managerpass']);

        // echo "$username $password";

        require 'connection.php';
        $conn=Connect();

        $sql="SELECT username,password FROM MANAGER WHERE username=? AND password=?";

        $stmt=$conn->prepare($sql);
        $stmt->bind_param("ss",$username,$password);
        $stmt->execute();
        $stmt->bind_result($username,$password);
        $stmt->store_result();

        if($stmt->fetch()){
            $_SESSION['login_manager']=$username;
            header("Location:managerpage.php");
        }
        else{
            $err="Username or Password invalid";
        }
    }

?>