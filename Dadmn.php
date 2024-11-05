<?php 
    include 'connection/conn.php';
    if(isset($_GET['delete_username'])){
        $username=$_GET['delete_username'];

        $sql="delete from `jack` where username='$username'";
        $result=mysqli_query($conn,$sql);
        if($result){
           // echo "delete success";
         header('location:admin.php');
        }else{
            die(mysqli_error($conn));
        }
    }


?>