<?php
    $db = mysqli_connect("localhost","root","","cambointermarket");
    mysqli_query ( $db,"set character_set_results='utf8'" );

    include ("authorization.php");
    include ('../models/admin.php');

    if (isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0){
        $id = $_GET['id'];

        $select= "SELECT products.*, category.cat_name from products inner join category on products.cat_id=category.cat_id where pro_id=".$id;
        $query = mysqli_query($db,$select);
        $row = mysqli_fetch_array($query);
        if($row){
            $cat_name = $row['cat_name'];
            $cat_id = $row['cat_id'];
            $proid = $row['pro_id'];
            $pname = $row['pro_name'];
            $pprice = $row['pro_price'];
            $pcode = $row['pro_code'];
            $pimage = $row['pro_image'];
            $deskh = $row['pro_descriptionKh'];
            $desen = $row['pro_descriptionEn'];
            $pinfor = $row['pro_information'];
            $_SESSION['img']= $row['pro_image'];
            
        }else{
        // if the 'id' in the URL isn't valid, or if there is no 'id' value, display an error
            echo 'Error!';
        }
    }

    if (isset($_POST['edit'])){
        $id = $_GET['id'];
        $pname = $_POST['name'];
        $pprice = $_POST['price'];
        $pcode = $_POST['code'];
        $type = basename($_FILES['image']['type']);
        $pimage = basename($_FILES['image']['name']);
        $pcat = $_POST['cat'];
        $deskh = $_POST['desKh'];
        $desen = $_POST['desEn'];
        $pinfor = $_POST['desInfo'];

        if($pimage){
            $to = "../uploads/".$_FILES['image']['name'];
            move_uploaded_file($_FILES['image']['tmp_name'],$to);
            $edit_product = Products::edit($id,$pname,$pprice,$pcode,$pcat,$pimage,$deskh,$desen,$pinfor);
            header("Location: listproducts.php");
        }else if($_SESSION['img']){
            $to = "../uploads/".$_FILES['image']['name'];
            move_uploaded_file($_FILES['image']['tmp_name'],$to);
            $edit_product = Products::edit($id,$pname,$pprice,$pcode,$pcat,$_SESSION['img'],$deskh,$desen,$pinfor);
            header("Location: listproducts.php");
        }else{
            echo "no images";
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
                        Update Product
                    </h1>
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                        </li>
                        <li class="active">
                            <i class="fa fa-table"></i> UpdateProduct
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
                                <input class="form-control" name="name" value="<?php echo $pname; ?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-10">
                                <label>Product Price</label>
                                <input class="form-control" name="price" value="<?php echo $pprice; ?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-10">
                                <label>Product Code</label>
                                <input class="form-control" name="code" value="<?php echo $pcode; ?>">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="col-xs-10">
                                <label>Selects category</label>
                                <select class="form-control" name="cat">
                                    <option style="display:none" value="<?php echo $cat_id;?>">
                                        <?php echo $cat_name;?>
                                    </option>
                               <?php 
                                   $category = Products::getCategory();
                                   foreach($category as $cat){?>
                                        <option value="<?php echo $cat['cat_id'];?>">
                                           <?php echo $cat['cat_name'];?>
                                        </option>
                               <?php }?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-10">
                                <label>Selects Image</label>
                                <input type='file' name="image" id='uploader'><br />
                                <?php echo "<img name='image' style='width:200px;' id='placeholder' src = '../uploads/".$pimage."'>";?>
                            </div><br/>
                        </div>
                        <script type="text/javascript">
                            $('#placeholder').previewImage( {uploader: '#uploader'});
                        </script>
                        
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <div class="col-xs-10">
                                <label>Khmer Description</label>
                                <textarea class="form-control" rows="3" name="desKh" required>
                                    <?php echo $deskh; ?>
                                </textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-10">
                                <label>English Description</label>
                                <textarea class="form-control" rows="3" name="desEn" required>
                                    <?php echo $desen; ?>
                                </textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-10">
                                <label>Product Information</label>
                                <textarea class="form-control" rows="3" name="desInfo">
                                    <?php echo $pinfor; ?>
                                </textarea>
                            </div>
                        </div>

                    </div>
                    <div class="form-group">
                        <div class="col-xs-10">
                            <button type="submit" name='edit' class="btn btn-success">Submit Post</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>