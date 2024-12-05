<?php
	Include('db.php');
	
		$sql="insert into contact(name,email,message) values('".$_REQUEST['name']."','".$_REQUEST['email']."','".$_REQUEST['meassage']."')";
		$sql = "INSERT INTO chackout (firstname, lastname, companyname, address, city, country, postcode, mobile, emailaddress) VALUES ('".$_REQUEST['firstname']."','".$_REQUEST['lastname']."','".$_REQUEST['companyname']."','".$_REQUEST['address']."','".$_REQUEST['city']."','".$_REQUEST['country']."','".$_REQUEST['postcode']."','".$_REQUEST['mobile']."','".$_REQUEST['emailaddress']."')";

		$res=mysqli_query($conn,$sql);
		
		if($res)
		{
			echo "Record Insert Successfully";
			header( "Location: http://localhost/grace_g/Flower%20copy/chackout.php" );
		}
		else
		{
			echo "There is some problem in inserting record";
		}
	mysqli_close($conn);  

?>
