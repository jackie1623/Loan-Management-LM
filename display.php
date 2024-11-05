<?php 
include "connection/config.php";

$conn = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="jackie/dsply.css">
    <title>Select</title>
</head>
<body>

<div class="container">
        <div class="content">
       <i>
        <a class="btn btn-primary" href="home.php">Back</a>
        <a href="dsply.php" class="btn btn-primary my-5 text-light">Add Loan</a>
        </i>
        </div>

    <table class="table">
        <thead>
        <tr>
            
            <th scope="col">Full Name</th>
            <th scope="col">Phone Number</th>
            <th scope="col">Date</th>
            <th scope="col">Email</th>
            <th scope="col">Amount</th>
            <th scope="col">Operations</th>
        </tr>
        </thead>
        <tbody>

        <?php
    $sql = "SELECT * FROM `cruds`";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result)) {
        while ($row = mysqli_fetch_assoc($result)) {
            $full_name = htmlspecialchars($row['full_name']);
            $phoneNumber = htmlspecialchars($row['phoneNumber']);
            $date = htmlspecialchars($row['date']);
            $email = htmlspecialchars($row['email']);
            $amount = htmlspecialchars($row['amount']);

            echo '<tr>
                    <th scope="row">'.$full_name.'</th>
                    <td>'.$phoneNumber.'</td>
                    <td>'.$date.'</td>
                    <td>'.$email.'</td>
                    <td>'.$amount.'</td>
                    <td>
                        <button class="btn btn-primary"><a href="update.php?updatefull_name='.urlencode($full_name).'" class="text-light">Update</a></button>
                        
                        <button class="btn btn-danger"><a href="delete.php?deletefull_name='.urlencode($full_name).'" class="text-light">Delete</a></button>
                    </td>
                  </tr>';
        }
    } else {
        echo '<tr><td colspan="5">No record found</td></tr>';
    }
?>


        </tbody>
    </table>
</div>

</body>
</html>
