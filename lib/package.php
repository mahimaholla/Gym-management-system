<?php
	include_once("../includes/db_connect.php");
	include_once("../includes/functions.php");
	if($_REQUEST[act]=="save_package")
	{
		save_package();
		exit;
	}
	if($_REQUEST[act]=="delete_package")
	{
		delete_package();
		exit;
	}
	if($_REQUEST[act]=="update_package_status")
	{
		update_package_status();
		exit;
	}
	
	###Code for save package#####
	function save_package()
	{
		global $con;
		$R=$_REQUEST;						
		if($R[package_id])
		{
			$statement = "UPDATE `package` SET";
			$cond = "WHERE `package_id` = '$R[package_id]'";
			$msg = "Data Updated Successfully.";
		}
		else
		{
			$statement = "INSERT INTO `package` SET";
			$cond = "";
			$msg="Data saved successfully.";
		}
		$SQL=   $statement." 
				`package_title` = '$R[package_title]', 
				`package_fees` = '$R[package_fees]', 
				`package_description` = '$R[package_description]'". 
				 $cond;
		$rs = mysqli_query($con,$SQL) or die(mysqli_error($con));
		header("Location:../package-report.php?msg=$msg");
	}
#########Function for delete package##########3
function delete_package()
{	
	global $con;
	/////////Delete the record//////////
	$SQL="DELETE FROM package WHERE package_id = $_REQUEST[package_id]";
	mysqli_query($con,$SQL) or die(mysqli_error($con));
	header("Location:../package-report.php?msg=Deleted Successfully.");
}
?>