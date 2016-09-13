<?php
include ('../template/header.php');
include ('../include/functions.php');
?>
<div class="container" style="margin-top:50px">
	<div class="row">
		<div class="col-sm-3">
			<h3>Menu </h3>
		</div>
		<div class="col-sm-9">
			<h3>View category</h3>
			<?php
				$category = getProducts();
			?>
			<table class="table table-condensed table-striped">
					<tr>
						<th>Category ID</th>
						<th>Category Name</th>
						<th>Description</th>
						<th>Action</th>
						<th>image</th>
					</tr>
			<?php
				foreach($category as $cat){?>
					<tr>
						<td><?php echo $cat["pro_id"];?></td>
						<td><?php echo $cat["pro_name"];?></td>
						<td><?php echo $cat["pro_description"];?></td>
						<td>
							<a href="delete.php?id=<?php echo $cat['pro_id'];?>" onclick="return confirm('You want to delete?')" class="btn btn-danger">Delete</a>
							<a href="#" class="btn btn-danger">Update</a>
							<a href="#" class="btn btn-danger">Detail</a>
						</td>
						<td><img src='../<?php echo $cat['pro_image']; ?>' style='width:128px;height:128px'></td>
					</tr>
			<?php }?>
			</table>
		</div>
	</div>
</div>
<?php
include ('../template/footer.php');
?>