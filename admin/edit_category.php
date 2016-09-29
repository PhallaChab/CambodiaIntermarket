<?php
    include ("../models/category.php");

    if (isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0){
        $id = $_GET['id'];
        $select= Category::getCatID($id);
        $row = mysqli_fetch_array($select);
        if($row){
            $cat_name = $row['cat_name'];
            $cat_description = $row['description'];
        }else{
            echo "No result.";
        }
    }

    if(isset($_POST['submit'])){
        $id = $_GET['id'];
        $cat_name = $_POST['name'];
        $cat_description = $_POST['des'];
        $query = Category::editCat($id,$cat_name,$cat_description);
        if($query){
            header ("location: manage_category.php");
        }else{
            echo "fail!";
        }
    }
?>

<div id="wrapper">    
    <?php 
        include ("../template/menu_admin.php");
    ?>
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Update Category
                    </h1>
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                        </li>
                        <li class="active">
                            <i class="fa fa-table"></i> EditCategory
                        </li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <form role="form" method="POST" enctype="multipart/form-data" >
                    <div class="col-lg-6">
                        <div class="form-group">
                            <div class="col-xs-10">
                                <label>Product Name</label>
                                <input class="form-control" name="name" value="<?php echo $cat_name;?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-10">
                                <label>Description</label>
                                <textarea class="form-control" rows="3" name="des" required>
                                    <?php echo $cat_description;?>
                                </textarea><br/>
                                <button type="submit" name="submit" class="btn btn-success">Submit Category</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>