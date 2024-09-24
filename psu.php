<?php
require("connection.php");
session_start();
if(isset($_POST["login"])){
    $user_exists = "SELECT * FROM user_logins WHERE username ='$_POST[username]' OR email = '$_POST[email]'";
    $result = mysqli_query($con,$user_exists);
    if($result){
        if(mysqli_num_rows($result) == 1){
            $result_fetch = mysqli_fetch_assoc($result);
            if($result_fetch['Pass'] == $_POST['pass']){
                $_SESSION['logged_in'] = true;
                $_SESSION['username'] = $result_fetch['Username'];
                $_SESSION['id'] = $result_fetch['ID'];
                header('location: index.php');
            }
            else{
                echo "<script>alert('Incorrect Password');
                window.location.href = 'login.php';</script>";
            }
        }
        else{
            echo "<script>alert('Username or Email not Registered.');
            window.location.href = 'login.php';</script>";
        }
    }
    else{
        echo "<script>alert('Cannot execute Query');
        window.location.href = 'login.php';</script>";
    }
}
//
if(isset($_POST['signup'])){
    $user_exists = "SELECT * FROM user_logins WHERE username ='$_POST[username]' OR email = '$_POST[email]'";
    $result = mysqli_query($con,$user_exists);
    if($result){
        if(mysqli_num_rows($result) > 0){
            $result_fetch = mysqli_fetch_assoc($result);
            if ($result_fetch['Username'] == $_POST['username']) {
                echo "<script>alert('" . $result_fetch['Username'] . " - Username already taken.');
                      window.location.href = 'signup.php';</script>";
            } else {
                echo "<script>alert('" . $result_fetch['Email'] . " - Email already registered.');
                      window.location.href = 'signup.php';</script>";
            }
            
        }
        else{
            $username = $_POST['username'];
            $gender = $_POST['gender1'];
            $email = $_POST['email'];
            $password = $_POST['pass'];
            $query = "INSERT INTO user_logins (username, gender, email, pass) VALUES ('$username', '$gender', '$email', '$password')";
            if(mysqli_query($con,$query)){
                echo "<script>alert('Registration Successful!');
                window.location.href = 'login.php';</script>";
            }
            else{   
                echo "<script>alert('Cannot execute Query');
                window.location.href = 'signup.php';</script>";
            }
        }
    }
    else{
        echo "<script>alert('Cannot execute Query');
        window.location.href = 'signup.php';</script>";
    }
}
?>