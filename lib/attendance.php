<?php
	include_once("../includes/db_connect.php");
	include_once("../includes/functions.php");
	if($_REQUEST[act]=="save_attendance")
	{
		save_attendance();
		exit;
	}
	if($_REQUEST[act]=="delete_attendance")
	{
		delete_attendance();
		exit;
	}
	
	###Code for save attendance#####
	function save_attendance()
	{
		global $con;
		$R=$_REQUEST;						
		if($R[attendance_id])
		{
			$statement = "UPDATE `attendance` SET";
			$cond = "WHERE `attendance_id` = '$R[attendance_id]'";
			$msg = "Data Updated Successfully.";
		}
		else
		{
			$statement = "INSERT INTO `attendance` SET";
			$cond = "";
			$msg="Data saved successfully.";
		}
		$SQL=   $statement." 
				`attendance_user_id` = '$R[attendance_user_id]', 
				`attendance_date` = '$R[attendance_date]', 
				`attendance_description` = '$R[attendance_description]'". 
				 $cond;
		$rs = mysqli_query($con,$SQL) or die(mysqli_error($con));
		header("Location:../attendance-report.php?msg=$msg");
	}
#########Function for delete attendance##########3
function delete_attendance()
{	
	global $con;
	/////////Delete the record//////////
	$SQL="DELETE FROM attendance WHERE attendance_id = $_REQUEST[attendance_id]";
	mysqli_query($con,$SQL) or die(mysqli_error($con));
	header("Location:../attendance-report.php?msg=Deleted Successfully.");
}
?>