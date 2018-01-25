<!DOCTYPE html>
		<html>
		<head>
		</head>
		
		<body>
		<?php 
			
			$term = $_REQUEST['term'];
			$name = $_REQUEST['name'];

			
			$servername = "studentweb.liberty.k12.mo.us";
			$username = "webadm";
			$password = "b9FPBtY8";
			$dbname = "tsa";
			// Create connection
			$link = new mysqli($servername, $username, $password, $dbname);
			// Check connection
			if ($link->connect_error) {
   			die("Connection failed: " . $conn->connect_error);
			} 

			
			if($term[0] == "m" || $term[0] == "M")
			{  				
			$email = $_REQUEST['email'];
			$phone = $_REQUEST['phone'];
			$sql = "INSERT INTO members (name, email, phone) VALUES ('$name', '$email', '$phone')";
				if(mysqli_query($link, $sql)){
					ob_end_clean();
				   header("Location: php.php?term=m");
					exit();
				} else {
  			  		echo "ERROR: Could not execute $sql. " . mysqli_error($link);
				}
			}
			
			//competitions
			
			
			else if($term[0] == "c" || $term[0] == "C")
			{
				$members = $_REQUEST['members'];
				$sql = "INSERT INTO competition (name, members) VALUES ('$name', '$members')";
				if(mysqli_query($link, $sql)){
					ob_end_clean();
				   header("Location: php.php?term=c");
					exit();
				} else {
  			  		echo "ERROR: Could not execute $sql. " . mysqli_error($link);
				}
			}
			
			
			
			else if($term[0] == "s" || $term[0] == "S")
			{
			$name = $_REQUEST['name'];
			$event = $_REQUEST['event'];
			$sql = "INSERT INTO signup (name, event) VALUES ('$name', '$event')";	
			
			if(mysqli_query($link, $sql)){
				ob_end_clean( );
				   header("Location: php.php?term=f");
					exit();
				} else {
				echo "ERROR: Could not execute $sql. " . mysqli_error($link);				
			}
			}
			
			

			else if($term == "full")
			{
				$id = $_REQUEST['id'];
				$sql = "UPDATE fundraiser SET full = 1 - full WHERE id='$id'";
				if(mysqli_query($link, $sql)){
				ob_end_clean();
				   header("Location: php.php?term=f");
					exit();
				} else {
				echo "ERROR: Could not execute $sql. " . mysqli_error($link);				
			}
			}
			
			else if($term[0] == "f" || $term[0] == "F")
			{
			$name = $_REQUEST['name'];
			$date2 = DateTime::createFromFormat('d/m/Y', $_REQUEST['date']);
			$date = $date2->format('Y-m-d');

			$sql = "INSERT INTO fundraiser (name, date, full) VALUES ('$name', '$date', '0')";	
			
			if(mysqli_query($link, $sql)){
				ob_end_clean();
				   header("Location: php.php?term=f");
					exit();
				} else {
				echo "ERROR: Could not execute $sql. " . mysqli_error($link);				
			}
			}
			
			
			
			?>
			</body> 

			</html>