<?php
require 'connection.php';
$conn=Connect();

if(isset($_POST['delete'])){
    
    // print_r($_POST['chk']);
    foreach($_POST['chk'] as $key=>$values)
    {
        $sql="UPDATE FOOD SET `options`='DISABLE' WHERE F_ID='$values'";
        $res=$conn->query($sql);

        if(!$res){
           echo "<script>alert('Some error occured pls try again.')</script>";
        }
        else{
            echo "<script>alert('Food item have been disabled from main menu item.')</script>";
        }
    }
    $conn->close();
    
}
    echo "<script>window.location='deletefooditem.php'</script>";
?>