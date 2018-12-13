<?php 
session_start();
if(!isset($_SESSION['loggedInUser'])){
    //send them to login page
    header("location:Home.php");
}
include_once("includes/functions.php");
include_once("includes/connection.php");

if(isset($_POST['submit'])) {
	
    //storing the data in your database
	$book_name=$_POST['book_name'];
	$author=$_POST['author'];
	$genre=$_POST['genre'];
	$dop=$_POST['dop'];
	$agegroup=$_POST['agegroup'];
	$imgpath=$_POST['imgpath'];
	$sql="INSERT INTO bookdetails(book_name,author,genre,dop,agegroup,onshelf,imgpath) VALUES ('$book_name','$author','$genre','$dop','$agegroup','n','img/$imgpath')";
	$res=mysqli_query($conn,$sql);
	if($res) {
		//echo '<script> alert("Sign Up successful") </script>';
		header("location:Books.php");
	}
}

?>

<!DOCTYPE HTML>
<head>
	<title> Add book (Admin) </title>
	<link rel="stylesheet" href="addbook.css">
	<link rel="stylesheet" href="./css/style.css">
<link rel="stylesheet" href="./css/style1.css">
 <link rel="stylesheet" href="./css/style4.css">

 <link rel="stylesheet" href="./css/test2.css">
</head>
<body>
	<header>
        <img src="img/logo.png">
      <nav>
          <ul>
            
            <li><a href="Books.php">Books</a></li>
            <li><a href="Contact.php">Contact</a></li>
            <li class="current"><a href="Home.php">Sign Out</a></li>    
          </ul>
           </nav>
      
 </header>
 <section id="myForm">
	<h3>Add your book</h3>
	
	<form method="post" >
		<input type="name" name="book_name" id="book_name" placeholder="Book name" required><br><br>
		<input type="name" name="author" id="author" placeholder="Author" required><br><br>
		<input type="name" name="genre" id="genre" placeholder="Genre" required><br><br>
		<input type="date" name="dop" id="dop" required><br><br>
		<input type="number" name="agegroup" id="agegroup" placeholder="Age group till" required><br><br>
		<input type="file" name="imgpath" id="imgpath" placeholder="Image path" required><br><br>
		<button type="submit" name="submit" id="submit">Submit</button>
	</form>

  </section>
</body>