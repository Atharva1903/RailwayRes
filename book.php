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
    <?php
        if(isset($_POST['type_inp'])) {
            // Access the JavaScript variable value passed from the form
            $type = $_POST['type_inp'];
            $ti = $_POST['trainid'];
            $d = $_POST['date'];
            $date = explode("-",$d,1);
        } 
    ?> 
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
                if (isset($_SESSION["logged_in"]) && $_SESSION["logged_in"] == true) {
                    $ticid = $_SESSION['id'].$ti.$d[0];
                    $book = "INSERT INTO bookings ( id, trainid, tickettype, ticketid, bdate) VALUES ('".$_SESSION['id']."','".$ti."','".$type."','".$ticid."','".$date[0]."')";
                    mysqli_query($con,$book);
                }
                else{
                    echo "<script>alert('Login to Book Ticket');
        window.location.href = 'login.php';</script>";
                }
            ?>
            <?php
            if(isset($_SESSION["logged_in"]) && $_SESSION["logged_in"] == true){
                $user = "SELECT * FROM user_logins WHERE username ='$_SESSION[username]'";
                $result = mysqli_query($con,$user);
                $train = "SELECT * FROM trains WHERE TrainID ='$ti'";
                $trainr = mysqli_query($con,$train);
                $train_result_fetch = mysqli_fetch_assoc($trainr);
                if(mysqli_num_rows($result) > 0){
                    $result_fetch = mysqli_fetch_assoc($result);
                echo"
                <div class='ticket'>
                    <div class='ttop'>
                        <h1>Train Ticket&nbsp;&nbsp;&nbsp;<i class='fa-solid fa-train' style='color: #ffffff;'></i></h1>
                    </div>
                    <div class='tlow' style='color: black'>
                        <div class='ts'>
                            <div class='tsl'>NAME: ".$result_fetch['Username']."</div>
                            <div class='tsr'>TRAIN ID: ".$ti."</div>
                        </div>
                        <div class='ts'>TRAIN: ".$train_result_fetch['Name']."</div>
                        <div class='ts'>FROM: ".$train_result_fetch['Source']."&nbsp;&nbsp;&nbsp;TO: ".$train_result_fetch['Destination']."</div>
                        <div class='ts'>
                            <div class='tsl'>SEAT TYPE:".$type."</div>
                            <div class='tsr'>SEAT NO:</div>
                        </div>
                        <div class='ts'>TIME:</div>
                    </div>
                </div>";
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