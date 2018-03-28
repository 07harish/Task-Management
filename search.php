<?php
  //connect to mysql
  $server='localhost';
  $username='root';
  $password="";
  
  //$city=$_GET['city'];
  $bloodgroup=$_GET["bloodgroup"];
  $city=$_GET["city"];
  
  $row="";
  
  $connection=mysql_connect($server,$username,$password);
  
  if(!$connection)
  {
      echo "connection failed";
  }
  else
  {
      mysql_select_db("bloodbank",$connection) or die(mysql_error());
      if($bloodgroup=="oplus")
  	{
  	
      $query = "SELECT b.name,b.address,b.phoneno,o.units FROM blood_bank b,oplus o WHERE city='".$_GET['city']."' and b.register_id=o.register_id";
  	  
      $result=mysql_query("$query")  or die("Invalid query: " . mysql_error());
  	
  	 echo "<html><center>";
  	 echo "<table border='1' <tr><td>name</td><td>address</td><td>phoneno</td><td>units</td></tr>";
  	 while($row = mysql_fetch_array($result))
  	 {
  		
  	
  		echo "<tr><td> ".$row["name"]."</td><td>".$row["address"]."</td><td>".$row["phoneno"]."</td><td>".$row["units"]."</td></tr>";
  	
  	 }
  	echo "</table>";
  	 if(!$result)
  	{
  	$query="select name,phoneno from donor where city=$city and bloodgroup=$bloodgroup";
  	}
  	
  	}
  	
     else if($bloodgroup=="aplus")
  	{
  	
          $query = "SELECT b.name,b.address,b.phoneno,o.units FROM blood_bank b,aplus o WHERE city='".$_GET['city']."' and b.register_id=o.register_id";
  	  
      $result=mysql_query("$query")  or die("Invalid query: " . mysql_error());
  	echo "<html><center>";
  	 echo "<table border='1' <tr><td>name</td><td>address</td><td>phoneno</td><td>units</td></tr>";
  	 while($row = mysql_fetch_array($result))
  	 {
  		
  	
  		echo "<tr><td> ".$row["name"]."</td><td>".$row["address"]."</td><td>".$row["phoneno"]."</td><td>".$row["units"]."</td></tr>";
  	
  	 }
  	echo "</table>";
  	 
  	
  	}
  	
  	
  	
  	 else if($bloodgroup=="bplus")
  	{
  	
     
            $query = "SELECT b.name,b.address,b.phoneno,o.units FROM blood_bank b,bplus o WHERE city='".$_GET['city']."' and b.register_id=o.register_id";
  	  
      $result=mysql_query("$query")  or die("Invalid query: " . mysql_error());
  	
  	echo "<html><center>";
  	 echo "<table border='1' <tr><td>name</td><td>address</td><td>phoneno</td><td>units</td></tr>";
  	 while($row = mysql_fetch_array($result))
  	 {
  		
  	
  		echo "<tr><td> ".$row["name"]."</td><td>".$row["address"]."</td><td>".$row["phoneno"]."</td><td>".$row["units"]."</td></tr>";
  	
  	 }
  
  	echo "</table>";
  	}
  	
  	 else if($bloodgroup=="abplus")
  	{
  	
      
          $query = "SELECT b.name,b.address,b.phoneno,o.units FROM blood_bank b,abplus o WHERE city='".$_GET['city']."' and b.register_id=o.register_id";
  	  
      $result=mysql_query("$query")  or die("Invalid query: " . mysql_error());
  
  	echo "<html><center>";
  	 echo "<table border='1' <tr><td>name</td><td>address</td><td>phoneno</td><td>units</td></tr>";
  	 while($row = mysql_fetch_array($result))
  	 {
  		
  	
  		echo "<tr><td> ".$row["name"]."</td><td>".$row["address"]."</td><td>".$row["phoneno"]."</td><td>".$row["units"]."</td></tr>";
  	
  	 }
  	echo "</table>";
  	
  	
  	}
  	
  	
  	
  	 else if($bloodgroup=="aminus")
  	{
  	
          $query = "SELECT b.name,b.address,b.phoneno,o.units FROM blood_bank b,aminus o WHERE city='".$_GET['city']."' and b.register_id=o.register_id";
  	  
      $result=mysql_query("$query")  or die("Invalid query: " . mysql_error());
  	echo "<html><center>";
  	 echo "<table border='1' <tr><td>name</td><td>address</td><td>phoneno</td><td>units</td></tr>";
  	 while($row = mysql_fetch_array($result))
  	 {
  		
  	
  		echo "<tr><td> ".$row["name"]."</td><td>".$row["address"]."</td><td>".$row["phoneno"]."</td><td>".$row["units"]."</td></tr>";
  	
  	 }
  	echo "</table>";
  	 
  	}
  	
  	
  	 else if($bloodgroup=="abminus")
  	{
  	
     
          $query = "SELECT b.name,b.address,b.phoneno,o.units FROM blood_bank b,abminus o WHERE city='".$_GET['city']."' and b.register_id=o.register_id";
  	  
      $result=mysql_query("$query")  or die("Invalid query: " . mysql_error());
  
  	 echo "<html><center>";
  	 echo "<table border='1' <tr><td>name</td><td>address</td><td>phoneno</td><td>units</td></tr>";
  	 while($row = mysql_fetch_array($result))
  	 {
  		
  	
  		echo "<tr><td> ".$row["name"]."</td><td>".$row["address"]."</td><td>".$row["phoneno"]."</td><td>".$row["units"]."</td></tr>";
  	
  	 }
  	echo "</table>";
  	
  	
  	}
  	
  	
  	
  	 else if($bloodgroup=="ominus")
  	{
  	
    
          $query = "SELECT b.name,b.address,b.phoneno,o.units FROM blood_bank b,ominus o WHERE city='".$_GET['city']."' and b.register_id=o.register_id";
  	  
      $result=mysql_query("$query")  or die("Invalid query: " . mysql_error());
  	echo "<html><center>";
  	 echo "<table border='1' <tr><td>name</td><td>address</td><td>phoneno</td><td>units</td></tr>";
  	 while($row = mysql_fetch_array($result))
  	 {
  		
  	
  		echo "<tr><td> ".$row["name"]."</td><td>".$row["address"]."</td><td>".$row["phoneno"]."</td><td>".$row["units"]."</td></tr>";
  	
  	 }
  	echo "</table>";
  	
     
  }
  	
  	
  	 else if($bloodgroup=="bminus")
  	{
  	
      
          $query = "SELECT b.name,b.address,b.phoneno,o.units FROM blood_bank b,abminus o WHERE city='".$_GET['city']."' and b.register_id=o.register_id";
  	  
      $result=mysql_query("$query")  or die("Invalid query: " . mysql_error());
  	echo "<html><center>";
  	 echo "<table border='1' <tr><td>name</td><td>address</td><td>phoneno</td><td>units</td></tr>";
  	 while($row = mysql_fetch_array($result))
  	 {
  		
  	
  		echo "<tr><td> ".$row["name"]."</td><td>".$row["address"]."</td><td>".$row["phoneno"]."</td><td>".$row["units"]."</td></tr>";
  	
  	 }
  	echo "</table>";
  	 
  	 mysql_close($connection);
  }
  	}
  ?>
<html>
  <style>   a:link, a:visited {
    background-color: #639fff;
    color: #cfffd3;
    padding: 2px 40px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    }
    a:hover, a:active {
    background-color: #224aef;
    }
    body {-webkit-animation: pulse 10s infinite;animation: pulse 10s infinite;}
    @-webkit-keyframes pulse {
    0% {background:#c3c3c3}
    25% {background:#fac0d4}
    50% {background:#ff86f6}
    75% {background:#959eff}
    100% {background:#9bff93}
    }
    @keyframes pulse {
    0% {background:#c3c3c3}
    25% {background:#fac0d4}
    50% {background:#ff86f6}
    75% {background:#959eff}
    100% {background:#9bff93}
    }
    table { 
    font-family: monospace;
    font-size: 18px;
    color: #000000;
    letter-spacing: 1px;
    }
    table, td, th {    
    border: 1px solid #3b3b3b;
    text-align: left;
    }
    table {
    border-collapse: collapse;
    width: 80%;
    }
    th, td {
    padding: 20px;
    }
  </style>
  <body>
    <a class="btn btn-lg btn-primary btn-block" href="search.html" style="float:right">Back</a><br>
  </body>
</html>