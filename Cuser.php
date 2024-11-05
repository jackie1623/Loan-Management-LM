<?php 
   session_start();
   
   include("php/config.php");
   if(!isset($_SESSION['VALID'])){
    header("Location: index.php");
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="jackie/setting.css">
  <title>Setting</title>
</head>
<body>
      <div class="container">
        <div class="box form-box">

        <?php 
            if(isset($_POST['submit'])){
              $username = $_POST['Username'];
              $password = $_POST['password'];

              $id = $_SESSION['id'];

              $edit_query = mysqli_query($con,"UPDATE jack SET Username='$Username',Password='$Password' WHERE Id=$id ") or die("error accurred");

              if($edit_query){
                echo "<div class= 'message'>;
                <p>Profile Update!</p>
              </div> <br>";
              echo "<a href='home.php'><button class='btn'>Go Home</button></a>";
             
            }
            }else{

              $id = $_SESSION['id'];
              $query = mysqli_query($con,"SELECT*FROM jack WHERE Id=$id ");
            
              while($result = mysqli_fetch_assoc($query)){
                    $res_Uname = $result['Username'];
                    $res_Password = $result['Password'];
              }
            ?>

            <header>Setting</header>
            <form action="" method="post">
              <div class="field input">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" required >
              </div>
              <div class="field input">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" required>
              </div>
              <div class="field">
                <input type="Submit" class="btn" name="submit" value="Update" required>
              </div>

           </form>
        </div>
       <?php } ?>
       </div>
</body>
</html>
