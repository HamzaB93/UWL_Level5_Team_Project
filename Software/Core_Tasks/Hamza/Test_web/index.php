<?php
	$servername = "127.0.0.1";
	$username = "root";
	$password = "";
	$dbname = "team_project";
	
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	if (!$conn) 
	{
		die("Connection failed: " . mysqli_connect_error());
	}	
	
	$apple = 'Apples, Bag';	
	
	
	// sql to retrieve database data
	$sql = "SELECT ID, NAME, BRAND, DESCRIPTION, PRICE FROM products";
	
	// For apple
	$result = mysqli_query($conn, $sql);
	
	// For everything
	$result2 = mysqli_query($conn, $sql);
?>

<HTML>
<TITLE>
		Index
</TITLE>
<BODY>

		
	<?php
		// mysqli_num_rows gets number of rows in a result
		if (mysqli_num_rows($result) > 0)
		{
			// Output data of each rows
			while($row = mysqli_fetch_assoc($result))
			{
				if($row["NAME"] == $apple)
				{
					// echo the NAME and PRICE
					echo "Name: " . $row["NAME"] . "<br>" ."Price: &pound;" . $row["PRICE"]. "<br>"; 
				}
				
			}
		} else 
			{
				echo "0 results";
			}
	?>
	
	<br> Hello </br>
	
	<?php
		// mysqli_num_rows gets number of rows in a result
		if (mysqli_num_rows($result2) > 0)
		{
			// Output data of each rows
			while($row = mysqli_fetch_assoc($result2))
			{
					// echo the NAME and PRICE
					echo "Name: " . $row["NAME"] . "<br>" ."Price: &pound;" . $row["PRICE"]. "<br>"; 		
			}
		} else 
			{
				echo "0 results";
			}
	?>

</BODY>
</HTML>