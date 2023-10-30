<?php

include 'model/auth.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $conn = new PDO('mysql:dbname=database;host=mysql', 'database', 'database');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        createUser($conn);

        $username = htmlspecialchars($_POST['username']);
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);
        $password_confirm = htmlspecialchars($_POST['password_confirm']);

        if (empty($username) || empty($email) || empty($password) || empty($password_confirm)) {
            header("Location: ../index.html");
            exit();
        }

        if ($password != $password_confirm) {
            echo "Error: Password and password confirmation do not match";
            exit();
        }

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO user (username, email, password) VALUES (:username, :email, :password)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $hashedPassword);

        if ($stmt->execute()) {
            echo "User registered successfully.";
        } else {
            echo "Error: User registration failed.";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
