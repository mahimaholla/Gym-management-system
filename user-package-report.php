<?php 
	include_once("includes/header.php"); 
	include_once("includes/db_connect.php"); 
	$SQL="SELECT * FROM `package`";
	$rs=mysqli_query($con,$SQL) or die(mysqli_error($con));
?>
<script>
function delete_package(package_id)
{
	if(confirm("Do you want to delete the package?"))
	{
		this.document.frm_package.package_id.value=package_id;
		this.document.frm_package.act.value="delete_package";
		this.document.frm_package.submit();
	}
}
</script>
	<div class="crumb">
    </div>
    <div class="clear"></div>
	<div id="content_sec">
		<div class="col1" style="width:100%">
		<div class="contact">
			<h4 class="heading colr">Package Report</h4>
			<?php
			if($_REQUEST['msg']) { 
			?>
				<div class="msg"><?=$_REQUEST['msg']?></div>
			<?php
			}
			?>
			<form name="frm_package" action="lib/package.php" method="post">
				<div class="static">
					<table style="width:100%">
					  <tbody>
					  <tr class="tablehead bold">
					    <td scope="col">ID</td>
						<td scope="col">Name</td>
						<td scope="col">Fees</td>

					  </tr>
					<?php 
					$sr_no=1;
					while($data = mysqli_fetch_assoc($rs))
					{
					?>
					  <tr>
						<td><?=$data[package_id]?></td>
						<td><?=$data[package_title]?></td>
						<td><?=$data[package_title]?></td>
						<? if($_SESSION['user_details']['user_level_id'] == 1) { ?>
						
						</td>
						<?php } ?>
					  </tr>
					<?php  ?>
					</tbody>
					</table>
				</div>
				<input type="hidden" name="act" />
				<input type="hidden" name="package_id" />
			</form>
		</div>
		</div>
	</div>
<?php include_once("includes/footer.php"); ?> 