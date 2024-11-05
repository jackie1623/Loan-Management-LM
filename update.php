<?php 
include 'connection/config.php';

if(isset($_GET['updatefull_name'])) {
    $full_name = mysqli_real_escape_string($conn, $_GET['updatefull_name']);
    $sql = "SELECT * FROM `cruds` WHERE full_name='$full_name'";
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        die("Query failed: " . mysqli_error($conn));
    }

    // Check if a row was found
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $full_name = $row['full_name'];
        $phoneNumber = $row['phoneNumber'];
        $date = $row['date'];
        $email = $row['email'];
        $amount = $row['amount'];

        if(isset($_POST['submit'])){
            $newFull_Name = mysqli_real_escape_string($conn, $_POST['full_name']);
            $newPhoneNumber = mysqli_real_escape_string($conn, $_POST['phoneNumber']);
            $newDate = mysqli_real_escape_string($conn, $_POST['date']);
            $newEmail = mysqli_real_escape_string($conn, $_POST['email']);
            $newAmount = mysqli_real_escape_string($conn, $_POST['amount']);
            
            $sql = "UPDATE `cruds` SET full_name='$newFull_Name', phoneNumber='$newPhoneNumber', date='$newDate', email='$newEmail', amount='$newAmount' WHERE full_name='$full_name'";
            $result_update = mysqli_query($conn, $sql);

            if($result_update){
              
                header('location: display.php');
                exit();
            } else {
                die("Update failed: " . mysqli_error($conn));
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
     integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
   
    <link rel="stylesheet" href="jackie/updt.css">
</head>
<body>
    <div class="container my-5">
        <form method="post">
            <div class="form-group">
                <label for="full_name">Full Name:</label>
                <input type="text" class="form-control" id="full_name" placeholder="Enter your full name" name="full_name" autocomplete="off" value="<?php echo htmlspecialchars($full_name); ?>">
             
            </div>

            <div class="form-group">
                <label for="phoneNumber">Phone Number:</label>
                <input type="text" class="form-control" id="phoneNumber" placeholder="Enter your phone number" name="phoneNumber" autocomplete="off" value="<?php echo htmlspecialchars($phoneNumber); ?>">
            </div>

            <div class="form-group">
                <label for="date">Date:</label>
                <input type="date" class="form-control" id="date" name="date" autocomplete="off" value="<?php echo $date; ?>">
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" placeholder="Enter your email" name="email" autocomplete="off" value="<?php echo htmlspecialchars($email); ?>">
            </div>

            <div class="form-group">
                <label for="amount">Amount:</label>
                <input type="text" class="form-control" id="amount" placeholder="Enter the amount" name="amount" autocomplete="off" value="<?php echo htmlspecialchars($amount); ?>">
            </div>

            <div class="content">
                <a class="btn btn-primary" href="display.php">Back</a>
                <button type="submit" class="btn btn-primary" name="submit">Update</button>
            </div>
        </form>
    </div>
</body>
</html>
