<!DOCTYPE html>
<html>

<head>
    <title>Z Blog - Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f1f1f1;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }

        .header {
            background-color: #333333;
            color: #ffffff;
            padding: 10px;
        }

        .content {
            background-color: #ffffff;
            padding: 20px;
        }

        .footer {
            background-color: #333333;
            color: #ffffff;
            padding: 10px;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>Welcome to Z Blog!</h1>
        </div>
        <div class="content">
            <h2>Login Information</h2>
            <p><b>Username / Email:</b> <u>{{ $email }}</u></p>
            <p><b>Password:</b> <u>{{ $password }}</u></p>
            <p>To log in to your Z Blog account, click the link below:</p>
            <p><a href="http://localhost:8000/login">Login to Z Blog</a></p>
        </div>
        <div class="footer">
            <p>If you have any questions or need assistance, please contact our support team.</p>
        </div>
    </div>
</body>

</html>
