<?php
    include ("authorization.php");
    $db = mysqli_connect("localhost","cambodiaintermarket_com","nDxfgjvd","cambodiaintermarket_com");
    mysqli_query ( $db,"set character_set_results='utf8'" );
    include ('../models/admin.php');
?>
<style type="text/css">
    body { height: 1000px; }
    thead{
        background-color:#4cb1ca;
        color:#fff;
    }
</style>

<div id="wrapper">
    <?php include("menu_admin.php");?>
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Product Listing
                    </h1>
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                        </li>
                        <li class="active">
                            <i class="fa fa-table"></i> ListProducts
                        </li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div id="table-container" class="table-responsive">
                        <table id="maintable" class="table table-bordered table-hover table-striped">
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
                                        <td scope="row"><?php echo $pro['pro_id'];?></td>
                                        <td><?php echo $pro['pro_name'];?></td>
                                        <td><?php echo "$ ".$pro['pro_price'];?></td>
                                        <td><?php echo $pro['cat_name']?></td>
                                        <td><?php echo $pro['pro_code'];?></td>
                                        <td><?php echo $pro['pro_descriptionEn'];?></td>
                                        <td><?php echo $pro['pro_descriptionKh'];?></td>
                                        <td><?php echo $pro['pro_information'];?></td>
                                        <td><?php echo "<img style='width:100px' src='../uploads/".$pro['pro_image']."'/>"?></td>
                                        <td style="width:13%" >
                                            <a style="z-index:0; background:#4cb1ca;border:1px #4cb1ca;" href='edit_post.php?id=<?php echo $pro['pro_id'];?>' class="btn btn-success">Edit</a>
                                            <a style="z-index:0;" href="delete_post.php?id=<?php echo $pro['pro_id'];?>" onclick="return confirm('You want to delete product?')" class="btn btn-danger">Delete</a></td>
                                    </tr>
                                <?php }?>
                            </tbody>
                        </table>
                        <div id="bottom_anchor"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
