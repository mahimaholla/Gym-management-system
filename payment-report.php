<?php 
	include_once("includes/header.php"); 
	include_once("includes/db_connect.php"); 
	$SQL="SELECT * FROM `payment`,`user`,`month` WHERE payment_for_month = month_id AND payment_user_id = user_id";
	$rs=mysqli_query($con,$SQL) or die(mysqli_error($con));
?>
<script>
function delete_payment(payment_id)
{
	if(confirm("Do you want to delete the payment?"))
	{
		this.document.frm_payment.payment_id.value=payment_id;
		this.document.frm_payment.act.value="delete_payment";
		this.document.frm_payment.submit();
	}
}
</script>
	<div class="crumb">
    </div>
    <div class="clear"></div>
	<div id="content_sec">
		<div class="col1" style="width:100%">
		<div class="contact">
			<h4 class="heading colr">Payment Report</h4>
			<?php
			if($_REQUEST['msg']) { 
			?>
				<div class="msg"><?=$_REQUEST['msg']?></div>
			<?php
			}
			?>
			<form name="frm_payment" action="lib/payment.php" method="post">
				<div class="static">
					<table style="width:100%">
					  <tbody>
					  <tr class="tablehead bold">
					    <td scope="col">ID</td>
						<td scope="col">Name</td>
						<td scope="col">Payment for Month</td>
						<td scope="col">Amount</td>
						<td scope="col">Date</td>
						<td scope="col">Action</td>
					  </tr>
					<?php 
					$sr_no=1;
					while($data = mysqli_fetch_assoc($rs))
					{
					?>
					  <tr>
						<td><?=$data[payment_id]?></td>
						<td><?=$data[user_username]?></td>
						<td><?=$data[month_name]?></td>
						<td><?=$data[payment_amount]?></td>
						<td><?=$data[payment_date]?></td>
						<td style="text-align:center">
							<a href="payment.php?payment_id=<?php echo $data[payment_id] ?>">Edit</a> | <a href="Javascript:delete_payment(<?=$data[payment_id]?>)">Delete</a> </td>
						</td>
					  </tr>
					<?php } ?>
					</tbody>
					</table>
				</div>
				<input type="hidden" name="act" />
				<input type="hidden" name="payment_id" />
			</form>
		</div>
		</div>
	</div>
<?php include_once("includes/footer.php"); ?> 