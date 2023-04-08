<?php include("connection.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <title>Sign In</title>
</head>
<body>
    <div class="container">
        <div class="title">
            <h2>Sign In</h2>
        </div>
        <?php
        session_start();
        if (isset($_POST["login"])) {
            $email = $_POST["email"];
            $pswd = $_POST["password"];
            
            $sql = "SELECT * FROM registration WHERE email = '$email' AND password = '$pswd'";
            $result = mysqli_query($conn, $sql);
            $user = mysqli_num_rows($result);
            if($user==1){
                $usrnamee = mysqli_fetch_array($result);
                $logname = $usrnamee['name'];
                $_SESSION['name'] = $logname;
                header("Location: success.php");
                die();
            }else{
                echo "<div class='alert alert-danger' role='alert'>User not Found or Password Incorrect</div>";
            }
        } 

        ?>
        <form action="" method="POST">
            <div class="form">
                <div class="input_field">
                    <label>Email:</label>
                    <input type="text" name="email" class="input">
                </div>
                <div class="input_field">
                    <label>Password:</label>
                    <input type="password" name="password" class="input">
                </div>
                <div class="input_field">
                    <input type="submit" name="login" value="Login" class="btn">
                </div>
            </div>
        </form>
        <div class="register">
            <p class="register-link">Want to Register?<a href="main.php" class="registerlink"> Register</a></p>
        </div>
    </div>
</body>
</html>