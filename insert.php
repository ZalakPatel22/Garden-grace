<?php
	Include('db.php');
	
		$sql="insert into contact(name,email,message) values('".$_REQUEST['name']."','".$_REQUEST['email']."','".$_REQUEST['message']."')";
		
		$res=mysqli_query($conn,$sql);
		
		if($res)
		{
			echo "Record Insert Successfully";
			header( "Location: http://localhost/grace_g/Flower%20copy/contact.php" );
		}
		else
		{
			echo "There is some problem in inserting record";
		}
	mysqli_close($conn);  

?>
