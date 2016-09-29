<?php
    include ('../models/admin.php');

    $postSuceess="";
    if(isset($_POST['post'])){
        $pname = $_POST['name'];
        $pprice = $_POST['price'];
        $pcode = $_POST['code'];
        $type = basename($_FILES['image']['type']);
        $pimage = basename($_FILES['image']['name']);
        $pcat = $_POST['cat'];
        $deskh = $_POST['desKh'];
        $desen = $_POST['desEn'];
        $pinfor = $_POST['desInfo'];
        $date = date("Y/m/d");
        $yes = 1;
        
        if($type != "png" && $type != "jpg" && $type != "jpeg"){
            echo "This file not respond because it is not file image.";
            $yes = 0;
        }else{
            $to = "C:/xampp/htdocs/CambodiaIntermarket/uploads/".$_FILES['image']['name'];
            move_uploaded_file($_FILES['image']['tmp_name'],$to);
            $insert_product = Products::insert($pname,$pprice,$pcode,$pcat,$pimage,$deskh,$desen,$pinfor,$date);
            $postSuceess="You have successfull post product. <br/><a href='listproducts.php'>Go to ListProduct</a>";
            $yes=1;
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
                        Post Product
                    </h1>
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                        </li>
                        <li class="active">
                            <i class="fa fa-table"></i> PostProduct
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
                                <input class="form-control" name="name" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-10">
                                <label>Product Price</label>
                                <input class="form-control" name="price" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-10">
                                <label>Product Code</label>
                                <input class="form-control" name="code">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="col-xs-10">
                                <label>Selects category</label>
                                <select class="form-control" name="cat">
                                    <option value="No Cateogry" style="display:none;">Selects category</option>
                                    <?php 
                                        $category = Products::getCategory();
                                        foreach($category as $cat){
                                    ?>
                                    <option value="<?php echo $cat['cat_id'];?>" name="cat">
                                        <?php echo $cat['cat_name'];?>
                                    </option>
                                    <?php }?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-10">
                                <label>Selects Image</label>
                                <input type='file' name="image" id='uploader' required><br />
                                <img id='placeholder' style="width:200px;">
                                <p class="success"><?php echo $postSuceess;?></p>
                            </div>
                        </div>
                        <script type="text/javascript">
                            $('#placeholder').previewImage( {uploader: '#uploader'});
                        </script>
                        
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <div class="col-xs-10">
                                <label>Khmer Description</label>
                                <textarea class="form-control" rows="3" name="desKh" required></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-10">
                                <label>English Description</label>
                                <textarea class="form-control" rows="3" name="desEn" required></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-10">
                                <label>Product Information</label>
                                <textarea class="form-control" rows="3" name="desInfo"></textarea>
                            </div>
                        </div>

                    </div>
                    <div class="form-group">
                        <div class="col-xs-10">
                            <button type="submit" name="post" class="btn btn-success">Submit Post</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>