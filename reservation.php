<?php
    session_start();
    require "./header.php";
    require "./connection.php";
    require "./php/AvailableTimeSlotsGenerator.php";
    
    if(!isset($_GET['game_id'])){
        header("location: ./arena.php");
        exit();
    }
    
    // Fetch game details
    $game_id = $_GET['game_id'];
    $sql = "SELECT * FROM games INNER JOIN gamestypes ON gamestypes.id = games.type_id WHERE games.id = :game_id";
    $statement = $pdo->prepare($sql);
    $statement->bindParam(':game_id', $game_id, PDO::PARAM_STR);
    $statement->execute();
    $data = $statement->fetch();
    $game_name = $data['name'];
    $session_duration = $data['session_duration'];
    
    
    // Retrieving reservations time slots for the selected game
    $time_slots = array();
    $time_slots = getAvailableTimeSlots($game_id);
    if(sizeof($time_slots) == 0){
        $_SESSION['reservation_error'] = "There is no available time slots for this game";
        header("location: ./arena.php");
        exit();
    }
?>	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
                    <span class="login100-form-title p-b-48">
						<img src="./images/icons/HTU Logo200.png" alt="">
					</span>
                    	
                    <span class="login100-form-title p-b-26" id = "reservation-title">
                        <?php echo $game_name?> Reservation ( <?php echo $session_duration?> minutes )
                    </span>
                    <p class="text-primary m-auto mb-4" style="width: fit-content;"> *You are the first player </p>
                    <form method="post" action="./php/makeReservation.php">
                        <div class="validate-input" data-validate = "Valid email is: a@htu.edu.jo">
                            <div class="align-items-center d-flex justify-content-lg-between flex-wrap">
                                <div class="p-1 m-auto">
                                    <div class="d-flex form-switch">
                                        <input class="form-check-input" type="checkbox" id="secondPlayer" name="1" value="1" checked>
                                        <label for="secondPlayer">Second Player</label>
                                    </div>
                                    <input class="form-control" type="text" name="student_email1" placeholder="HTU Email" id="student_email1"  required>
                                    <?php
                                        if(isset($_SESSION['email1_error'])){
                                            echo '<p style="color:red;">'.$_SESSION['email1_error'].'</p>';
                                            unset($_SESSION['email1_error']);
                                        }
                                    ?>
                                </div>
                                <div class="p-1 m-auto">
                                    <div class="d-flex form-switch">
                                        <input class="form-check-input" type="checkbox" id="thirdPlayer" name="2" value="1" checked>
                                        <label for="thirdPlayer">Third Player</label>
                                    </div>
                                    <input class="form-control" type="text" name="student_email2" placeholder="HTU Email" id="student_email2" required>
                                    <?php
                                        if(isset($_SESSION['email2_error'])){
                                            echo '<p style="color:red;">'.$_SESSION['email2_error'].'</p>';
                                            unset($_SESSION['email2_error']);
                                        }
                                    ?>
                                </div>
                                <div class="p-1 m-auto">
                                    <div class="d-flex form-switch">
                                        <input class="form-check-input " type="checkbox" id="fourthPlayer" name="3" value="1" checked>
                                        <label for="fourthPlayer">Fourth Player</label>
                                    </div>
                                    <input class="form-control" type="text" name="student_email3" placeholder="HTU Email" id="student_email3" required>
                                    <?php
                                        if(isset($_SESSION['email3_error'])){
                                            echo '<p style="color:red;">'.$_SESSION['email3_error'].'</p>';
                                            unset($_SESSION['email3_error']);
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="m-auto mt-3 mb-3" style="width: fit-content;">
                            <label for="time_slots" class="m-auto">Reservation Time</label>
                            <select name="time_slot" id="time_slots" class="form-select form-select-lg" required>
                                <?php
                                    foreach($time_slots as $slot){
                                        echo '<option value="'.$slot.'">'.$slot.'</option>';
                                    }  
                                ?>
                            </select>
                        </div>
                        <input type="number" value="<?php echo $game_id ?>" name="game_id" hidden>
                        <div class="container-login100-form-btn">
                            <div class="wrap-login100-form-btn">
                                <div class="login100-form-bgbtn"></div>
                                <button class="login100-form-btn" value="Submit" type="submit">
                                Reserve
                                </button>
                            </div>
                        </div>
                    </form>
			</div>
		</div>
	</div>
    <script>
        //disable the email input if the checkbox is not checked
        document.querySelectorAll(".form-check-input").forEach((item) => {
            item.addEventListener("change", (event) => {
                var input = document.getElementById("student_email"+ event.target.name);
                if(event.target.checked){
                    input.disabled = false;
                    input.required = true;
                }else{
                    input.disabled = true;
                    input.value = "";
                    input.required = false;
                }
            })
        });
    </script>
<?php
    require "./footer.php";
    if(isset($_SESSION['reservation_error'])){
        echo '
            <script>
                Swal.fire({
                    icon: "error",
                    title: "Reservation Failed",
                    text: "'.$_SESSION['reservation_error'].'",
                    showConfirmButton: true,
                });
            </script>
            ';

        unset($_SESSION['reservation_error']);
    }
    else if(isset($_SESSION['reservation_success'])){
        echo '
            <script>
                Swal.fire({
                    icon: "success",
                    title: "Reservation Completed",
                    text: "'.$_SESSION['reservation_success'].'",
                    showConfirmButton: true,
                });
            </script>
            ';

        unset($_SESSION['reservation_success']);
    }
?>