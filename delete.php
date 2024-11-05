<?php 
    include 'connection/config.php';
    if(isset($_GET['deletefull_name'])){
        $full_name=$_GET['deletefull_name'];

        $sql="delete from `cruds` where full_name='$full_name'";
        $result=mysqli_query($conn,$sql);
        if($result){
         //   echo "delete success";
          header('location:display.php');
        }else{
            die(mysqli_error($conn));
        }
    }


?>