<?php
	include('db.php');  
         
		//$sql="insert into cart(productid,quantity,total,handle) values('".$_POST['productid']."','1','".$_POST['price']."','y')";
        // print_r("dixa");
        // print_r($_POST);
        // exit;
        $productid = $_POST['productid'];
        $price = $_POST['price'];
		$quantity = $_POST['quantity'];
        
        // print_r($productids);
        // print_r($prices);
        //  exit;
        $sql="insert into cart(productid,quantity,total,handle) values('$productid','1','$price','y')";
		$res=mysqli_query($conn,$sql);
		
		if($res)
		{
			echo "Record Insert Successfully";
			header( "Location: http://localhost/grace_g/flower/home.php" );
            exit;
		}
		else
		{
			echo "There is some problem in inserting record";
		}
	mysqli_close($conn);  

?>
