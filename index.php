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
                <div class="item"><i class="fa-solid fa-ticket"></i>&nbsp;&nbsp;<a href="myticket.php">My Tickets</a></div>
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
                    <a href="login.php" style="color: #393939; padding: 2vmin 1vmin;">Login / Sign in</a>
                    <a href="logout.php" style="color: #393939; margin-top: 2vmin;">Logout</a>
                </div>    
            </div>
            
        </div>
        <div class="main">
            <div class="card">
                <h1 class="no">India's No.1 Railway Ticket Booking Site</h1>
                <div class="glass">
                <form class="inp" name="f1" method="post" action="booking.php">
                    <input type="text" placeholder="From" id="s" name="src" required>
                    <img src="ex.svg" alt="" class="ex" id="ex" onclick="exchange()">
                    <input type="text" placeholder="To" id="i" name="des" required>
                    <input type="date" this.placeholder="Date" id="date" name="date" required>
                    <button class="btn" name="search">Search Trains</button>
                </form>
                </div>
                <h1 class="tag">Book Your Journey, Unlock Your Adventure!</h1>
            </div>
        </div>
        <div class="page1">
        <div class="cards">
            <div class="c">
                <div class="line"><img src="booking_v2.svg">&nbsp;&nbsp;&nbsp;<h1>Fastest confirmed booking experience</h1></div>
                <p>Easy to use UI and fast comfirmation of tickets on your Email.</p>

            </div>
            <div class="c">
                <div class="line"><img src="refunds_v2.svg">&nbsp;&nbsp;&nbsp;<h1>Instant refunds on UPI payments</h1></div>
                <p>Get Instant Refunds on your UPI payments.</p>
            </div>
            <div class="c">
                <div class="line"><img src="support_v2.svg">&nbsp;&nbsp;&nbsp;<h1>Hassle free customer care</h1></div>
                <p>Get dedicated customer support for all your queries.</p>
            </div>
        </div>
        </div>
        <div class="page1">
            <div class="part1">
                <h1>Check Your Ticket</h1>
                <p>Track your ticket status and view travel details seamlessly.</p>
                <button>Download Ticket &nbsp;<i class="fa-solid fa-download" style="color: #ffffff;"></i></button>
            </div>
            <div class="part2">
                <img src="railPop.svg">
            </div>
        </div>
        <footer>
            <div class="fdown">
                © 2024 RailReserve. All rights reserved.
            </div>
        </footer>
    </div>
</body>
</html>