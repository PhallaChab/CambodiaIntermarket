<?php 
    include ('../models/admin.php');
?>
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