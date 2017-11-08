<?php
define('DB_HOST', 'localhost');
define('DB_NAME', 'library');
define('DB_USER','root');
define('DB_PASSWORD','');

echo "ch1 ** ";
$con=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
//$db=mysqli_select_db($con,DB_NAME);
echo " ch2*8 ";


if (!$con) {
    die("Connection failed: " . $con->connect_error);
} 

//if(!$con)
//echo("not connected  ";
/*
if(!db)
echo(" db unconected ");
*/
/*
$ID = $_POST['user'];
$Password = $_POST['pass'];
*/
function SignIn($con)
{
	session_start();   //starting the session for user profile page
	if(!empty($_POST['user']))   //checking the 'user' name which is from Sign-In.html, is it empty or have some text
	{
		$query = "SELECT *  FROM username where uid = ".$_POST['user'] ." AND pass = ". $_POST['pass'].";";
		$result = mysqli_query($con, $query);
		echo "<br>Query : " . $query . "<br>";
		if (mysqli_num_rows($result) > 0) {
			$row = mysqli_fetch_assoc($result);
			
			if($row['type']=='s')
		header('Location: student.html');
			if($row['type']=='a')
			header('Location: index.html');
			if($row['type']=='f')
		        header('Location: faculty.html');
			echo "<br> row['uid'] " . $row['uid'] . "<br>". " password ".$row['pass']." type ".$row['type']."<br>";
			echo "<br>SUCCESSFULLY LOGIN TO USER PROFILE PAGE...<br>";
		 }else {
		        header('Location: password_incorrect.html ');
		        echo "<br> row['uid'] " . $row['uid'] . "<br>". " password ".$row['pass']." type ".$row['type']."<br>";
			echo "SORRY... YOU ENTERD WRONG ID AND PASSWORD... PLEASE RETRY...";
		}
	}
}
if(isset($_POST['user']))
{
	echo " ch3** ";
	SignIn($con);
}


?>


