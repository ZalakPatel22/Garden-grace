<?php
	Include('db.php');
	
		$sql="insert into review(name,email,review) values('".$_REQUEST['name']."','".$_REQUEST['email']."','".$_REQUEST['review']."')";
		$sql = "INSERT INTO review (name, email, review) VALUES ('".$_REQUEST['name']."','".$_REQUEST['email']."','".$_REQUEST['review']."')";

		$res=mysqli_query($conn,$sql);
		
		if($res)
		{
			echo "Record Insert Successfully";
			header( "http://localhost/grace_g/Flower%20copy/review.php" );
		}
		else
		{
			echo "There is some problem in inserting record";
		}
	mysqli_close($conn);  

?>
