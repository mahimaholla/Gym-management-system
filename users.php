<?php 
	include_once("includes/header.php"); 
	include_once("includes/db_connect.php"); 
	$SQL="SELECT * FROM user";
	$rs=mysqli_query($con,$SQL) or die(mysqli_error($con));
	global $SERVER_PATH;
?>
<script>
function delete_user(user_id)
{
	if(confirm("Do you want to delete the user?"))
	{
		this.document.frm_user.user_id.value=user_id;
		this.document.frm_user.act.value="delete_user";
		this.document.frm_user.submit();
	}
}
</script>
	<div class="crumb">
    </div>
    <div class="clear"></div>
	<div id="content_sec">
		<div class="col1" style="width:100%">
		<div class="contact">
				<h4 class="heading colr">User Reports</h4>
			<form name="frm_user" action="lib/user.php" method="post">
				<div class="static">
					<table style="width:100%">
					  <tbody>
					  <tr class="tablehead bold">
					  	
						<td scope="col">Sr. No.</td>
						<td scope="col">Name</td>
						<td scope="col">Email</td>
						<td scope="col">address</td>
						<td scope="col">gender</td>
						<td scope="col">created_at</td>
					  </tr>
					<?php 
					$sr_no=1;
					 $sql = "CALL `GetAllusers`()";
					 $res=mysqli_query($con, $sql);
					while($data = mysqli_fetch_assoc($res))
					{
					?> <tr>
						<td style="text-align:center; font-weight:bold;"><?=$sr_no++?></td>
						
						<td><?=$data[user_username]?></td>
						<td><?=$data[user_email]?></td>
						<td><?=$data[user_add1]?></td>
						<td><?=$data[user_gender]?></td>
						<td><?=$data[created_at]?></td>
						</tr>
					<?php } ?>
					
					</tbody>
					</table>
				</div>
				<input type="hidden" name="act" />
				<input type="hidden" name="user_id" />
			</form>
		</div>
		</div>
	</div>
<?php  include_once("includes/footer.php"); ?> 