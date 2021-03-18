<?php
//indicate that sessions are to be used or started
session_start();
$dbh = new mysqli('localhost', 'root', '123123', 'testphp');
 // Define $myusername and $mypassword from the form
$myusername=$_POST['Uname']; 
$mypassword=$_POST['Pass']; 
// Query
$result= $dbh->query("SELECT * FROM users WHERE usernamee='$myusername' AND passwordd='$mypassword';");
$row = $result-> fetch_assoc();
if($result-> num_rows >0){
	session_start();
	$_SESSION['myusername'] = $row['usernamee'];
	$_SESSION['mypassword'] = $row['passwordd'];
	$_SESSION['level'] = $row['levell'];

	// Redirect to appropriate page
	header("location:../index.php"); 
}
else{
	// $message = "wrong answer";
	// echo "<script type='text/javascript'>alert('$message');</script>";
	header("location:../View/login.html");
}
//flush the output buffer
ob_end_flush();
?>