<?php 
    include ('../models/admin.php');
    if (isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0){
        $id = $_GET['id'];
        $select= Products::getProductByid($id);
        $row = mysqli_fetch_array($select);
        if($row){
            $cat_name = $row['cat_name'];
        }
    }
?>
<style type="text/css">
    body { height: 1000px; }
    thead{
        background-color:#4cb1ca;
        color:#fff;
    }
</style>
<div class="col-md-12">
    <?php include ("../template/menu_admin.php");?>
    <div class="col-md-10">
        <div id="table-container">
            <table id="maintable" class="table table-hover">
                <thead >
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Category</th>
                        <th>Code</th>
                        <th>English Description</th>
                        <th>Khmer Description</th>
                        <th>Information</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $product =  Products::getProducts();
                        foreach($product as $pro){?>
                        <tr>
                            <td scope="row">1</td>
                            <td><?php echo $pro['pro_name'];?></td>
                            <td><?php echo "$ ".$pro['pro_price'];?></td>
                            <td><?php //echo $cat_name;?></td>
                            <td><?php echo $pro['pro_code'];?></td>
                            <td><?php echo $pro['pro_descriptionEn'];?></td>
                            <td><?php echo $pro['pro_descriptionKh'];?></td>
                            <td><?php echo $pro['pro_information'];?></td>
                            <td style="width:15%"><?php echo "<img src='../uploads/".$pro['pro_image']."'/>"?></td>
                            <td style="width:13%" >
                                <a style="z-index:0; background:#4cb1ca;border:1px #4cb1ca;" href='edit_post.php?id=<?php echo $pro['pro_id'];?>' class="btn btn-success">Edit</a>
                                <a style="z-index:0;" href="delete.php?id=<?php echo $pro['pro_id'];?>" onclick="return confirm('You want to delete product?')" class="btn btn-danger">Delete</a></td>
                        </tr>
                    <?php }?>
                </tbody>
            </table>
            <div id="bottom_anchor"></div>
        </div>
    </div>
</div>