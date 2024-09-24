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
    <script>
        function settype(type,event){
            event.preventDefault();
            arr = type.split('_');
            document.getElementById(''+arr[0]+'_select').innerHTML = 'Selected Ticket: '+arr[1];
            document.getElementById('type_inp').value = arr[1];
        }
    </script>
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
        <div class="bd">
            <form class="ginfo" name="f1" method="post" action="booking.php" required>
                    <input type="text" placeholder="From" id="s" name="src">
                    <input type="text" placeholder="To" id="i" name="des" required>
                    <input type="date" this.placeholder="Date" id="date" name="date" required>
                    <button class="btn" name="search">Search Trains</button>
            </form>
        </div>
        <div class="bmain">
        <?php
        $date = $_POST['date'];
        $s = strtolower($_POST['src']);
        $str = ucfirst($s);
        $d = strtolower($_POST['des']);
        $des = ucfirst($d);
        if(isset($_POST['search'])){
            $trains = "SELECT * FROM trains WHERE Source ='".$str."' AND Destination = '".$des."'";
            $result = mysqli_query($con,$trains);
            $i = 0;
            if($result){
                if(mysqli_num_rows($result) > 0){
                    while($result_fetch = mysqli_fetch_assoc($result)){
                        echo "<form class='train' action='book.php' method='post'>
                        <h2>".$result_fetch['Name']."</h2>
                        <div class='detail'>
                            <div class='items'>
                            <h4>Train ID</h4>
                            ".$result_fetch['TrainID']."
                            </div>
                            <div class='items'>
                            <h4>Journey</h4>
                            <div>
                            ".$result_fetch['Source']."&nbsp;&nbsp;&nbsp;&nbsp;<i class='fa-solid fa-arrow-right-arrow-left' style='color: #000000;'></i>&nbsp;&nbsp;&nbsp;&nbsp;".$result_fetch['Destination']."</div>
                            </div>
                            <button class='items' value='General' id='".$i."_General' onclick = 'settype(this.id,event)'>
                            <h4>General</h4>
                            Seats Available: ".$result_fetch['General']."
                            </button>
                            <button class='items' value='Sleeper' id='".$i."_Sleeper' onclick = 'settype(this.id,event)'>
                            <h4>Sleeper</h4>
                            Seats Available: ".$result_fetch['Sleeper']."</button>
                            <button class='items' value='AC3' id='".$i."_AC3' onclick = 'settype(this.id,event)'>
                            <h4>AC 3</h4>
                            Seats Available: ".$result_fetch['AC3']."</button>
                            <button class='items' value='AC2' id='".$i."_AC2' onclick = 'settype(this.id,event)'>
                            <h4>AC 2</h4>
                            Seats Available: ".$result_fetch['AC2']."</button>
                            <button class='items' value='AC1' id='".$i."_AC1' onclick = 'settype(this.id,event)'>
                            <h4>AC 1</h4>
                            Seats Available: ".$result_fetch['AC1']."</button>
                            <div class='items'>
                            <h4>Total Seats Available</h4>
                            ".$result_fetch['Total']."</div>
                        </div>
                        <h4 class='select' id='".$i."_select'>Selected Ticket: </h4>
                        <input type='hidden' id='type_inp' name='type_inp'>
                        <input type='hidden' id='trainid' name='trainid' value = '".$result_fetch['TrainID']."'>
                        <input type='hidden' id='date' name='date' value = '".$date."'>
                        <button type='submit' name='book' value='book' class='book' id='".$result_fetch['TrainID']."' onclick='settype(this.id)'>Book Now</button>
                        </form>";
                        $i++;
                    }
                }
                else{
                }
            }
            else{
                echo "<script>alert('Cannot execute Query');
                window.location.href = 'index.php';</script>";
            }

        }

        ?> 

        </div>
        
        <footer>
        <div class="fdown">
                © 2024 RailReserve. All rights reserved.
            </div>
        </footer>
    </div>

</body>
</html>