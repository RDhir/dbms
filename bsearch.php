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
$bn=$_POST['bname'];
$ed=$_POST['edition'];



//function SignIn($con)
//{
	//session_start();   //starting the session for user profile page
	if(!empty($_POST['bname']))   //checking the 'user' name which is from Sign-In.html, is it empty or have some text
	{
		echo "<br>ch4";
		$query1 = "SELECT *  FROM book_type where name like '$bn' OR author like '$bn';";
		//echo "<br>SELECT *  FROM book_type where name = ".$_POST['bname'] ." OR author = ". $_POST['bname'].";";
		echo $query1;
		$result1 = mysqli_query($con, $query1);
		//echo "<br>Query : " . $query1 . "<br>";
		echo $result['bno'];
		
		if ( false===$result1 )
		 {
		  header('Location: book_not_found.html ');
      		  printf("error: %s\n", mysqli_error($con));
 		}
		
		if (mysqli_num_rows($result1) > 0) 
			{
			$row1 = mysqli_fetch_assoc($result1);
		        echo "<br>not empty<br>";
		        }     
		$bn=$row1['bno'];        
		$query2= "SELECT *  FROM book where bno = '$bn';";
		echo $query2;
		$result2 = mysqli_query($con, $query2);
		
		if (mysqli_num_rows($result2) > 0) 
			{
			$row2 = mysqli_fetch_assoc($result2);
		        echo "<br>row2 not empty<br>";
		        } 
		
		if(!empty($_POST['edition'])) 
		  {
		    if($row2['edition']==$_POST['edition'] && $row2['status']=='y')
		    echo "<br>Book found";
		    
		    else
		    {
		     header('Location: book_not_found.html ');
		    }
		  }
		 else if($row2['status']=='y')
		 {
		 //echo "<br>book found"; 
	        header('Location: successful.html');
	        }else if($row2['status']=='n')
	        {header('Location: book_not_found.html ');}	  
	         	
		/*if (mysqli_num_rows($result) > 0) {
			$row = mysqli_fetch_assoc($result);
			
			echo "<br> row['uid'] " . $row['uid'] . "<br>";
			echo "<br>SUCCESSFULLY LOGIN TO USER PROFILE PAGE...<br>";
		} else {
			echo "SORRY... YOU ENTERD WRONG ID AND PASSWORD... PLEASE RETRY...";
		}*/
	}
//}


/*if(isset($_POST['bname']))
{
	echo " ch3** ";
	SignIn($con);
}*/


?>


