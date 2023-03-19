<?php 
    session_start();
    if (!$_SESSION['email']){
        header("Location: ./index.php");
        exit();
    }
    echo '
    <li><a href="./logout.php" style="color: black;">Log out </a> </li>
    ';
    

    // last refresh
    
    
    function getAdminTable(){
        $sql = "SELECT * FROM admindashboard";
        require "./connection.php";
        $statement = $pdo->prepare($sql);
        $statement->execute();
        $data = $statement->fetchAll();
        // var_dump($data);

        echo'
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Game Name</th>
                        <th scope="col">Reservation Time</th>
                    </tr>
                </thead>
                <tbody>
        ';
        foreach($data as $row){
            echo'
                <tr>
                    <td>'.$row["fname"].'</td>
                    <td>'.$row["lname"].'</td>
                    <td>'.$row["name"].'</td>
                    <td>'.$row["res_time"].'</td>
                    <td>
                        <form action="./deleteReservation.php" method="POST">
                            <input type="hidden" name="id" value="'.$row["id"].'">
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            ';
        }
    }  


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" 
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Admin Dashboard</title>
</head>
<body>
    <a href="./banPlayers.php"> Ban Players </a>
    <form action="./deleteAll.php" method="POST">
       <button type="submit" class="btn btn-danger">Delete All</button>
    </form>
    <form action="./filter.php" method="POST">
    <div class="wrap-input100 validate-input">
        <div class="form-check">
            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
            <label class="form-check-label" for="flexRadioDefault1"> Default radio </label>
            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
            <label class="form-check-label" for="flexRadioDefault1"> Default radio </label>
            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
            <label class="form-check-label" for="flexRadioDefault1"> Default radio </label>
            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
            <label class="form-check-label" for="flexRadioDefault1"> Default radio </label>
        </div>
    </div>
    </form>
    
<?php
    getAdminTable()
?>
</body>
</html>