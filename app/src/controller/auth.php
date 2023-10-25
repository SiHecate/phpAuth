<?php
    function createUsersTable($pdo) {
        $sql = "CREATE TABLE users (
            id INT AUTO_INCREMENT PRIMARY KEY,
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
?>