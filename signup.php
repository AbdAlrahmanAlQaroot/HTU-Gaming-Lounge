<?php
	session_start();
	require "./header.php";
?>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" method="post" action="./php/signup.php">
				    <span class="login100-form-title p-b-48">
						<img src="./images/icons/HTU Logo200.png" alt="">
					</span>
                    	
                    <span class="login100-form-title p-b-26">
						Welcome To HTU Gaming Lounge - Sign Up
					</span>
					
  					<div class="d-flex justify-content-between">
						<div class="wrap-input100 validate-input g-5 w-50">
							<label class="" data-placeholder="First Name">Firat Name</label>
							<input class="input100" type="text" name="first_name">
						</div>

						<div class="wrap-input100 validate-input w-50">
							<label class="" data-placeholder="Last Name">Last Name</label>
							<input class="input100" type="text" name="last_name">
						</div>

					</div>

					<div class="d-flex justify-content-around">
						<div class="wrap-input100 validate-input" data-validate = "Valid email is: a@htu.edu.jo">
							<label class="" data-placeholder="Email">Email</label>
							<input class="input100" type="text" name="email">
							<?php
								if(isset($_SESSION['email_error'])){
									echo "<p style='color:red'>".$_SESSION['email_error']."</p>";
									unset($_SESSION['email_error']);
								}
							?>
						</div>
  						<div class="wrap-input100 validate-input">
							<lable class="" data-placeholder="University ID">University ID</lable>
							<input class="input100" type="number" name="uni_id">
							<?php
								if(isset($_SESSION['uni_id_error'])){
									echo "<p style='color:red'>".$_SESSION['uni_id_error']."</p>";
									unset($_SESSION['uni_id_error']);
								}
							?>
						</div>
					</div>
					
					<div class="d-flex justify-content-around">
						<div class="wrap-input100 validate-input" data-validate="Enter password">
							<span class="btn-show-pass">
								<i class="zmdi zmdi-eye"></i>
							</span>
							<label class="" data-placeholder="Password">Password</label>
							<input class="input100" type="password" name="password">
							<?php
								if(isset($_SESSION['password_error'])){
									echo "<p style='color:red;'>" . $_SESSION['password_error'] . "</p>";
									unset($_SESSION['password_error']);
								}

							?>
						</div>
						<div class="wrap-input100 validate-input" data-validate="Enter password">
							<span class="btn-show-pass">
								<i class="zmdi zmdi-eye"></i>
							</span>
							<label class="" data-placeholder="Confirm Password">Confirm Password</label>
							<input class="input100" type="password" name="confirm_password">
							<?php
								if(isset($_SESSION['confirm_password_error'])){
									echo "<p style='color:red;'>" . $_SESSION['confirm_password_error'] . "</p>";
									unset($_SESSION['confirm_password_error']);
								}
							?>
						</div>
					</div>
                    

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn">
								 Sign Up
							</button>
						</div>
					</div>

					<div class="text-center p-t-115">
						<span class="txt1">
							Have an account?
						</span>

						<a class="txt2" href="./">
							Log in
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>