<?php
	include_once("../includes/db_connect.php");
	include_once("../includes/functions.php");
	if($_REQUEST[act]=="save_payment")
	{
		save_payment();
		exit;
	}
	if($_REQUEST[act]=="delete_payment")
	{
		delete_payment();
		exit;
	}
	if($_REQUEST[act]=="update_payment_status")
	{
		update_payment_status();
		exit;
	}
	
	###Code for save payment#####
	function save_payment()
	{
		global $con;
		$R=$_REQUEST;						
		if($R[payment_id])
		{
			$statement = "UPDATE `payment` SET";
			$cond = "WHERE `payment_id` = '$R[payment_id]'";
			$msg = "Data Updated Successfully.";
		}
		else
		{
			$statement = "INSERT INTO `payment` SET";
			$cond = "";
			$msg="Data saved successfully.";
		}
		$SQL=   $statement." 
				`payment_user_id` = '$R[payment_user_id]', 
				`payment_for_month` = '$R[payment_for_month]', 
				`payment_date` = '$R[payment_date]', 
				`payment_amount` = '$R[payment_amount]', 
				`payment_description` = '$R[payment_description]'". 
				 $cond;
		$rs = mysqli_query($con,$SQL) or die(mysqli_error($con));
		header("Location:../payment-report.php?msg=$msg");
	}
#########Function for delete payment##########3
function delete_payment()
{	
	global $con;
	/////////Delete the record//////////
	$SQL="DELETE FROM payment WHERE payment_id = $_REQUEST[payment_id]";
	mysqli_query($con,$SQL) or die(mysqli_error($con));
	header("Location:../payment-report.php?msg=Deleted Successfully.");
}
?>