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
	
	
	echo "inside1<br>";
	
	$query3= "SELECT *  FROM book where bno = '$b';";
		echo $query3;
		$result3 = mysqli_query($con, $query3);
		
		if (mysqli_num_rows($result3) > 0) 
			{
			$row3 = mysqli_fetch_assoc($result3);
		        echo "<br>row3 not empty<br>";
		        } 
		echo "<br>ch43";
		
	$query2= "SELECT *  FROM username where uid = '$bn';";
		echo $query2;
		$result2 = mysqli_query($con, $query2);
		
		if (mysqli_num_rows($result2) > 0 ) 
			{
			$row2 = mysqli_fetch_assoc($result2);
		        echo "<br>row2 not empty type =".$row2['type']." status ".$row3['status']."<br>";
		        } 
		echo "<br>ch4";
		
		  if($row2['type']==s && $row3['status']==y)
		  {
		  
		  $query4= "SELECT COUNT(*) AS c  FROM student where regno = '$bn' && date_of_return IS NULL;";
		echo $query4;
		$result4 = mysqli_query($con, $query4);
		
		if (mysqli_num_rows($result4) > 0) 
			{
			$row4 = mysqli_fetch_assoc($result4);
		        echo "<br>row4 not empty<br>";
		        } 
		echo "<br>count".$row4['c']."<br>";
	if($row4['c']<6)
	{	  
		echo "hihi<br>";
		$query = "INSERT INTO student(regno,name,bno,date_of_return,date_of_issue) VALUES (?,?,?,?,CURDATE())";
        $stmt = mysqli_prepare($con,$query);
        $stmt->bind_param("isis", $_POST['rno'], $row2['name'], $_POST['bno'], $n);
        if($stmt->execute())
          {echo "successful insert into student<br>";}
          else
           echo"unsuccessful student<br>".$stmt->error."<br>";
           
              $sql = "UPDATE book  SET status='n' WHERE bno='$b'";
              
           if (mysqli_query($con, $sql)) {
    	//echo "Record updated successfully";
    	header('Location: successful.html');
	} else {
    	echo "Error updating record: " . mysqli_error($con);
	}
           
           echo "<br>ch5<br>";
         
         }else { header('Location: unsuccessful.html');}  
          }else if($row2['type']==s && $row3['status']==n) { 
          echo "unsuccesssful <br>";
          header('Location: unsuccessful.html');
          }
          
           if($row2['type']==f&& $row3['status']==y)
		  {
		echo "hihi5<br>";
		$query = "INSERT INTO faculty(fac_id,name,bno,date_of_return,date_of_issue) VALUES (?,?,?,?,CURDATE())";
        $stmt = mysqli_prepare($con,$query);
        $stmt->bind_param("isis", $_POST['rno'], $row2['name'], $_POST['bno'], $n);
        if($stmt->execute())
          {echo "successful insert into faculty<br>";}
          else
           echo"unsuccessful faculty<br>";
           
              $sql = "UPDATE book  SET status='n' WHERE bno='$b'";
              
           if (mysqli_query($con, $sql)) {
   	 //echo "Record updated successfully";
	 header('Location: successful.html');
		} else {
  	  echo "Error updating record: " . mysqli_error($con);
		}
           
           echo "<br>ch55<br>";
           
          }else if($row2['type']==f&& $row3['status']==n) { 
          echo "unsuccesssful <br>";
          header('Location: unsuccessful.html');
          }
          
        
     }
  

?>
