<?php
    session_start();
    require "./connection.php";
    
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        
        $sql = "TRUNCATE gaminglounge.reservations";
        $statement = $pdo->prepare($sql);
        $statement->execute();
        $pdo = null;
        header("Location: ./adminDashboard.php");
        exit();
    }

?>