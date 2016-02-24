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
	
	$sql = "SELECT ID, NAME, BRAND, DESCRIPTION, PRICE FROM products";
	$result = mysqli_query($conn, $sql);

?>

<HTML>
<TITLE>
		Index
</TITLE>
<BODY>

		
	<?php
		if (mysqli_num_rows($result) > 0)
	{
		// Output data of each rows
		while($row = mysqli_fetch_assoc($result))
		{
			echo "Name: " . $row["NAME"] . "Price(&pound;): " . $row["PRICE"]. "<br>"; 
		}
	} else 
		{
			echo "0 results";
		}
	?>
	
</BODY>
</HTML>