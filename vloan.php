<?php 
include "connection/config.php";

$conn = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Loans</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f0f0f0;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            border-radius: 8px;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ccc;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f0f0f0;
            font-weight: bold;
        }
        td {
            background-color: #fff;
        }
    </style>
</head>
<body>

  <div class="container">
  <div class="content">
  <button id="backButton">Back</button>
        </div>
    <h1>View Loan</h1>
    <table>
        <thead>
            <tr>
                <th>Full Name</th>
                <th>Phone Number</th>
                <th>Date</th>
                <th>Email</th>
                <th>Amount</th>
            </tr>
        </thead>
        <tbody>
          
        </tbody>
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
                     
                  </tr>';
        }
    } else {
        echo '<tr><td colspan="5">No record found</td></tr>';
    }
?>
    </table>
</div>
<script src="script.js"></script>
</body>
</html>