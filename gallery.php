<?php
ob_start();
include ('user.php');
include('connection.php');
include 'inc/header.php';
?>
    <div class="container">
        <div class="row">
        <div class="col-lg-6 mx-2 my-2 bg-transparent form-col">
            <div class="form-container body-form">
            <h1 class="h1 text-center form-heading"> DMF HOTEL BOOKINGS</h1>
            </div>
            <!--Form Starts Here-->
            <form role="form" method="POST" class="form-holder"> 
            <div class="form-group"> 
                <label for="name">Name</label> 
                <input type="text" class="form-control" id="name"  
                    placeholder="Please Enter First Name" name="name" required> 
            </div> 
            <div class="form-group"> 
                <label for="surname">Surname</label> 
                <input type="text"  class="form-control" id="surname" placeholder="Please Enter Your Surname." name="surname"required> 
            </div>
            <div class="form-group"> 
            <label for="name">Select hotel</label> 
            <!--PHP CODE TO INSTERT HOTELS IN THE DATABASE-->
            <select name ="hotels"class="form-control">
            <?php
            // function to load hotels
            include 'hotels.php';
            loadHotels();
            ?>
            </select>  
            </div>
            <div class="form-row">
                <div class="col-5 check-in-date">
                <label for="check-in">Select Check-in Date<span class="glyphicon glyphicon-calender"><i class="fa fa-calendar"></i></span></label>
                <input type="date" class="DateFrom form-control" placeholder=".col-5" name="check-in" min="<?php echo date("Y-m-d");?>" max="2020-12-31" value="<?php echo date("Y-m-d");?>"required>
                </div>
                <div class="col-5 check-out-date">
                <label for="check-out">Select Check-out Date<span class="glyphicon glyphicon-calender"><i class="fa fa-calendar"></i></span></label>
                <input type="date" class="form-control" placeholder=".col-3" name="check-out" min="<?php echo date("Y-m-d");?>" max="2020-12-31" required> 
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-lg btn-block my-2" name="submit">Submit Booking</button> 
            </form>
            <!--Form ENDS Here-->
        </div>
        <div class="col-lg-4 my-2 confirm-container">

        <?php
        if(isset($_POST['submit'])){
            if(!isset($_POST['confirm-booking'])){
                //display the inputs
                 //first name of guest
            $firstName  =   $_POST['name'];
            //surname of guest
            $lastName   =   $_POST['surname'];
            //concatenate names to one-- for outoput purposes
            $guestName  =   $firstName." ".$lastName;
            //important variables
            //hotel selected
            $hotelchoice =   $_POST['hotels'];
            include 'dailyrate.php';
            $hotelRate = dailyRateQuery($hotelchoice);
            //code block to calculate the number of days guest will stay at hotel.
            //Check in date -STRING
            $checkin    =  $_POST['check-in'];
            //check out date -STRING
            $checkout    = $_POST['check-out'];
            // number of days
            $datetime1 = new DateTime ($_POST['check-in']);
            $datetime2 = new DateTime ($_POST['check-out']);
            $interval = $datetime1->diff($datetime2);
            $daysBooked = $interval->format('%R%a days');

            $amountdue = amountDue($checkin,$checkout,$hotelRate);
            // // create a function
            confirmBooking($guestName,$hotelchoice,$checkin,$checkout,$daysBooked,$amountdue,$firstName,$lastName);
            }//else statement to check for duplicate bookings or insert new bookings
            else{
                //once set send to mySQL
                $firstName  =   $_POST['firstname-confirm'];
                $lastName   =   $_POST['lastname-confirm'];
                $checkin    =   $_POST['checkin-confirm'];
                $checkout   =   $_POST['checkout-confirm'];
                $daysBooked =   $_POST['number-of-days'];
                $hotelchoice=  $_POST['hotel-confirm'];
                $amountdue  =   $_POST['cost-confirm'];
                //select from database where name,hotel, if non exits insert into database

                //query the database 

                $sql_search ="SELECT * FROM  booking WHERE firstname = '$firstName 'AND  lastName='$lastName'";
                $tableSearch_result = $conn->query($sql_search);
                if($tableSearch_result->num_rows>0){
                    $existBooking   = $tableSearch_result->fetch_assoc();
                    $existingBooking_id = $existBooking['id'];
                    $existBooking_name = $existBooking['firstName'];
                    $existBooking_lname = $existBooking['lastName'];
                    $existBooking_hotel = $existBooking['hotel'];
                    $existBooking_check_in =$existBooking['check_in_date'];
                    $existBooking_check_out =$existBooking['check_out_date'];
                    echo<<<END
                    <div class="container">
                    <div class="row">
                        <div class="col-12">
                        <h2 class="h2 text-center">Previous Booking Found!!</h2>
                        <p>Would you like to delete your previous booking or continue with this one?</p>
                        <ul>
                            <li>Full Name: $firstName $lastName</li>
                            <li>Hotel Booked: $existBooking_hotel</li>
                            <li> Check In Date: $existBooking_check_in</li>
                            <li> Check Out Date: $existBooking_check_out</li>
                        </ul>
                        <form method="POST">
                        <input type="hidden"  name="replace-id" value="$existingBooking_id">
                        <input type="hidden" name="confirm-booking">
                        <input type="hidden" name="firstname-confirm" value="$firstName">
                        <input type="hidden" name="lastname-confirm" value="$lastName">
                        <input type="hidden" name="hotel-confirm" value="$hotelchoice">
                        <input type="hidden" name="checkin-confirm" value="$checkin">
                        <input type="hidden" name="checkout-confirm" value="$checkout">
                        <input type="hidden" name="cost-confirm" value="$amountdue">
                        <input type="hidden" name="submit">
                        <input type="submit" name="previous" value="Yes">
                        <input type="submit" name="previous" value="No">
                        </form>
                        </div>
                    </div>
                    </div>
END;
            }else{include 'dailyrate.php';
                insertEntry($firstName,$lastName,$hotelchoice,$checkin,$checkout,$amountdue);}  
        }
        if(isset($_POST['previous'])){
            if($_POST['previous'] == 'Yes'){
                $existBooking_hotel = $_POST['hotel-confirm'];
                include 'dailyrate.php';
                deleteEntry($existingBooking_id,$firstName,$lastName,$hotelchoice,$checkin,$checkout,$amountdue);
                echo "<br>" . " Replaced Previous Booking For: ".  $existBooking_hotel; 
                // echo " First Name: " . $firstName;
            }else{
                header('Location: gallery.php');
            }
        }
    }
        ?>
        </div>  
        </div>
    </div>
    <script src="js/main.js"></script>
</body>
</html>