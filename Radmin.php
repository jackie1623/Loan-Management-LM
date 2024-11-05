<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css">
    <title>Admin Registration</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .register-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            width: 300px;
        }
        .register-container h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }
        .form-group input {
            width: 90%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .form-group .btn {
            background-color: #007bff;
            color: #fff;
            width: 92%;
            margin-left: 1vh;
            cursor: pointer;
            padding: 10px;
            border: none;
            border-radius: 4px;
            margin-top: 10px;
        }
        .form-group .btn:hover {
            background-color: #0056b3;
        }
        .log {
            text-align: center;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    
    <div class="register-container">
        <?php 
        include("connection/config.php");

        if(isset($_POST['submit'])){
            $username = $_POST['username'];
            $password = $_POST['password'];

            $verify_query = mysqli_prepare($conn, "SELECT Username FROM admin WHERE Username = ?");
            mysqli_stmt_bind_param($verify_query, "s", $username);
            mysqli_stmt_execute($verify_query);
            mysqli_stmt_store_result($verify_query);
            $num_rows = mysqli_stmt_num_rows($verify_query);
            mysqli_stmt_close($verify_query);

            if($num_rows != 0){
                echo "<div class='message'><p>Username is already taken, please try another one!</p></div><br>";
                echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button></a>";
            } else {
                $insert_query = mysqli_prepare($conn, "INSERT INTO admin (Username, Password) VALUES (?, ?)");
                mysqli_stmt_bind_param($insert_query, "ss", $username, $password);
                mysqli_stmt_execute($insert_query);
                mysqli_stmt_close($insert_query);

                echo "<div class='message'><p>Registration successful!</p></div><br>";
                echo "<a href='Ladmin.php'><button class='btn'>Log in</button></a>";
            }
        } else {
        ?>

        <form action="Radmin.php" method="post">
            <h1>Admin Registration</h1>
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <button type="submit" name="submit" class="btn">Register</button> 
            </div>
            <div class="log">
                <p>Already have an account? <a href="Ladmin.php">Sign in</a></p>
            </div>
        </form>
        <?php } ?>
    </div>
</body>
</html>
