<?php

include 'controller/auth.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $conn = new PDO('mysql:dbname=database;host=mysql', 'database', 'database', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $firstname = htmlspecialchars($_POST["firstname"]);
        $lastname = htmlspecialchars($_POST["lastname"]);
        $favouritepet = htmlspecialchars($_POST["favouritepet"]);

        if (empty($firstname) || empty($lastname) || empty($favouritepet)) {
            header("Location: ../index.html");
            exit();
        }

        $sql = "INSERT INTO example (firstname, lastname, pet)
        VALUES ('$firstname', '$lastname', '$favouritepet')";

        if ($conn->exec($sql)) {
            echo "Success: New record created successfully";
        } else {
            echo "Error: " . $conn->errorInfo()[2];
        }

        $selectSql = "SELECT firstname, lastname, pet FROM example";
        $result = $conn->query($selectSql);

        if ($result) {
            echo "<br>Added data:";
            echo "<ul>";
            foreach ($result as $row) {
                echo "<li>{$row['firstname']} {$row['lastname']} - {$row['pet']}</li>";
            }
            echo "</ul>";
        } else {
            echo "Error retrieving data: " . $conn->errorInfo()[2];
        }

    } catch (PDOException $e) {
        echo "Database error: " . $e->getMessage();
    }
} else {
    header("Location: ../index.html");
}

