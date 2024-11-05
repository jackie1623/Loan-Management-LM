
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="jackie/pf.css">
    <link rel="stylesheet" href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css'>
    <title>Login</title>
</head>
<body>
    <div class="jackie">
        <?php 
      
        include("connection/conn.php");
        if(isset($_POST['submit'])){
            $username = $_POST['username'];
            $email = $_POST['email'];
            $age = $_POST['age']; 
            $password = $_POST['password'];
            
            $verify_query = mysqli_prepare($conn, "SELECT Username FROM jack WHERE Username = ?");
            mysqli_stmt_bind_param($verify_query, "s", $username);
            mysqli_stmt_execute($verify_query);
            mysqli_stmt_store_result($verify_query);
            $num_rows = mysqli_stmt_num_rows($verify_query);
            mysqli_stmt_close($verify_query);

            if($num_rows != 0){
                echo "<div class ='message'> <p> Username is already recorded, please try another one!</p></div> <br>";
                echo "<a href ='javascript:self.history.back()'> <button class ='btn'>Go Back</button>";
            }else{
         
                $insert_query = mysqli_prepare($conn, "INSERT INTO jack (Username, Email, Age, Password) VALUES (?, ?, ?, ?)");
                mysqli_stmt_bind_param($insert_query, "ssss", $username, $email, $age, $password);
                mysqli_stmt_execute($insert_query);
                mysqli_stmt_close($insert_query);

                echo "<div class ='message'> <p> Registered!</p></div> <br>";
                echo "<a href ='update.prof.php'><button class ='btn'>Log in</button>";
            }
        }else{
        ?>

        <form action="prof.php" method="post">
            <h1>Edit Profile</h1>
            <div class="input">
                    <h2>Username:</h2>
                <input type="text" name="username" placeholder="Ex jack chan" required>
            </div>
            <div class="input">
                <h2>Email:</h2>
                <input type="email" name="email" placeholder="Ex j******@gmail.com" required>
            </div>
            <div class="input">
                <h2>Age:</h2>
                <input type="text" name="age" placeholder="Enter your age" required>
            </div>
            <div class="input">
                <h2>Password:</h2>
                <input type="password" name="password" placeholder="Enter password" required>
            </div>
            <i>
            <a class="btn btn-primary" href="home.php">Back</a>
            <a href="update.prof.php">Submit</a>
            </i>
        </form>
        <?php } ?>
    </div>
</body>
</html>
