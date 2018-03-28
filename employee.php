<?php
require('modules/connect.php');


$sql = "SELECT * FROM `user`";
$result = mysqli_query($conn, $sql);

while(row = mysqli_fetch_assoc($result)) {
	>?
		<div  class="card">
			
	
	
}
?>