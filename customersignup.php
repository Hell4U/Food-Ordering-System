<?php
    include('filter.php');

    $err="enter the fullname with alphabets only.<br>Enter the username in alphanumeric and .- format<br>use proper email<br>use only number in entering phone no. ";

    // echo "hi0";
    if(isset($_POST['sign-user-btn'])){
        // echo "Hellp";
        

        // echo "$fullname $username $userpass $usermail $useraddress $userphone";
        require 'connection.php';
        $conn=Connect();

        $fullname= $conn->real_escape_string(filt($_POST['fullname']));
        $username=$conn->real_escape_string(filt($_POST['username']));
        $userpass=$conn->real_escape_string(filt($_POST['userpass']));
        $usermail=$conn->real_escape_string(filt($_POST['usermail']));
        $useraddress=$conn->real_escape_string(filt($_POST['useraddress']));
        $userphone=$conn->real_escape_string(filt($_POST['userphone']));

        
            $sql="INSERT INTO CUSTOMER VALUES( '$fullname' , '$username' , '$usermail' , '$userpass' , '$useraddress' , '$userphone' )";
            // echo $sql;
            $res=$conn->query($sql);
            if(!$res){
                $err="Problem occured ".$conn->error;
                // die();
            }
            else{
                header("Location: regsucc.php");
            }
        $conn->close();
        // echo $sql;
    }

?>