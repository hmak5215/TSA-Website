<!DOCTYPE html>
	<html>
		<head>
			<link rel="stylesheet" type="text/css" href="css.css">
			<script
				src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js">             
			</script>
			
			
			<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>                   <!-- jquery calendar select-->
  			<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

			
			<script> 
				$(document).ready(function()
				{
					$(".editbutton").click(function()
					{
						$(".edit").toggle();
						$(".new").hide();
						$(".del").hide();
					});
					
					$(".newbutton").click(function()
					{
						$(".new").toggle();
						$(".edit").hide();                                 //jquery 
						$(".del").hide();
					});
					$(".delbutton").click(function()
					{
						$(".del").toggle();
						$(".edit").hide();
						$(".new").hide();
					});
					$(".newbutton2").click(function()
					{
						$(".new2").toggle();
					});
				});
			</script>
			
		 	<script>
 				 	$( function() {
   						 $( "#datepicker" ).datepicker({
   						     dateFormat: "dd/mm/yy"
   						     });
  					} );
  			</script>
			
			<script type="text/javascript">
				function delete_s(id)
				{
     				if(confirm('Are you sure you want to delete this row?'))
    				{
        				window.location.href='s_del.php?id='+id;
    			 	}
				}
				function delete_f(id)
				{
     				if(confirm('Are you sure you want to delete this row?'))
    				{
        				window.location.href='f_del.php?id='+id;
    			 	}
				}
				function delete_c(id)
				{
     				if(confirm('Are you sure you want to delete this row?'))
    				{
        				window.location.href='c_del.php?id='+id;
    			 	}
				}
				function delete_m(id)
				{
     				if(confirm('Are you sure you want to delete this row?'))
    				{
        				window.location.href='m_del.php?id='+id;
    			 	}
				}
				function toggleFull(id)
				{
					window.location.href='new.php?term=full&id='+id;
				}
				function goBack()
				{
					window.history.back();
				}
			</script>
			
		</head>
		
		
		
		<body>		
		<?php 
			
			$term = $_REQUEST['term'];
			
			$servername = "studentweb.liberty.k12.mo.us";
			$username = "webadm";
			$password = "b9FPBtY8";
			$dbname = "tsa";
			
			// Create connection
			$conn = new mysqli($servername, $username, $password, $dbname);
			// Check connection
			if ($conn->connect_error) {
   			die("Connection failed: " . $conn->connect_error);
			} 
















			////////////////
			//	Members   //
			////////////////










			if($term[0] == "m" || $term[0] == "M")
			{
			$sql = "SELECT id, name, email, phone FROM members ORDER BY name";
			$result = $conn->query($sql); ?>
					<a href="php.html"><button>Back</button></a>
					<br/>
					<table>
						<tr>
							<th> Name </th>
							<th> Email </th>
							<th> Phone </th>
						</tr>
				<?php
				while($row = $result->fetch_assoc()) 
				{?>

						<tr class="trlink" onclick="javascript:delete_m(<?php echo $row["id"]; ?>)">
							<td> <?php echo $row["name"] ?> </td>	
							<td> <?php echo $row["email"] ?> </td>
							<td> <?php echo $row["phone"] ?> </td>
						</tr>
					
		  <?php } ?>
		  
		<form action="new.php" method="post" name="term" value="member">	
		<tr class="new">
		 	<td> 
		 		<input type="text" name="name">
		 	</td>
		 	<td>
		 		<input type="text" name="email">
		 	</td>
		 	<td> 	
		 		<input type="text" name="phone">
		 		<div class="sub"><button name="term" value="member">Submit</button> </form> </div>
			</td>
		 </tr>
		 
		 <tr>
		 	<td class="newbutton">New Row</td>
		 </tr>
		 </table>
		   
		  <?php
		  }
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  ////////////////////////
		  //    Competitions    //
		  ////////////////////////
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  else if($term[0] == "c" || $term[0] == "C")
		  {
			$sql = "SELECT id, name, members FROM competition";
			$result = $conn->query($sql); ?>
			
					<a href="php.html"><button>Back</button></a>
					<br/>
					<table>
						<tr>
							<th class="comp"> Name </th>
							<th class="comp"> Members </th>
						</tr>
				<?php
				while($row = $result->fetch_assoc()) 
				{?>

						<tr class="trlink" onclick="javascript:delete_c(<?php echo $row["id"]; ?>)">
							<td class="comp"> <?php echo $row["name"] ?> </td>	
							<td class="comp"> <?php echo $row["members"] ?> </td>
						</tr>
					
		  <?php } ?>
		  
		  <form action="new.php" method="post">
		  <tr class="new">
		 	<td> 
		 		<input type="text" name="name">
		 	</td>
		 	<td> 
		 	<!--
		 		<?php
		 		$sql = "SELECT name FROM members";
		 		$result = $conn->query($sql);
		 		while($row = $result->fetch_assoc()){									
      			echo '<input type="checkbox" name="members[]" value="' . $row['name'] . '"' . '>' . $row['name'] . '</br>';	
      			}			
				 ?>
			-->
				<input type="text" name="members">
		 		
		 		
		 		
		 		<div class="sub"><button name="term" value="competition">Submit</button> </form> </div>
			</td>
		 </tr>
		 
		 <tr>
		 	<td class="newbutton">New Row</td>
		 </tr>
		</table>
		   
		   
		   
		  <?php
		  }
		  
		  
		  
		  
		  
		  
		  
		  
		//////////////////////////
		//		Fundraisers		//
		//////////////////////////
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  else if($term[0] == "f" || $term[0] == "F")
		  {
		  	$sql = "SELECT id, date, name, full FROM fundraiser";
			$result = $conn->query($sql); ?>
					<a href="php.html"><button>Back</button></a>
					<br/>
					<table>
						<tr>
							<th class="fund"> Name </th>
							<th class="fund"> Date </th>
							<th class="fund"> Full </th>
						</tr>
				<?php
				while($row = $result->fetch_assoc()) 
				{?>
						<tr>
						<td class="fund trlink" onclick="javascript:delete_f(<?php echo $row["id"]; ?>)"> <?php echo $row["name"]; ?> </td>
							<td class="fund trlink" onclick="javascript:delete_f(<?php echo $row["id"]; ?>)"> 
										<?php echo date("F d, Y", strtotime($row["date"])); ?> 
										</td>	
							
							<td class="fund trlink" onclick="javascript:toggleFull(<?php echo $row["id"]; ?>)"> <?php if($row["full"] == 0)
										{echo "Not Full";}
										else{echo "Full";}
						?> </td>
						</tr>
				 <?php } ?>	
		<form action="new.php" method="post" name="term" value="fundraiser">	
		<tr class="new2">
		 	<td> 
		 		<input type="text" name="name">
		 	</td>
		 	<td> 	
		 		<input type="text" name="date" id="datepicker">
		 		<div class="sub"><button name="term" value="fundraiser">Submit</button> </form> </div>
			</td>
		 </tr>
		 
		 <tr>
		 	<td class="newbutton2">New Row</td>
		 </tr>
					
				
		 </table>








		 <div style="margin:5%;"></div>
		 <?php
		 
		 $sql = "SELECT id, name, event FROM signup";
			$result = $conn->query($sql); ?>
					<table>
						<tr>
							<th class="signup"> Name </th>
							<th class="signup"> Fundraiser </th>
						</tr>
				
				<?php
				while($row = $result->fetch_assoc()) 
				{?>
					
						<tr class="trlink" onclick="javascript:delete_s(<?php echo $row["id"]; ?>)">
							<td class="signup"> <?php echo $row['name'] ?> </td>	
							<td class="signup"> <?php echo $row['event'] ?> </td>
						</tr>
				

					
			
		 <?php } ?>		


		 <form action="new.php" method="post">
		
	
		 <tr class="new">
		 	<td> 
		 		<div class="select-style">
				<select name="name">
				<option value="" disabled selected>Member...</option>
				<?php
		 		$sql = "SELECT name FROM members";
		 		$result = $conn->query($sql);
		 		while($row = $result->fetch_assoc()){									
      			echo '<option value="' . $row['name'] . '"' . '>' . $row['name'] . '</option>';	//fills select with members
      			}			
				 ?>
				
				</select>
				</div>
 				
		 	</td>
		 	<td> 	
		 		<div class="select-style">
		 		<select name="event">
		 		<option value="" disabled selected>Event...</option>
				<?php
		 		$sql = "SELECT name, full FROM fundraiser";
		 		$result = $conn->query($sql);
		 		while($row = $result->fetch_assoc()){	
		 		if($row['full'] == false)
		 			{								//fills select with events
      					echo '<option value="' . $row['name'] . '"' . '>' . $row['name'] . '</option>';
		 			}
				}
				 ?>
				
				</select>
				</div>
		 		<div class="sub"><button name="term" value="Signup">Submit</button> </form> </div>
			 </td>
		 </tr>
		 <tr>
		 	<td class="newbutton">New Row</td>
		 </tr>
		 </table>
		 
		 
		 
		 
		
				
		<?php }
		  ?>
		</body>
	</html>