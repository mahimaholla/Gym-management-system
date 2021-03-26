<?php 
	include_once("includes/header.php"); 
	if($_REQUEST[package_id])
	{
		$SQL="SELECT * FROM `package` WHERE package_id = $_REQUEST[package_id]";
		$rs=mysqli_query($con,$SQL) or die(mysqli_error($con));
		$data=mysqli_fetch_assoc($rs);
	}
?>
	<div class="crumb">
    </div>
    <div class="clear"></div>
	<div id="content_sec">
		<div class="col1">
			<div class="contact">
				<h4 class="heading colr">Package Entry Form</h4>
				<?php if($_REQUEST['msg']) { ?>
					<div class="msg"><?=$_REQUEST['msg']?></div>
				<?php } ?>
				<form action="lib/package.php" enctype="multipart/form-data" method="post" name="frm_package">
					<ul class="forms">
						<li class="txt">Package Name</li>
						<li class="inputfield"><input name="package_title" id="package_title" type="text" class="bar" required value="<?=$data[package_title]?>"/></li>
					</ul>
					<ul class="forms">
						<li class="txt">Package Fees</li>
						<li class="inputfield"><input name="package_fees" id="package_fees" type="text" class="bar" required value="<?=$data[package_fees]?>"/></li>
					</ul>
					<ul class="forms">
						<li class="txt">Description</li>
						<li class="textfield"><textarea name="package_description" cols="" rows="6" required><?=$data[package_description]?></textarea></li>
					</ul>
					<div class="clear"></div>
					<ul class="forms">
						<li class="txt">&nbsp;</li>
						<li class="textfield"><input type="submit" value="Submit" class="simplebtn"></li>
						<li class="textfield"><input type="reset" value="Reset" class="resetbtn"></li>
					</ul>
					<input type="hidden" name="act" value="save_package">
					<input type="hidden" name="package_id" value="<?=$data[package_id]?>">
				</form>
			</div>
		</div>
		<div class="col2">
			<?php include_once("includes/sidebar.php"); ?> 
		</div>
	</div>
<?php include_once("includes/footer.php"); ?> 