<?php
	session_start();
	include_once("../includes/db_connect.php");
	include_once("../includes/functions.php");
	if($_REQUEST[act]=="save_user")
	{
		save_user();
		exit;
	}
	if($_REQUEST[act]=="delete_user")
	{
		delete_user();
		exit;
	}
	if($_REQUEST[act]=="get_report")
	{
		get_report();
		exit;
	}
	###Code for save user#####
	function save_user()
	{
		global $con;
		$R=$_REQUEST;
		/////////////////////////////////////
		$image_name = $_FILES[user_image][name];
		$location = $_FILES[user_image][tmp_name];
		if($image_name!="")
		{
			move_uploaded_file($location,"../uploads/".$image_name);
		}
		else
		{
			$image_name = $R[avail_image];
		}
		//die;
		if($R[user_id])
		{
			$statement = "UPDATE `user` SET";
			$cond = "WHERE `user_id` = '$R[user_id]'";
			$msg = "Data Updated Successfully.";
			$condQuery = "";
		}
		else
		{
			$statement = "INSERT INTO `user` SET";
			$cond = "";
			$msg="Data saved successfully.";
		}
		$SQL=   $statement." 
				`user_level_id` = '3',
				`user_username` = '$R[user_username]', 
				`user_password` = '$R[user_password]',
				`user_shift_id` = '$R[user_shift_id]', 
				`user_package_id` = '$R[user_package_id]', 
				`user_add1` = '$R[user_add1]', 
				`user_email` = '$R[user_email]',  
				`user_gender` = '$R[user_gender]', 
				`user_image` = '$image_name'". 
				 $cond;
		$rs = mysqli_query($con,$SQL) or die(mysqli_error($con));
		
		//// Creating User Leaves /////
		if($R[user_id] == "") {
			$id = mysqli_insert_id($con);
		}
		
		if($_SESSION['login']!=1)
		{
			header("Location:../login.php?msg=You are registered successfully. Login with your credential !!!");
			exit;
		}
		else if($_SESSION['user_details']['user_level_id'] == 3) {
			header("Location:../user.php?user_id=".$_SESSION['user_details']['user_id']."&msg=Your account updated successfully !!!");
			exit;
		}
		header("Location:../user-report.php?msg=$msg");
	}
#########Function for delete user##########3
function delete_user()
{
	global $con;
	$SQL="SELECT * FROM user WHERE user_id = $_REQUEST[user_id]";
	$rs=mysqli_query($con, $SQL);
	$data=mysqli_fetch_assoc($rs);
	
	/////////Delete the record//////////
	$SQL="DELETE FROM user WHERE user_id = $_REQUEST[user_id]";
	mysqli_query($con,$SQL) or die(mysqli_error($con));
	
	//////////Delete the image///////////
	if($data[user_image])
	{
		unlink("../uploads/".$data[user_image]);
	}
	header("Location:../user-report.php?msg=Deleted Successfully.");
}
?>