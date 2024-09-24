<!DOCTYPE html>
<html lang="en">
<head>
<?php
    require("connection.php");
    session_start();
?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Antonio:wght@100..700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <title>RailReserve</title>
    <script src="script.js"></script>
</head>
<body>
    <div class="container">
        <div class="nav">
            <div class="m">
            <div class="logo">
            </div>
            <div class="menu">
                <div class="item"><i class="fa-solid fa-house-chimney"></i>&nbsp;&nbsp;<a href="index.php">Home</a></div>
                <div class="item"><i class="fa-solid fa-ticket"></i>&nbsp;&nbsp;<a href="myticket.php">My Ticket</a></div>
            </div>
            </div>
            <div class="menus">
                <?php
                    if (isset($_SESSION["logged_in"]) && $_SESSION["logged_in"] == true) {
                        echo"<img src='user_profile.svg' style='transform: scale(110%);'>&nbsp;&nbsp;<span id='acc' onclick='shows()' style='cursor: pointer;'>$_SESSION[username]";
                    }
                    else{
                        echo"<img src='user_profile.svg' style='transform: scale(110%);'>&nbsp;&nbsp;<span id='acc' onclick='shows()' style='cursor: pointer;'>Account";
                    }
                ?>
                <div class="drop" id="drop">
                    <a href="Login.php" style="color: #393939;">Login/Sign in</a>
                    <a style="color: #393939; margin-top: 2vmin;">Logout</a>
                </div>    
            </div> 
        </div>
        <div class="tmain">
            <?php
            if(isset($_SESSION["logged_in"]) && $_SESSION["logged_in"] == true){
                $user = "SELECT * FROM user_logins WHERE username ='$_SESSION[username]'";
                $train = "SELECT * FROM bookings WHERE ID ='$_SESSION[id]'";
                $trainr = mysqli_query($con,$train);
                $train_fetch = mysqli_fetch_assoc($trainr);
                $train_name = "SELECT * FROM trains WHERE TrainID ='$train_fetch[TrainID]'";
                $train_namer = mysqli_query($con,$train_name);
                $result = mysqli_query($con,$user);
                if(mysqli_num_rows($trainr) > 0){
                    if(mysqli_num_rows($result) > 0){
                        $result_fetch = mysqli_fetch_assoc($result);
                        $train_name_fetch = mysqli_fetch_assoc($train_namer);
                        echo"
                        <div class='ticket'>
                            <div class='ttop'>
                                <h1>Train Ticket&nbsp;&nbsp;&nbsp;<i class='fa-solid fa-train' style='color: #ffffff;'></i></h1>
                            </div>
                            <div class='tlow'>
                                <div class='ts'>
                                    <div class='tsl' style='color: black'>NAME: ".$result_fetch['Username']."</div>
                                    <div class='tsr' style='color: black'>TRAIN ID: ".$train_fetch['TrainID']."</div>
                                </div>
                                <div class='ts' style='color: black'>TRAIN: ".$train_name_fetch['Name']."</div>
                                <div class='ts' style='color: black'>FROM: ".$train_name_fetch['Source']." &nbsp;&nbsp;&nbsp;TO: ".$train_name_fetch['Destination']."</div>
                                <div class='ts' style='color: black'>
                                    <div class='tsl'>SEAT TYPE: ".$train_fetch['TicketType']."</div>
                                    <div class='tsr'>SEAT NO: S42</div>
                                </div>
                                <div class='ts' style='color: black'>TIME: 11:45 PM - 06:00 AM</div>
                            </div>
                        </div>";
                    }
                }
                else{
                    echo "<script>alert('No bookings made yet!');
                    window.location.href = 'index.php';</script>";
                }
            }
            else{
                echo "<script>alert('Login to See Ticket');
                window.location.href = 'login.php';</script>";
            }?>
        </div>
        <footer>
        <div class="fdown">
                © 2024 RailReserve. All rights reserved.
            </div>
        </footer>
    </div>
</body>
</html>