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
echo "<br>hiiiiaaa";
$bn=$_POST['rno'];
$n=null;
$b=$_POST['bno'];




//{
	
	if(!empty($_POST['bno'])&&!empty($_POST['rno']))   //checking the 'user' name which is from Sign-In.html, is it empty or have some text
	{
	$query2= "SELECT *  FROM username where uid = '$bn';";
		echo $query2;
		$result2 = mysqli_query($con, $query2);
		
		if (mysqli_num_rows($result2) > 0) 
			{
			$row2 = mysqli_fetch_assoc($result2);
		        echo "<br>row2 not empty<br>";
		        } 
		echo "<br>ch4";
		
		  if($row2['type']==s)
		  {
		//echo "hihi<br>";
		
            $query5= "SELECT *  FROM student where regno = '$bn' and bno='$b';";
		echo $query5;
		$result5 = mysqli_query($con, $query5);
		
		if (mysqli_num_rows($result5) > 0) 
			{
			$row5 = mysqli_fetch_assoc($result5);
		        echo "<br>row5 not empty<br>";
		        echo "b== ".$b." row bno ".$row5['bno']."<br>";
		        } 
		
		if($row5['bno']==$b)
		
		{
            $sql = "UPDATE student  SET date_of_return=CURDATE() WHERE regno='$bn' and bno='$b'";

	if (mysqli_query($con, $sql)) {
	    echo "Record updated successfully";
					} 
	 else {
	    echo "Error updating record: " . mysqli_error($con);
               }
               $sql = "UPDATE book  SET status='y' WHERE bno='$b'";

if (mysqli_query($con, $sql)) {
   // echo "Record updated successfully";
header('Location: successful.html');
} else {
    echo "Error updating record: " . mysqli_error($con);
}
           echo "<br>ch5<br>";
           } else {header('Location: unsuccessful.html');}
          }
          
           if($row2['type']==f)
		  {
		echo "hihi5<br>";
		 $query5= "SELECT *  FROM faculty where fac_id = '$bn' and bno='$b';";
		echo $query5;
		$result5 = mysqli_query($con, $query5);
		
		if (mysqli_num_rows($result5) > 0) 
			{
			$row5 = mysqli_fetch_assoc($result5);
		        echo "<br>row5 not empty<br>";
		        } 
		
		if($row5['bno']==$b)
		{
		$sql = "UPDATE faculty  SET date_of_return=CURDATE() WHERE fac_id='$bn' and bno='$b'";

	if (mysqli_query($con, $sql)) {
	    echo "Record updated successfully";
					} 
	 else {
	    echo "Error updating record: " . mysqli_error($con);
               }
               $sql = "UPDATE book  SET status='y' WHERE bno='$b'";

if (mysqli_query($con, $sql)) {
   // echo "Record updated successfully";
 header('Location: successful.html');
} else {
    echo "Error updating record: " . mysqli_error($con);
}
           
           echo "<br>ch55<br>";
           }
           else {header('Location: unsuccessful.html');}
          }
           
         
     }      
  

?>
