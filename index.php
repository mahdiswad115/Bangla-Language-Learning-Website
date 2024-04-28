<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bangla Language Learning Platform</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
            background-image: url('https://edge.mondly.com/blog/wp-content/uploads/2020/03/learn-bengali-1.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        header {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-sizing: border-box;
        }
        h1 {
            font-size: 2.5rem;
            color: #007bff;
            margin-bottom: 30px;
        }
        .btn {
            padding: 10px 20px;
            font-size: 1.2rem;
            text-decoration: none;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease 0s;
        }
        .btn:hover {
            background-color: #0056b3;
            box-shadow: 0px 15px 20px rgba(46, 229, 157, 0.4);
            color: #fff;
            transform: translateY(-7px);
        }
        .btn + .btn {
            margin-left: 20px;
        }
    </style>
</head>
<body>
    <header>
        <h1>Welcome to Bangla Language Learning Platform</h1>
        <div>
            <a href="login.php" class="btn">Login</a>
            <a href="signup.php" class="btn">Sign Up</a>
        </div>
    </header>

    <div class="container">
    </div>
</body>
</html>
