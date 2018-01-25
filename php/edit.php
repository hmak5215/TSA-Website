<!DOCTYPE html>
		<html>
		<head>
		<style>

			
		</style>
		
		<body>
		<?php 
			
			$term = $_REQUEST['term'];
			$new = $_REQUEST['new'];
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
			?>
			<form action="php.php" method="post">
     	 		<button name="term" value="Members">Back</button>
       	 	</form>
       	 	
			<?php
			if($term[0] == "n" || $term[0] == "N")
			{
				$sql = "UPDATE members SET name=' $new ' WHERE name =' $name '";
				if(mysqli_query($link, $sql)){
    				echo "Updated";
				} else {
  			  		echo "ERROR: Could not execute $sql. " . mysqli_error($link);
				}
			}
			else if($term[0] == "E" || $term[0] == "e")
			{
				$sql = "UPDATE members SET email=' $new ' WHERE name=' $name '";
				if(mysqli_query($link, $sql)){
    				echo "Updated.";
				} else {
  			  		echo "ERROR: Could not execute $sql. " . mysqli_error($link);
				}
			}
			else if($term[0] == "p" || $term[0] == "P")
			{
				$sql = "UPDATE members SET phone=' $new ' WHERE name=' $name '";
				if(mysqli_query($link, $sql)){
    				echo "Updated.";
				} else {
  			  		echo "ERROR: Could not execute $sql. " . mysqli_error($link);
				}
			}
			}
			
			
			
			
			 ?> 
			 </body>
			</html>