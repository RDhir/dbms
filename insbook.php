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



//{
	
	if(!empty($_POST['bno'])&&!empty($_POST['btype'])&&!empty($_POST['status'])&&!empty($_POST['name'])&&!empty($_POST['edition'])&&!empty($_POST['author'])&&!empty($_POST['price']))   //checking the 'user' name which is from Sign-In.html, is it empty or have some text
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
          {//echo "successful insert into book_type_price<br>";
          header('Location: successful.html');}
          else
           echo"unsuccessful book_type_price<br>";
           
           echo "ch8<br>";
           }


?>


