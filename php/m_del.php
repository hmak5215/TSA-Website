		<html>
		<head>

		
		<body>
		<?php 
			
			$term = $_REQUEST['term'];	
			
			$servername = "studentweb.liberty.k12.mo.us";
			$username = "webadm";
			$password = "b9FPBtY8";				
			$name = $_REQUEST['name'];
			$dbname = "tsa";
			// Create connection
			$link = new mysqli($servername, $username, $password, $dbname);
			// Check connection
			if ($link->connect_error) {
   			die("Connection failed: " . $conn->connect_error);
			} 
				$id = $_REQUEST['id'];
				$sql = "DELETE FROM members WHERE id = '$id'";
				if(mysqli_query($link, $sql)){
    				
			 	   ob_end_clean( );
				   header("Location: php.php?term=m");
					exit();
				} else {
  			  		echo "ERROR: Could not execute $sql. " . mysqli_error($link);
				}
			?>
			</body>
			</html>