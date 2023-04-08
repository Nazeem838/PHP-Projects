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
    <title>Register</title>
</head>
<body>
    <div class="container">
        <div class="title">
            <h2>Registration</h2>
        </div>
        <?php
            if (isset($_POST["register"])) {
                
                $name = $_POST['name'];
                $username = $_POST['usrname'];
                $email = $_POST['email'];
                $password = $_POST['pswd'];
                $confirm_password = $_POST['cnfpswd'];
                $phone_number = $_POST['phno'];
                $error = array();

                if (empty($name) || empty($username) || empty($email) || empty($email) || empty($confirm_password) || empty($phone_number)) {
                    array_push($error, "All fields are required");
                }
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    array_push($error, "Enter valid Email ID");
                }
                if (strlen($password)<4) {
                    array_push($error, "Password must be greater than 4 character");
                }
                if ($password !== $confirm_password) {
                    array_push($error, "Password doesn't match");
                }
                
                $forUsername = "SELECT * FROM registration WHERE username = '$username'";
                $result = mysqli_query($conn, $forUsername);
                $rows = mysqli_num_rows($result);
                if ($rows>0) {
                    array_push($error, "Username already exist");
                }
                $forEmail = "SELECT * FROM registration WHERE email = '$email'";
                $result = mysqli_query($conn, $forEmail);
                $rows = mysqli_num_rows($result);
                if ($rows>0) {
                    array_push($error, "Email Id already exist");
                }
                $forNumber = "SELECT * FROM registration WHERE phone_number = '$phone_number'";
                $result = mysqli_query($conn, $forNumber);
                $rows = mysqli_num_rows($result);
                if ($rows>0) {
                    array_push($error, "Phone Number Already exist");
                }
                if (count($error)>0) {
                    foreach($error as $error){
                        echo "<div class='alert alert-danger' role='alert'>$error</div>";
                    }
                }else {
                    $query = "INSERT into registration values('$name', '$username', '$email', '$password', '$confirm_password', '$phone_number')";
                    $data = mysqli_query($conn, $query);
                    if ($data) {
                        echo "<div class='alert alert-success' role='alert'>Registration Successfull</div>";
                    }
                    else {
                        echo "Failed";
                    }
                }
            }

        ?>
        <form action="#" method="POST">
            <div class="form">
                <div class="input_field">
                    <label>Name:</label>
                    <input type="text" name="name" class="input" required>
                </div>
                <div class="input_field">
                    <label>Username:</label>
                    <input type="text" name="usrname" class="input" required>
                </div>
                <div class="input_field">
                    <label>Email:</label>
                    <input type="text" name="email" class="input" required>
                </div>
                <div class="input_field">
                    <label>Password:</label>
                    <input type="password" name="pswd" class="input" required>
                </div>
                <div class="input_field">
                    <label>Confirm Password:</label>
                    <input type="password" name="cnfpswd" class="input" required>
                </div>
                <div class="input_field">
                    <label>Phone Number:</label>
                    <input type="text" name="phno" class="input" required>
                </div>
                <div class="input_field">
                    <input type="submit" name="register" value="Register" class="btn">
                </div>
            </div>
        </form>
        <div class="signin">
            <p class="signin-link">Already have an Account?<a href="signin.php" class="signinlink"> Sign In</a></p>
        </div>
    </div>
</body>
</html>

