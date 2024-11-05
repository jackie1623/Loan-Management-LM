

<?php 
  session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="jackie/index.css">
    <title>Login</title>
</head>
<body>
        <div class="jack">

        <?php 
        include("connection/conn.php");

        if(isset($_POST['submit'])){
            $username = mysqli_real_escape_string($conn, $_POST['username']);
            $password = mysqli_real_escape_string($conn, $_POST['password']);
    
            $result = mysqli_query($conn, "SELECT * FROM jack WHERE username = '$username' AND Password = '$password'") or die ("ERROR!");
            $row = mysqli_fetch_assoc($result);
    
            if(is_array($row) && !empty($row)){
                $_SESSION['valid'] = $row['Username'];
                $_SESSION['email'] = $row['Email'];
                $_SESSION['age'] = $row['Age'];
                $_SESSION['id'] = $row['Id'];
    
                header("Location: home.php"); 
                exit();
            }else {
            echo "<div class='message'><p>Wrong username or password!</p></div><br>";
            echo "<a href='index.php'><button class='btn'> try again!</button></a>";
        }
        }else{
        ?>

            <form action="index.php" method="post">
                <h1>LOGIN</h1>
                <div class="input">
                    <input type="text" name="username" placeholder="Username" required>
                    <i class='bx bx-envelope'></i>
                </div>
                <div class="input">
                    <input type="password" name="password" placeholder="Password" required>
                    <i class='bx bx-lock-alt'></i>
                </div>
    
    
                <button type="submit" name="submit" class="btn" >Log in</button>
                <div class="register">
                    <p>Create new accout? <a href="reg.php">Register</a></p>
                </div>
    
            </form>
        </div>
    </body>
    </html>
    <?php } ?>
</body>
</html>

