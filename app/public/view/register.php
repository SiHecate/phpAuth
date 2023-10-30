<!DOCTYPE html>
<html>
<head>
    <title>Kullanıcı Kaydı</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #333;
            color: #fff;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 80vh;
        }

        .container {
            background-color: #444;
            border-radius: 50px;
            padding: 55px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
        }

        form {
            margin: 20px 0;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 95%;
            padding: 10px;
            margin-bottom: 10px;
            background-color: #555;
            border: 2px solid #444;
            color: #fff;
            border-radius: 5px;
        }

        input[type="submit"] {
            background-color: #007BFF;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .error {
            color: #FF0000;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Register</h2>
        <form method="POST" action="../controller/registerr.php">
            <label for="username">Kullanıcı Adı:</label>
            <input type="text" name="username" required>

            <label for="email">E-posta Adresi:</label>
            <input type="email" name="email" required>

            <label for="password">Şifre:</label>
            <input type="password" name="password" required>

            <label for="password_confirm">Şifre Onayı:</label>
            <input type="password" name="password_confirm" required>

            <input type="submit" value="Kaydol">
        </form>
        <div class="error">
            <!-- PHP tarafından dönen hata mesajları buraya yazılabilir -->
        </div>
    </div>
</body>
</html>
