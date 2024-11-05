<?php 
  include 'connection/config.php';
  if(isset($_POST['submit'])){
    $full_name=$_POST['full_name'];
    $phoneNumber=$_POST['phoneNumber'];
    $date=$_POST['date'];
    $email=$_POST['email'];
    $amount=$_POST['amount'];
    
    $sql="INSERT INTO `cruds`(`full_name`,`phoneNumber`,`date`, `email`, `amount`) VALUES
    ('$full_name','$phoneNumber','$date','$email','$amount')";
    $result=mysqli_query($conn,$sql);
    if($result){
     //  echo "data inserted success";
    header('location:display.php');
    }else{
      die(mysqli_error($conn));
    }
  }
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
     integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="jackie/setting.css">
     <title>Insert</title>
</head>
<body>
  
    <div class="container my-5">
    <form method="post">
      
  <div class="form-group">
    <label>Full Name:</label>
    <input type="text" class="form-control"
     placeholder="Enter your full name" name="full_name" autocomplete="off">
  </div>

  <div class="form-group">
    <label>Phone Number:</label>
    <input type="number" class="form-control"
     placeholder="Enter your Phone number" name="phoneNumber" autocomplete="off">
  </div>

  <div class="form-group">
    <label>Date:</label>
    <input type="date" class="form-control"
     placeholder="Date" name="date" autocomplete="off">
  </div>

  <div class="form-group">
    <label>Email:</label>
    <input type="email" class="form-control"
     placeholder="Enter your email" name="email" autocomplete="off">
  </div>

  <div class="form-group">
    <label>Amount:</label>
    <input type="text" class="form-control"
     placeholder="Enter your amount" name="amount" autocomplete="off">
 </div>
 
 <a class="btn btn-primary" href="display.php">Back</a>
  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
 </form>
 </div>
</body>
</html>