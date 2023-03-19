<?php 
    session_start();
    require "./header.php";
    if (!isset($_SESSION['verified']) || $_SESSION['verified'] == 0) {
        header("location: ./verifyemail.php");
        exit();
    }
    if(!isset($_SESSION['verified'])){
        header("location: ./index.php");
        exit();
    }
    function getCard($number, $gameName){
        echo'
          <div class="card">
            <div class="box">
              <div class="content">
              <h2>'.$number.'</h2>
                <h3>'.$gameName.'</h3>
                <p></p>
                <a href="./reservation.php?game_id='.$number.'">Reserve Now</a>
              </div>
            </div>
          </div>
        ';
    }
?>
<span class="login100-form-title p-b-48">
  <img src="./images/icons/HTU Logo200.png" alt="">
</span>


<?php
  if(isset($_SESSION['email'])){
    echo ' 
    <li><a href="./logout.php" style="color: #DA373F;">Log Out </a> </li>';
  }
  else{
        echo '
        <li><a href="./signup.php" style="color: black;">Sign Up</a> </li>
        <li><a href="./index.php" style="color: black;">Log in </a> </li>
        ';
  }
?>

<div class="container">
  <?php 
    getCard("01", "Billiard");
    getCard("02", "PS5");
    getCard("03", "Air Hockey");
    getCard("04", "Table Tennis");
    getCard("05", "Baby Football");

    if(isset($_SESSION['reservation_error'])){
      echo'
        <script>
          Swal.fire({
            icon: "error",
            title: "Reservation Failed",
            text: "'.$_SESSION['reservation_error'].'",
            showConfirmButton: true,
            confirmButtonText: "OK",
          });
        </script>
      ';
      unset($_SESSION['reservation_error']);
    }
  ?>
</div>

</body>
</html> 