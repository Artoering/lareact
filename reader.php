<meta http-equiv="refresh" content="1" />
<?php 
tes
$servername = "localhost";
$username = "GaNuG";
$password = "SecretCode21";
$dbname = "test";

// Connect to mysql server
$conn = mysqli_connect($servername,$username,$password ) 
  or die("Connection failed! ".mysqli_error());

// Select database
mysqli_select_db($conn,$dbname) 
  or die ("Database selection failed! ".mysqli_error());  

$sql = "SELECT * FROM writeread ORDER BY logdata";
$result = mysqli_query($conn,$sql)
  or die("Invalid query: ".mysqli_error());  
$num_rows = mysqli_num_rows($result);  

if ($num_rows > 0) {  
  echo "<table border='2'><tr><th>Log Date</th><th>Finger #ID</th><th>Confidense</th></tr>";
  while ($row = mysqli_fetch_assoc($result)) {  
    echo "<tr>";
    echo "<td>".$row['logdata']."</td>";
    echo "<td>".$row['field']."</td>";
    echo "<td>".$row['value']."</td>";
    echo "</tr>";
  }  
echo "</table>";     
echo "Number of rows = ".$num_rows;
} 
else {
  echo ("No rows returned");
}  

mysqli_close($conn);

?>