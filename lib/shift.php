<?php
	include_once("../includes/db_connect.php");
	include_once("../includes/functions.php");
	if($_REQUEST[act]=="save_shift")
	{
		save_shift();
		exit;
	}
	if($_REQUEST[act]=="delete_shift")
	{
		delete_shift();
		exit;
	}
	if($_REQUEST[act]=="update_shift_status")
	{
		update_shift_status();
		exit;
	}
	
	###Code for save shift#####
	function save_shift()
	{
		global $con;
		$R=$_REQUEST;						
		if($R[shift_id])
		{
			$statement = "UPDATE `shift` SET";
			$cond = "WHERE `shift_id` = '$R[shift_id]'";
			$msg = "Data Updated Successfully.";
		}
		else
		{
			$statement = "INSERT INTO `shift` SET";
			$cond = "";
			$msg="Data saved successfully.";
		}
		$SQL=   $statement." 
				`shift_title` = '$R[shift_title]', 
				`shift_from_time` = '$R[shift_from_time]',
				`shift_to_time` = '$R[shift_to_time]',				
				`shift_description` = '$R[shift_description]'". 
				 $cond;
		$rs = mysqli_query($con,$SQL) or die(mysqli_error($con));
		header("Location:../shift-report.php?msg=$msg");
	}
#########Function for delete shift##########3
function delete_shift()
{	
	global $con;
	/////////Delete the record//////////
	$SQL="DELETE FROM shift WHERE shift_id = $_REQUEST[shift_id]";
	mysqli_query($con,$SQL) or die(mysqli_error($con));
	header("Location:../shift-report.php?msg=Deleted Successfully.");
}
?>