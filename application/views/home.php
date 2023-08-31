<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            animation: gradientAnimation 10s infinite;
            background-size: 200% 200%;
            background-image: linear-gradient(45deg, #3498db, #9b59b6, #3498db);
        }

        @keyframes gradientAnimation {
            0% {
                background-position: 0% 50%;
            }
            50% {
                background-position: 100% 50%;
            }
            100% {
                background-position: 0% 50%;
            }
        }

        .button-container {
            display: flex;
            margin-top: 10px;
        }

        .button-container a {
            display: inline-block;
            margin: 0 10px;
            padding: 10px 20px;
            background-color: #3498db;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .button-container a:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>
    <h1>Selamat Datang di Aplikasi Tamu</h1>
    <div class="button-container">
        <a href="<?php echo site_url('login'); ?>">Login Admin</a>
        <a href="<?php echo site_url('tamu'); ?>">Formulir Data Tamu</a>
    </div>
</body>
</html>