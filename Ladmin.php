<?php
session_start();
include("connection/config.php");

if(isset($_POST['submit'])){
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $result = mysqli_query($conn, "SELECT * FROM `admin` WHERE Username = '$username' AND Password = '$password'") or die ("ERROR!");
    $count = mysqli_num_rows($result);

    if($count == 1){
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $row['Username'];
        $_SESSION['password'] = $row['Password'];

        header("Location: hadmin.php");
        exit();
    } else {
      
    }
}
mysqli_close($conn);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css">
    <title>Login</title>
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
        .jack {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            width: 300px;
        }
        .jack h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        .input {
            position: relative;
            margin-bottom: 15px;
        }
        .input input {
            width: 70%;
            margin-left: 3vh;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            padding-left: 40px;
        }
        .bx-envelope:before {
            content: "\eac1";
            margin-left: 3vh;
         }
         .bx-lock-alt:before {
            content: "\eb4a";
            margin-left: 3vh;
          }
        .input .bx {
            position: absolute;
            top: 50%;
            left: 10px;
            transform: translateY(-50%);
            font-size: 20px;
            color: #777;
        }
        .btn {
            background-color: #007bff;
            color: #fff;
            width: 86%;
            margin-left: 3vh;
            cursor: pointer;
            padding: 10px;
            border: none;
            border-radius: 6px;
            margin-top: 10px;
        }
        .btn:hover {
            background-color: #0056b3;
        }
        p {
            margin-left: 3vh;
            font-size: smaller;
        }
        .message {
            color: red;
            font-size: 14px;
            text-align: center;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="jack">
 
    
        <?php if (!isset($_POST['submit'])) { ?>
            <form action="Ladmin.php" method="post">
                <h1>Admin Login</h1>
                <div class="input">
                    <input type="text" name="username" placeholder="Username" required>
                    <i class='bx bx-envelope'></i>
                </div>
                <div class="input">
                    <input type="password" name="password" placeholder="Password" required>
                    <i class='bx bx-lock-alt'></i>
                </div>
                <button type="submit" name="submit" class="btn">Log in</button>
                <div class="register">
                    <p>Create new account? <a href="Radmin.php">Register</a></p>
                </div>
            </form>
        <?php } else {?>
            <?php
          
            $count = 0;
            if (isset($_POST['username']) && isset($_POST['password'])) {
                $username = $_POST['username'];
                $password = $_POST['password'];
                if ($username === 'admin' && $password === 'password') {
                    header("Location: home.php");
                    exit;
                } else {
                    $count = 1;
                }
            }
            ?>
            <?php if ($count == 1) { ?>
                <div class='message'><p>Wrong username or password!</p></div>
                <a href='Ladmin.php'><button class='btn'>Try again</button></a>
            <?php } ?>
        <?php } ?>
    </div>
</body>
</html>