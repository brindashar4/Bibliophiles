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

<title> Bibliophile | Books </title>
 <meta charset = "utf-8">
 <meta name="viewport" content="width=device-width">
 <meta name="description" content="A social cataloguing site">
 <meta name="keywords" content="Books, user-to-user recommendations">
 <meta name="Author" content="Avinash Bharadwaj">
 <link rel="stylesheet" href="./css/book.css">


 
 </head>
 
 <body>
 <header>
        <img src="img/logo.png">
			<nav>
      		<ul>
      			<li class="current"><a href="Main.php">Home </a></li>
      			<li><a href="about.php">About Us </a></li> 
      			<li><a href="Profile.php">My Profile</a></li>
      			<li class="current"><a href="logout.php">Sign Out</a></li>    
      		</ul>
      	   </nav>
</header>

<section id="bookshowcase">
	<div class="box">
		<div class="container">
			<h1>Harry Potter and the Philosopher's Stone</h1>
			<br>
				<img src="img/harrypotter.jpg">
					<div class="booksummary">
						<p>Harry Potter's life is miserable. His parents are dead and he's stuck with his heartless relatives, who force him to live in a tiny closet under the stairs. But his fortune changes when he receives a letter that tells him the truth about himself: he's a wizard. A mysterious visitor rescues him from his relatives and takes him to his new home, Hogwarts School of Witchcraft and Wizardry. After a lifetime of bottling up his magical powers, Harry finally feels like a normal kid. But even within the Wizarding community, he is special. He is the boy who lived: the only person to have ever survived a killing curse inflicted by the evil Lord Voldemort, who launched a brutal takeover of the Wizarding world, only to vanish after failing to kill Harry. Though Harry's first year at Hogwarts is the best of his life, not everything is perfect. There is a dangerous secret object hidden within the castle walls, and Harry believes it's his responsibility to prevent it from falling into evil hands. But doing so will bring him into contact with forces more terrifying than he ever could have imagined. Full of sympathetic characters, wildly imaginative situations, and countless exciting details, the first installment in the series assembles an unforgettable magical world and sets the stage for many high–stakes adventures to come.</p>
					</div>
						<div class="otherbookdetails">
							<nav>
								<form action="addb.php">
								<ul>
									<li>Author: J.K.Rowling</li>
									<li>Genre: Fantasy, Adventure, Children</li>
									<li><a href="https://www.amazon.in/Harry-Potter-Philosophers-Stone-Rowling/dp/1408855658/ref=sr_1_1?s=books&ie=UTF8&qid=1539715087&sr=1-1&keywords=harry+potter+and+the+philosopher%27s+stone+book" target="_blank"><button type="button" class="button_1">Buy on Amazon</button></a></li>
									<li><button type="submit" class="button_2"><?php 
										$_SESSION['book_id']=11;
									?>
									Add to Shelf</button></li>
								</ul>
								</form>
							</nav> 	
						</div>

					</div>
			</div>
</section>