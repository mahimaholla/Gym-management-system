 <?php 
	include_once("includes/header.php"); 
	if($_REQUEST[trainer_id])
	{
		$SQL="SELECT * FROM trainer WHERE trainer_id = $_REQUEST[trainer_id]";
		$rs=mysqli_query($con,$SQL) or die(mysqli_error($con));
		$data=mysqli_fetch_assoc($rs);
	}
?> 
<script>

jQuery(function() {
	jQuery( "#trainer_dob" ).datepicker({
	  changeMonth: true,
	  changeYear: true,
	   yearRange: "-65:-10",
	   dateFormat: 'd MM,yy'
	});
	jQuery('#frm_trainer').validate({
		rules: {
			trainer_confirm_password: {
				equalTo: '#trainer_password'
			}
		}
	});
});
function validateForm(obj) {
	if(validateEmail(obj.trainer_email.value))
		return true;
	jQuery('#error-msg').show();
	return false;
}
</script>
	<div class="crumb">
    </div>
    <div class="clear"></div>
	<div id="content_sec">
		<div class="col1">
			<div class="contact">
				<h4 class="heading colr">Trainer Registration</h4>
				<?php
				if($_REQUEST['msg']) { 
				?>
				<div class="msg"><?=$_REQUEST['msg']?></div>
				<?php
				}
				?>
				<div class="msg" style="display:none" id="error-msg">Enter valid EmailID !!!</div>
				<form action="lib/trainer.php" enctype="multipart/form-data" method="post" name="frm_trainer" onsubmit="return validateForm(this)">
					<ul class="forms">
						<li class="txt">Name</li>
						<li class="inputfield"><input name="trainer_name" type="text" class="bar" required value="<?=$data[trainer_name]?>"/></li>
					</ul>
					
					<ul class="forms">
						<li class="txt">Email</li>
						<li class="inputfield"><input name="trainer_email" id="trainer_email" type="text" class="bar" required value="<?=$data[trainer_email]?>" onchange="validateEmail(this)" /></li>
					</ul>
				
					<ul class="forms">
						<li class="txt">Address Line 1</li>
						<li class="inputfield"><input name="trainer_add1" type="text" class="bar" required value="<?=$data[trainer_add1]?>"/></li>
					</ul>
					<ul class="forms">
						<li class="txt">gender</li>
						<li class="inputfield"><input name="trainer_gender" type="text" class="bar" required value="<?=$data[trainer_gender]?>"/></li>
					</ul>
					
					<ul class="forms">
						<li class="txt">Photo</li>
						<li class="inputfield"><input name="trainer_image" type="file" class="bar"/></li>
					</ul>
					<div class="clear"></div>
					<ul class="forms">
						<li class="txt">&nbsp;</li>
						<li class="textfield"><input type="submit" value="Submit" class="simplebtn"></li>
						<li class="textfield"><input type="reset" value="Reset" class="resetbtn"></li>
					</ul>
					<input type="hidden" name="act" value="save_trainer">
					<input type="hidden" name="avail_image" value="<?=$data[trainer_image]?>">
					<input type="hidden" name="trainer_id" value="<?=$data[trainer_id]?>">
				</form>
			</div>
		</div>
		<div class="col2">
			<?php if($_REQUEST[trainer_id]) { ?>
			<div class="contactfinder">
				<h4 class="heading colr">Profile of <?=$data['trainer_name']?></h4>
				<div><img src="<?=$SERVER_PATH.'uploads/'.$data[trainer_image]?>" style="width: 250px"></div><br>
			</div> 
			<?php } ?>
		</div>
		<div class="col2">
			<?php include_once("includes/sidebar.php"); ?> 
		</div>
	</div>
<?php
	if($_SESSION['trainer_details']['trainer_level_id'] != 1)
	{
?>
	<script>
		jQuery( "#trainer_level_id" ).val(3);
		jQuery( "#trainer_level" ).hide();
	</script>
<?php		
	}
?>
<?php include_once("includes/footer.php"); ?> 