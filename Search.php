<?php 

ob_start();
  session_start();
  if(!isset($_SESSION['loggedInUser'])){
    //send the iser to login page
    header("location:Home.php");
}
	include_once("includes/functions.php");
	include_once("includes/connection.php");
?>

<!DOCTYPE HTML>
<html>
<head>

<title> Bibliophile | Search </title>
 <meta charset = "utf-8">
 <meta name="viewport" content="width=device-width">
 <meta name="description" content="A social cataloguing site">
 <meta name="keywords" content="Books, user-to-user recommendations">
 <meta name="Author" content="Avinash Bharadwaj">
<link rel="stylesheet" href="search.css">
<style>
      table{
        padding:5px;
        border:10px solid gray;
        margin-top:20px;
        margin-left:150px;
      }
      td,th{
        padding:15px;
      }
      
    </style>
     </head>
    <body>
  <header>
        <img src="img/logo.png">
      <nav>
          <ul>
            <li class="current"><a href="Main.php">Home </a></li>
            <li><a href="profile.php">My Profile</a></li>
            <li><a href="ViewCart.php">My Shelf</a></li>
            <li><a href="about.php">About Us </a></li> 
            <li class="current"><a href="logout.php">Sign Out</a></li>    
          </ul>
           </nav>
      
 </header>


    	<section id="showcase">
        
        <div class="container">
          <h1 >Search for your favorite titles here!</h1>
          
        </div>
      
      </section>
 
 <br>

   <section id="search">
   	<form method='POST' action='#'>
<nav>
	<ul>
<li><select name='type' required id='type' placeholder="Search by">
	<option value="Genre">Genre</option>
	<option value="Author">Author</option>
	<option value="Book name">Book name</option>
	<option value="Age">Age Group</option>
</select></li>


<li><input type='text' name='inp' required /></li>
<li><button type='submit' name='submit' class="button_1">Search</button></li>
</ul>
</nav>
</form>
</section>

<?php

	if(isset($_POST['submit'])) {
		
		if($_POST['type']=="Author") {
			$sql="SELECT * from bookdetails where author='".$_POST['inp']."'";
			$res=mysqli_query($conn,$sql);
		}
		elseif ($_POST['type']=="Genre") {
			$sql="SELECT * from bookdetails where genre='".$_POST['inp']."'";
			$res=mysqli_query($conn,$sql);
		}
		elseif ($_POST['type']=="Book name") {
			$sql="SELECT * from bookdetails where book_name='".$_POST['inp']."'";
			$res=mysqli_query($conn,$sql);
		}
		elseif ($_POST['type']=="Age") {
			$sql="SELECT * from bookdetails where agegroup <='".$_POST['inp']."'";
			$res=mysqli_query($conn,$sql);
		}
		if(mysqli_num_rows($res)>0) {
			echo "<table style='margin-left:90px'>";
			echo "<tr style='font-family:Trebuchet MS;color:#823a0a'>
			<th> Book cover </th>
			<th> Book name </th>
			<th> Author</th>
			<th> Genre </th>
			<th> Age group </th>
			<th>Rating</th>
			<th>Add To My Shelf</th></tr>";
			while($row=mysqli_fetch_assoc($res)) {
				echo "<tr style='font-family:Trebuchet MS;color:#823a0a'>";
				echo "<td><img src='".$row['imgpath']."' height=400 width=300 /></td>"; 
				echo "<td>" .$row['book_name']."</td>";
				echo "<td>" .$row['author']."</td>";
				echo "<td>" .$row['genre']."</td>";
				echo "<td>" .$row['agegroup']."</td>";
				echo "<td> 
					<form action = 'addb.php' method = 'POST'>
					<input type='text' name='rating' placeholder='Enter rating' required>
                        
				</td>";
				echo "<td>
					<input type = 'hidden' name = 'id1' value = '".$row['book_id']."'>
                        <input type = 'hidden' name = 'id2' value = '".$_SESSION['user_id']."'>
                        <button type='submit' class='button_2'>Add book</button>
        			
					</form>
				</td></tr>";
			}
			echo "</table>";
		}
		else {
			echo "<h3><b>No results to show</b></h3>";
		}
	}
?>