<?php
    session_start();
    require "./connection.php";
    
    if($_SERVER["REQUEST_METHOD"] == "POST" && $_SESSION['role'] == 1) {
        
        $id = $_POST['id'];
        $sql = "DELETE FROM reservations WHERE id = :id";
        $statement = $pdo->prepare($sql);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->execute();
        $pdo = null;
        header("Location: ./adminDashboard.php");
        exit();
    }

?>