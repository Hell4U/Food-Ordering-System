<?php
    include('filter.php');
    include('connection.php');
    $conn=Connect();

    $foodname=$conn->real_escape_string(filt($_POST['food-name']));
    $foodprice=(int)$conn->real_escape_string(filt($_POST['food-price']));
    $fooddescription=$conn->real_escape_string(filt($_POST['food-description']));
    $imagepath=$conn->real_escape_string(filt($_POST['food-image']));
    
    if(isset($_POST['add-btn'])){
        // echo "$foodname $foodprice $fooddescription $imagepath";
        $sql="INSERT INTO FOOD(name,price,description,image_path) VALUES('$foodname','$foodprice','$fooddescription','$imagepath')";

        $res=$conn->query($sql);

        if(!$res){
            echo "<script>alert('A problem occurred pls try again some time later..')</script>";
        }
        else
            echo "<script>alert('Food data entered successfully')</script>";
        $conn->close();
        echo "<script>window.location='addfooditem.php'</script>";
    }
?>