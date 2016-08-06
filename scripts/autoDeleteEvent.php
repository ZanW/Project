 <?php

echo "Current time is " . date("h:i:sa") . "\r\n";
echo "Checking if any messages needs to DELETEDE" . "\r\n";

$servername = "localhost";
$username = "shivam";
$password = "pass";
$dbname = "warmup_project";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM content WHERE auto_delete = 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) 
	{
  		if ($row["auto_delete"] == 1)  
	 		{	
 			echo "This/these row is/are going to be DELETED";
			echo $row["id"]."  ".$row["post_message"]."   ".$row["POWON_id"]."  \r\n";
 	 		}
	} 
}
$sql = "DELETE FROM content where auto_delete = 1";
$result = $conn->query($sql);

$conn->close();
?> 
