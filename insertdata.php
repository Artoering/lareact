
<!DOCTYPE html>
<html>

<?php
echo "Access OK";
echo "<br>"; //newline

if (isset($_GET['data'])){
	$data = $_GET['data'];
	
	echo $data;
}
else{
	echo "Data not received";
}

//Connect to database

?>

</html>