<?php
// database connection code
//$con = mysqli_connect('localhost', 'database_user', 'database_password','database');

$con = mysqli_connect("localhost", "root","","barista_cafe");

// get the post records
$txtName = $_POST['txtName'];
$txtEmail = $_POST['txtEmail'];
$txtAddress = $_POST['txtAddress'];
$txtFeedback = $_POST['txtFeedback'];

// database insert SQL code
$sql = "INSERT INTO `feedback_form` (`fdName`, `fdEmail`,`fdAddress`,`fdFeedback`) VALUES ('$txtName', '$txtEmail', '$txtAddress','$txtFeedback')";

// insert in database 
$rs = mysqli_query($con, $sql);

if($rs)
{
	echo "Thank you for your FeedBack!";
}

?>