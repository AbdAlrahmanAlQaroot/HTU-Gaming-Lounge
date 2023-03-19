<?php
    session_start();
    if(!isset($_SESSION['verified'])){
        header("location: ./index.php");
        exit();
    }
    if($_SESSION['verified'] == 1){
        header("location: ./arena.php");
        exit();
    }
    require "./header.php";   
?>

<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
                <span class="login100-form-title p-b-48">
                    <img src="./images/icons/HTU Logo200.png" alt="">
                </span>
                    
                <span class="login100-form-title p-b-26">
                    Email Verification
                </span>
                <span>
                    A code has been sent to your email. Please enter it below to verify your email.
                </span>
                <form action="./php/verifyOTP.php" method="post">
                    <div class="wrap-input100 validate-input mt-3">
                        <lable class="text-secondary" >Verification Code</lable>
                        <input class="input100" placeholder="XXXXXX" type="text" name="otp" required>
                        <?php
                            if(isset($_SESSION['otp_error'])){
								echo "<p style='color:red;'>".$_SESSION['otp_error']."</p>";
								unset($_SESSION['otp_error']);
							}
                            if(isset($_SESSION['otp_success'])){
                                echo "
                                <script>
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Verification code has been sent to your email.',
                                        text: 'Check you university email for the code',
                                        showConfirmButton: true,
                                    });
                                </script>
                                ";
                                unset($_SESSION['otp_success']);
                            }

                        ?>
                    </div>
                    <div class="d-flex justify-content-around">
                        <button class="btn btn-primary" type="submit">
                            Verify
                        </button>
                        <a href="./php/otpSender.php" class="btn btn-primary">Send a verification code</a>
                    </div>
                </form>
        </div>
    </div>
</div>