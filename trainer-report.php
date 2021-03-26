<?php 
	include_once("includes/header.php"); 
	include_once("includes/db_connect.php"); 
	$SQL="SELECT * FROM trainer";
	$rs=mysqli_query($con,$SQL) or die(mysqli_error($con));
	global $SERVER_PATH;
?>
<script>
function delete_trainer(trainer_id)
{
	if(confirm("Do you want to delete the trainer?"))
	{
		this.document.frm_trainer.trainer_id.value=trainer_id;
		this.document.frm_trainer.act.value="delete_trainer";
		this.document.frm_trainer.submit();
	}
}
</script>
	<div class="crumb">
    </div>
    <div class="clear"></div>
	<div id="content_sec">
		<div class="col1" style="width:100%">
		<div class="contact">
				<h4 class="heading colr">Trainer Reports</h4>
			<form name="frm_trainer" action="lib/trainer.php" method="post">
				<div class="static">
					<table style="width:100%">
					  <tbody>
					  <tr class="tablehead bold">
						<td scope="col">Sr. No.</td>
						<td scope="col">Image</td>
						<td scope="col">Name</td>
						<td scope="col">Email</td>
						<td scope="col">gender</td>
						<td scope="col">Action</td>
					  </tr>
					<?php 
					$sr_no=1;
					while($data = mysqli_fetch_assoc($rs))
					{
					?>
					  <tr>
						<td style="text-align:center; font-weight:bold;"><?=$sr_no++?></td>
						<td><img src="<?=$SERVER_PATH.'uploads/'.$data[trainer_image]?>" style="heigh:50px; width:50px"></td>
						<td><?=$data[trainer_name]?></td>
						<td><?=$data[trainer_email]?></td>
						<td><?=$data[trainer_gender]?></td>
						<td style="text-align:center"><a href="trainer.php?trainer_id=<?php echo $data[trainer_id] ?>">Edit</a> | <a href="Javascript:delete_trainer(<?=$data[trainer_id]?>)">Delete</a> </td>
					  </tr>
					<?php } ?>
					</tbody>
					</table>
				</div>
				<input type="hidden" name="act" />
				<input type="hidden" name="trainer_id" />
			</form>
		</div>
		</div>
	</div>
<?php include_once("includes/footer.php"); ?> 