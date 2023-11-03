<!DOCTYPE html> 
<html> 
	
<head> 
	<title> 
		How to call PHP function 
		on the click of a Button ? 
	</title> 
</head> 

<body style="text-align:center;"> 
	
	<h1 style="color:green;"> 
		TESTING PHP DATABASE CONNECTION ! 
	</h1> 
	
	<h4> 
		LET'S PLAY WITH DATABASE !
	</h4> 

	<?php
	
$servername = "localhost";
$username = "premmistry_prem"; 
$password = "prem@9106"; 
$dbName = "premmistry_testing"; 

// Creating connection 
$conn = mysqli_connect($servername, 
		$username, $password, $dbName); 

// Checking connection 
if (!$conn) { 

	// If connecting fails 
	die("Connection failed: " . mysqli_connect_error()); 
} 


echo "Connection status: ";
echo " Connection established successfully..."; 


	if (isset($_POST['submit'])) { 
	
	
		$f_name = $_POST['f_name']; 
		$l_name = $_POST['l_name']; 
        $sql = "INSERT INTO emp(f_name,l_name)VALUES('".$f_name."','".$l_name."')"; 
	
	} 
		
		if(mysqli_query($conn, $sql)){  

 echo  "<br> Record inserted successfully </br>"   ;

    


}else{  

echo "Could not insert record: ". mysqli_error($conn);  

}  
	$result = mysqli_query($conn, "SELECT * FROM emp");	
		
	?> 
	
	
	
<p>Current Data in Database</p>
<table border="1" align=center>
    <tr>
       
        <th>First Name</th>
        <th>Last Name</th>
    </tr>
    <?php
    while ($row = mysqli_fetch_assoc($result)) {
       
      
        echo "<td>".$row['f_name']."</td>";
        echo "<td>".$row['l_name']."</td>";
        echo "</tr>";
    }
    ?>
</table>
	
	<form method="POST"> 
		<h4>Please enter your First Name : </h4> 
		<input type="text" name="f_name"><br> 
		<h4>Please enter your Last Name : </h4> 
		<input type="text" name="l_name"><br><br> 

		<input type="submit" value="Submit" name="submit"> 
	</form> 
	
</body> 

</html> 