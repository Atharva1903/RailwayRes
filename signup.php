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
    <script src="script.js"></script>
    <title>RailReserve</title> 
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
        <div class="mains">
            <div class="sign">
                <h2>Sign Up</h2>
            <form class="signf" action="psu.php" method="post">
                <div class="textbox">
                    Name:
                    <div class="input" id="input"><input type="text" placeholder="Username" name="username" required style="width: 95%;"></div>
                </div>
                <div class="textbox" style="height: 15px;">
                    <span style=" display: block;margin-bottom: 7px;">Gender:&nbsp;&nbsp;<br></span>
                    <input type="radio" name="gender1" value="male" id="check" required> Male &nbsp;&nbsp;
                    <input type="radio" name="gender1" value="female" id="check" required> Female
                </div>
                <div class="textbox">
                    Email:
                    <div class="input"><input type="email" placeholder="Email" name="email" style="width: 95%;" required></div>
                </div>
                <div class="textbox">
                    Password:
                    <div class="input"><input type="password" placeholder="Password" name="pass"  id="pass" required>
                    <div><img src="eye.svg" id="eye" onclick="show()"></div>
                    </div>
                </div>
                <div class="textbox">
                    Confirm Password:
                    <div class="input" id="rpasstb"><input type="password" placeholder="Confirm Password" name="rpass"  id="rpass" required onchange="check_pass()">
                    <div><img src="eye.svg" id="eye1" onclick="show1()"></div>
                    </div>
                </div>
                <span id="incorrect"></span>
                <span id="trc"><input type="checkbox" name="tr" id="tr" style="font-size: 2.4vmin;" required > Accept terms and Conditions.</span>
                <input type="submit" class="btn" value="Sign Up" onsubmit="check_pass()" id="subbtn" name="signup">
              </form>
              <span class="l">Already have an Account? <a href="login.php">Login here.</a></span>
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