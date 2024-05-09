<?php
ob_start();
include_once ("Models/Database.php");
include_once ("Models/Booking.php");

$message = '';

$dbContext = new DBContext();
if (isset($_POST['save'])){
$teacherId = $_POST['teacherId'] ?? '';
$timeStamp = $_POST['timeStamp'] ?? '';

/* Lägg till när inloggning är implementerat 

$pupilId = $auth->getUserId();

*/

/* !!! går ej göra bokningen med samma pupilID fler ggr än 1 gång, då får man fel */
$pupilId = 2;
$message = $dbContext->updateBooking($pupilId,$teacherId,$timeStamp, 1);

 }







?>
<!DOCTYPE html>

<head>
    <title>EventEase</title>
    <?php include (__DIR__ . '/../includes/head.php'); ?>

</head>

<body>

    <div class="guidance-wrapper">
        <!--Nav-->
        <div class="guidance-nav">
            <div class="logo-name-booking-list">
                <div class="logo-name">
                    <div class="logo"><img src="img\🦆 icon _cloud_.svg"></div>
                    <h2>EventEase</h2>
                </div>

                <ul class="booking-links">
                    <li><a>Tillgängliga lärare</a><i class="fa-solid fa-angle-down"></i></li>
                    <!--Byt mot riktig länk-->
                    <li><a>Hitta lediga tider</a></li>
                    <!--Byt mot riktig länk-->
                    <li><a>Mina bokningar</a></li>
                    <!--Byt mot riktig länk-->
                </ul>
            </div>

            <ul class="profile-links">
                <li><a>Välkommen Elev Elevsson</a></li>
                <!--Byt mot riktig länk-->
                <li><a>Logga ut</a></li>
                <!--Byt mot riktig länk-->
            </ul>
        </div>

        <div class="content-container">
            <h3>Lediga tider</h3>


<!-- TABORT SEN -->
<p><?php echo"$message";?>  </p>

            <!--Productkort/main-->
            <ul class="timeslot-list">
                <li class="time-card">
                    <p>Måndag 23/7</p>
                    <!--Dynamisk data här-->
                    <p>Kl 11.30</p>
                    <!--Dynamisk data här-->
                    <p>Lärare: Anders Andersson</p>
                    <!--Dynamisk data här-->
                    <p>Rum 1</p>
                    <!--Dynamisk data här-->
                    <form method='POST' class="button-img"><button class="booking-button" name="save">Boka</button>
                        <!--Byt mot riktig länk--><img class="teacher-avatar" src="img\teacher.png" alt="teacher">



                        <!-- VALUES I INPUTS SKA HA DYNAMISKVARIABEL NÄR KOMPONENT BYGGTS !!INTE HÅRDKODAT VÄRDE SOM NU !! -->
                        <input type="hidden" name="teacherId"  value="1" />
                        <input type="hidden" name="timeStamp"  value="2024-05-22 18:00" />
                        
                    </form>
                </li>
            </ul>
        </div>
    </div>


    <?php include (__DIR__ . '/../views/Footer.php'); ?>
</body>

</html>