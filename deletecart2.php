<?php
	Include('db.php');
	
	
		$id=$_POST["id"];
		echo "id:".$id;
		$sql="DELETE FROM cart WHERE shopid='$id'";
		
		$res=mysqli_query($conn,$sql);
		
		if($res)
		{
			echo "Record delete Successfully";
			//header("location: cart.php");
		}
		else
		{
			echo "There is some problem in inserting record";
		}
	mysqli_close($conn);  

?>