<?php
	session_start();
	include_once("../includes/db_connect.php");
	include_once("../includes/functions.php");
	if($_REQUEST[act]=="save_trainer")
	{
		save_trainer();
		exit;
	}
	if($_REQUEST[act]=="delete_trainer")
	{
		delete_trainer();
		exit;
	}
	if($_REQUEST[act]=="get_report")
	{
		get_report();
		exit;
	}
	###Code for save trainer#####
	function save_trainer()
	{
		global $con;
		$R=$_REQUEST;
		/////////////////////////////////////
		$image_name = $_FILES[trainer_image][name];
		$location = $_FILES[trainer_image][tmp_name];
		if($image_name!="")
		{
			move_uploaded_file($location,"../uploads/".$image_name);
		}
		else
		{
			$image_name = $R[avail_image];
		}
		//die;
		if($R[trainer_id])
		{
			$statement = "UPDATE `trainer` SET";
			$cond = "WHERE `trainer_id` = '$R[trainer_id]'";
			$msg = "Data Updated Successfully.";
			$condQuery = "";
		}
		else
		{
			$statement = "INSERT INTO `trainer` SET";
			$cond = "";
			$msg="Data saved successfully.";
		}
		$SQL=   $statement." 
				`trainer_name` = '$R[trainer_name]', 
				`trainer_add1` = '$R[trainer_add1]',
				`trainer_email` = '$R[trainer_email]', 
				`trainer_gender` = '$R[trainer_gender]', 
				`trainer_image` = '$image_name'". 
				 $cond;
		$rs = mysqli_query($con,$SQL) or die(mysqli_error($con));
		
		//// Creating Trainer Leaves /////
		if($R[trainer_id] == "") {
			$id = mysqli_insert_id($con);
		}
		
		if($_SESSION['login']!=1)
		{
			header("Location:../login.php?msg=You are registered successfully. Login with your credential !!!");
			exit;
		}
		else if($_SESSION['trainer_details']['trainer_level_id'] == 3) {
			header("Location:../trainer.php?trainer_id=".$_SESSION['trainer_details']['trainer_id']."&msg=Your account updated successfully !!!");
			exit;
		}
		header("Location:../trainer-report.php?msg=$msg");
	}
#########Function for delete trainer##########3
function delete_trainer()
{
	global $con;
	$SQL="SELECT * FROM trainer WHERE trainer_id = $_REQUEST[trainer_id]";
	$rs=mysqli_query($con, $SQL);
	$data=mysqli_fetch_assoc($rs);
	
	/////////Delete the record//////////
	$SQL="DELETE FROM trainer WHERE trainer_id = $_REQUEST[trainer_id]";
	mysqli_query($con,$SQL) or die(mysqli_error($con));
	
	//////////Delete the image///////////
	if($data[trainer_image])
	{
		unlink("../uploads/".$data[trainer_image]);
	}
	header("Location:../trainer-report.php?msg=Deleted Successfully.");
}
?>