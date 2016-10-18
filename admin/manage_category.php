<?php
    include ("authorization.php");
    include ("../models/category.php");
    if(isset($_POST['submit'])){
        $cat_name = $_POST['name'];
        $cat_description = $_POST['des'];
        $query = Category::insertCat($cat_name,$cat_description);
        if($query){
            echo "insert new row";
        }else{
            echo "fail!";
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
                        Manage Category
                    </h1>
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                        </li>
                        <li class="active">
                            <i class="fa fa-table"></i> ManageCategory
                        </li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <form role="form" method="POST" enctype="multipart/form-data" >
                    <div class="col-lg-6">
                        <div class="form-group">
                            <div class="col-xs-10">
                                <label>Category Name</label>
                                <input class="form-control" name="name" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-10">
                                <label>Description</label>
                                <textarea class="form-control" rows="3" name="des" required></textarea><br/>
                                <button type="submit" name="submit" class="btn btn-success">Submit Category</button>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-lg-12">
                            <div id="table-container" class="table-responsive">
                                <table id="maintable" class="table table-bordered table-hover table-striped">
                                    <thead >
                                        <tr>
                                            <th>#</th>
                                            <th>Category Name</th>
                                            <th>Description</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $category =  Category::getCat();
                                                foreach($category as $cat){?>
                                                <tr>
                                                    <td scope="row"><?php echo $cat['cat_id'];?></td>
                                                    <td><?php echo $cat['cat_name'];?></td>
                                                    <td><?php echo $cat['description'];?></td>
                                                    <td style="width:13%" >
                                                        <a style="z-index:0; background:#4cb1ca;border:1px #4cb1ca;" href='edit_category.php?id=<?php echo $cat['cat_id'];?>' class="btn btn-success">Edit</a>
                                                    </td>
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