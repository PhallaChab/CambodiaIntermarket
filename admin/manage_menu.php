<?php
    include ("authorization.php");
    include ('../models/admin.php');

	if(isset($_POST['add_main_menu'])){
		$menu_name = $_POST['menu_name'];
		$menu_link = $_POST['mn_link'];
		$menu_kh = $_POST['menukh'];
		$menu = Products::insertMenu($menu_name,$menu_kh,$menu_link);
	}
	$erro = "";
	if(isset($_POST['add_sub_menu'])){
		$parent = $_POST['parent'];
		$proname = $_POST['sub_menu_name'];
		$menu_link = $_POST['sub_menu_link'];
		$submenu_kh = $_POST['sub_menu_kh'];
		if($parent=="No"){
			$erro = "You have to select Parent Menu!!";
		}else{
			$subMenu = Products::insertSubMenu($parent,$proname,$menu_link,$submenu_kh);
		}
	}
?>
<div id="wrapper">    
    <?php 
        include ("menu_admin.php");
    ?>
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Manage Menu
                    </h1>
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                        </li>
                        <li class="active">
                            <i class="fa fa-table"></i> ManageMenu
                        </li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                	<form role="form" method="POST" enctype="multipart/form-data" >
	                    <div class="form-group">
	                        <div class="col-xs-10">
	                            <label>Mainmenu Name</label>
	                            <input class="form-control" name="menu name" required>
	                        </div>
	                    </div>
	                    <div class="form-group">
	                        <div class="col-xs-10">
	                            <label>Mainmenu Name in Khmer</label>
	                            <input class="form-control" name="menukh" required>
	                        </div>
	                    </div>
	                    <div class="form-group">
	                        <div class="col-xs-10">
	                            <label>Mainmenu link</label>
	                            <input class="form-control" name="mn_link" required>
	                        </div>
	                    </div>
	                    <div style="clear: both;height: 20px;"></div>
	                    <div class="form-group">
	                        <div class="col-xs-10">
	                            <button type="submit" name="add_main_menu" class="btn btn-success">Submit Mainmenu</button>
	                        </div>
	                    </div>
                    </form>
                    <form role="form" method="POST" enctype="multipart/form-data" >
                        <div class="form-group">
                            <div class="col-xs-10">
                                <label>Submenu Name</label>
                                <input class="form-control" name="sub_menu_name" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-10">
                                <label>Submenu Name in Khmer</label>
                                <input class="form-control" name="sub_menu_kh" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-10">
                                <label>Submenu link</label>
                                <input class="form-control" name="sub_menu_link" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-10">
                                <label>Select Parents Menu</label>
                                <p style="color:red;"><?php echo $erro;?></p>
                                <select class="form-control" name="parent">
                                    <option value="No" style="display:none;">Selects Parents Menu</option>
                                    <?php
										$res=Products::getMainmenu();
										foreach($res as $row){
									?>
                                    <option value="<?php echo $row['m_menu_id']; ?>">
                                        <?php echo $row['m_menu_name']; ?>
                                    </option>
                                    <?php }?>
                                </select>
                            </div>
                        </div>
                        <div style="clear: both;height: 20px;"></div>
	                    <div class="form-group">
	                        <div class="col-xs-10">
	                            <button type="submit" name="add_sub_menu" class="btn btn-success">Submit Submenu</button>
	                        </div>
	                    </div>
                	</form>
                </div>
            	<div class="col-lg-8">
                    <div class="row">
                        <div class="col-lg-12">
                            <div id="table-container" class="table-responsive">
                                <table id="maintable" class="table table-bordered table-hover">
                                    <thead >
                                        <tr>
                                            <th>#</th>
                                            <th>Menu Name</th>
                                            <th>Menu Link</th>
                                            <th>In Khmer</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
							                $res=Products::getMainmenu();
							                foreach ($res as $row) {
							            ?>
                                           	<tr>
                                                <td scope="row" style="background: #85fbfb;font-weight: bold;">Main Menu</td>
                                                <td style="background: #85fbfb;">
                                                	<?php echo $row['m_menu_name']; ?></td>
                                                <td style="background: #85fbfb;">
                                                	<?php echo $row['m_menu_link']; ?></td>
                                               	<td style="background: #85fbfb;">
                                               		<?php echo $row['menu_kh'];?></td>
                                                <td style="width:20%; background: #85fbfb;" >
                                                    <a href='' class="btn btn-success">Edit</a>
                                                    <a href="delete_mm.php?id=<?php echo $row['m_menu_id']?>" class="btn btn-danger">Delete</a>
                                                </td>
                                                <?php 
                                                	$mainid = $row['m_menu_id'];
                                                	$res_pro=Products::getSubmenu($mainid);
                                                	foreach ($res_pro as $pro_row ) {
                                                ?>
                                                <tr>
                                                	<td style="font-size: 14px;">Submenu</td>
	                                                <td style="font-size: 14px;">
	                                                	<?php echo $pro_row['s_menu_name']; ?></td>
	                                                <td style="font-size: 14px;">
	                                                	<?php echo $pro_row['s_menu_link']; ?></td>
	                                                <td><?php echo $pro_row['submenu_kh'];?></td>
	                                                <td style="width:20%;" >
                                                    	<a href='' class="btn btn-success">Edit</a>
                                                    	<a href='delete_sm.php?id=<?php echo $pro_row['s_menu_id']?>' class="btn btn-danger">Delete</a>
                                                	</td>
                                                </tr>
                                                <?php }?>
                                            </tr>
                                            <?php }?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>