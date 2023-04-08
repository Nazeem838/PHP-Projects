<?php
// database connection code
//$con = mysqli_connect('localhost', 'database_user', 'database_password','database');

    $conn = mysqli_connect("localhost", "root","","barista_cafe");

    // echo "connection was successful";

    // get the post records
    $rName = $_POST['rName'];
    $rAddress = $_POST['rAddress'];
    $rStoreLocation = $_POST['rStoreLocation'];
    $rEmail = $_POST['rEmail'];
    $rPhoneNo = $_POST['rPhoneNo'];
    $rDate = $_POST['rDate'];

    if (!$conn)
    {
        die("Connection failed!" . mysqli_connect_error());
    }

    // using sql to create a data entry query
    $sql = "INSERT INTO `register` (`rName`, `rAddress`, `rStoreLocation`, `rEmail`, `rPhoneNo`,`rDate`) VALUES ('$rName', '$rAddress', '$rStoreLocation', '$rEmail' ,'$rPhoneNo' , '$rDate')";
  
    // send query to the database to add values and confirm if successful
    $rs = mysqli_query($conn, $sql);
    if($rs)
    {
        echo "Entries added!";
    }
  
    // close connection
    // mysqli_close($conn);

?>