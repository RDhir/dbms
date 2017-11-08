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
$bno1=$_POST['bno'];
$bt=$_POST['btype'];
$st=$_POST['status'];
$name1=$_POST['name'];

$ed=$_POST['edition'];
$au=$_POST['author'];
$pr=$_POST['price'];

echo "<br>hiiiiaaa";



//{
	
	if(!empty($_POST['bno'])&&!empty($_POST['btype']&&!empty($_POST['status']&&!empty($_POST['name']&&!empty($_POST['edition']&&!empty($_POST['author']&&!empty($_POST['price'])   //checking the 'user' name which is from Sign-In.html, is it empty or have some text
	{
		echo "<br>ch4";
		$query = "INSERT INTO book(bno,btype,status,edition) VALUES (?,?,?,?)";
        $stmt = mysqli_prepare($con,$query);
        $stmt->bind_param("iisi", $_POST['bno'], $_POST['btype'], $_POST['status'], $_POST['edition']);
        if($stmt->execute())
          {echo "successful insert into book<br>";}
          else
           echo"unsuccessful book<br>";
           
           echo "<br>ch5<br>";
           
           $query = "INSERT INTO book_type(bno,btype,name,author) VALUES (?,?,?,?)";
        $stmt = mysqli_prepare($con,$query);
        $stmt->bind_param("iiss", $_POST['bno'], $_POST['btype'], $_POST['name'], $_POST['author']);
        if($stmt->execute())
          {echo "successful insert into book_type<br>";}
          else
           echo"unsuccessful book_type<br>";
           
           echo "ch6<br>";
           
           
           $query = "INSERT INTO book_type_edition(edition,btype) VALUES (?,?)";
        $stmt = mysqli_prepare($con,$query);
        $stmt->bind_param("ii", $_POST['edition'], $_POST['btype']);
        if($stmt->execute())
          {echo "successful insert into book_type_edition<br>";}
          else
           echo"unsuccessful book_type_edition<br>";
           
           echo "ch7<br>";
           
           
           $query = "INSERT INTO book_type_price(price,btype) VALUES (?,?)";
        $stmt = mysqli_prepare($con,$query);
        $stmt->bind_param("ii", $_POST['price'], $_POST['btype']);
        if($stmt->execute())
          {echo "successful insert into book_type_price<br>";}
          else
           echo"unsuccessful book_type_price<br>";
           
           echo "ch8<br>";
           
           
          
           
           
           
		/*$query1 = "SELECT *  FROM book_type where name like '$bn' OR author like '$bn';";
		//echo "<br>SELECT *  FROM book_type where name = ".$_POST['bname'] ." OR author = ". $_POST['bname'].";";
		echo $query1;
		$result1 = mysqli_query($con, $query1);
		//echo "<br>Query : " . $query1 . "<br>";
		echo $result['bno'];
		
		if ( false===$result1 )
		 {
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
		    echo "<br>Book not found";
		  }
		 else if($row2['status']=='y')
		 echo "<br>book found"; 
	        	  
	         	
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
