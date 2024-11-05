<?php 
include "connection/conn.php";

$conn = mysqli_connect("localhost", "root", "", "loanm") or die("Could not connect");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="jackie/.css">
    <title>Select</title>
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

    <table class="table">
        <thead>
        <tr>
            
            <th scope="col">Username</th>
            <th scope="col">Email</th>
            <th scope="col">Operations</th>

        </tr>
        </thead>
        <tbody>

        <?php
    $sql = "SELECT * FROM `jack`";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result)) {
        while ($row = mysqli_fetch_assoc($result)) {
            $username = htmlspecialchars($row['username']);
            $email = htmlspecialchars($row['email']);
            echo '<tr>
                    <td>'.$username.'</td>
                    <td>'.$email.'</td>
                      <td>                  

                      <dv>
                          <i class="icon-ok-sign"><a href="Dadmn.php?delete username='.urlencode($username).'" class="text-danger">Delete</a></i>
                      </dv>

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
<script src="script.js"></script>
</body>
</html>
