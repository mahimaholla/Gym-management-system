<?php 
	include_once("includes/header.php"); 
	if($_REQUEST[payment_id])
	{
		$SQL="SELECT * FROM `payment` WHERE payment_id = $_REQUEST[payment_id]";
		$rs=mysqli_query($con,$SQL) or die(mysqli_error($con));
		$data=mysqli_fetch_assoc($rs);
	}
?>
<script>
jQuery(function() {
	jQuery( "#payment_date" ).datepicker({
	  changeMonth: true,
	  changeYear: true,
	   yearRange: "0:+1",
	   dateFormat: 'd MM,yy'
	});
});
</script> 
	<div class="crumb">
    </div>
    <div class="clear"></div>
	<div id="content_sec">
		<div class="col1">
			<div class="contact">
				<h4 class="heading colr">Payment Entry Form</h4>
				<?php if($_REQUEST['msg']) { ?>
					<div class="msg"><?=$_REQUEST['msg']?></div>
				<?php } ?>
				<form action="lib/payment.php" enctype="multipart/form-data" method="post" name="frm_payment">

					<ul class="forms">
						<li class="txt">Select Member</li>
						<li class="inputfield">
							<select name="payment_user_id" class="bar" required/>
								<?php echo get_new_optionlist("user","user_id","user_username",$data[payment_user_id]); ?>
							</select>
						</li>					
					</ul>

					<ul class="forms">
						<li class="txt">Payment for month</li>
						<li class="inputfield">
							<select name="payment_for_month" class="bar" required/>
								<?php echo get_new_optionlist("month","month_id","month_name",$data[payment_for_month]); ?>
							</select>
						</li>					
					</ul>
					<ul class="forms">
						<li class="txt">Payment Date</li>
						<li class="inputfield"><input name="payment_date" id="payment_date" type="text" class="bar" required value="<?=$data[payment_date]?>"/></li>
					</ul>
					<ul class="forms">
						<li class="txt">Payment Amount</li>
						<li class="inputfield"><input name="payment_amount" id="payment_amount" type="text" class="bar" required value="<?=$data[payment_amount]?>"/></li>
					</ul>
					<ul class="forms">
						<li class="txt">Description</li>
						<li class="textfield"><textarea name="payment_description" cols="" rows="6" required><?=$data[payment_description]?></textarea></li>
					</ul>
					<div class="clear"></div>
					<ul class="forms">
						<li class="txt">&nbsp;</li>
						<li class="textfield"><input type="submit" value="Submit" class="simplebtn"></li>
						<li class="textfield"><input type="reset" value="Reset" class="resetbtn"></li>
					</ul>
					<input type="hidden" name="act" value="save_payment">
					<input type="hidden" name="payment_id" value="<?=$data[payment_id]?>">
				</form>
			</div>
		</div>
		<div class="col2">
			<?php include_once("includes/sidebar.php"); ?> 
		</div>
	</div>
<?php include_once("includes/footer.php"); ?> 