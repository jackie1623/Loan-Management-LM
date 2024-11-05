<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Homepage</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            border-radius: 8px;
        }
        .header {
            background-color: #4CAF50;
            color: #fff;
            padding: 10px;
            text-align: center;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
        }
        .welcome {
            margin-top: 20px;
            text-align: center;
            font-size: 24px;
        }
        .menu {
            margin-top: 20px;
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
        }
        .menu-item {
            width: 200px;
            padding: 20px;
            background-color: #e0e0e0;
            border-radius: 8px;
            text-align: center;
            margin-bottom: 20px;
            box-shadow: 0 0 5px rgba(0,0,0,0.2);
            transition: background-color 0.3s ease;
        }
        .menu-item:hover {
            background-color: #d0d0d0;
        }
        .menu-item a {
            text-decoration: none;
            color: #333;
            font-weight: bold;
        }
        footer {
            margin-top: 20px;
            text-align: center;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Admin Homepage</h1>
        </div>

        <div class="welcome">
            <p>Welcome, Admin!</p>
        </div>

        <div class="menu">
            <div class="menu-item">
                <a href="home.php">Back</a>
            </div>

            <div class="menu-item">
                <a href="vloan.php">View Loan</a>
            </div>

            <div class="menu-item">
                <a href="admin.php">View Users</a>
            </div>

        </div>
        <footer>
            <p>&copy; 2024 Admin. All rights reserved.</p>
        </footer>
    </div>
</body>
</html>
