<?php
    function createUsersTable($pdo) {
        $sql = "CREATE TABLE users (
            id INT AUTO_INCREMENT PRIMARY KEY,
            created_at 
            name VARCHAR(255) NOT NULL,
            email VARCHAR(255) NOT NULL,
            password VARCHAR(255) NOT NULL,
            password_confirm VARCHAR(255) NOT NULL
        )";

        try {
            $pdo->exec($sql);
            echo "success!.";
        } catch (PDOException $e) {
            echo "error: " . $e->getMessage();
        }
    }

    function createExampleTable($pdo) {
        $sql = "CREATE TABLE example (
            id INT AUTO_INCREMENT PRIMARY KEY,
            firstname VARCHAR(255) NOT NULL,
            lastname VARCHAR(255) NOT NULL,
            pet VARCHAR(15) NOT NULL
        )";
    
        try {
            $pdo->exec($sql);
            echo "Example table created successfully.";
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }


    function createUser(PDO $pdo) {
        $sql = "CREATE TABLE user (
            id INT AUTO_INCREMENT PRIMARY KEY,
            username VARCHAR(30) NOT NULL,
            email VARCHAR(255) NOT NULL,
            password VARCHAR(50) NOT NULL
        )";
    
        try {
            $pdo->exec($sql);
            echo "User table created successfully.";
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    