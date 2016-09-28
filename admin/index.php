
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
            $postSuceess="You have successfull post product.";
            $yes=1;
        }
    }
?>
<style type="text/css">
    img {
      max-width: 250px;
    }
</style>
<div class="col-md-12">
    <?php include ("../template/menu_admin.php");?>
    <div class="col-md-10">
        <div class='register_account'>
            <div class='wrap'>
             <h4 class='title'>Post Product</h4>
                <div class="form">
                    <div class="col-md-4 col-lg-4">
                        <form method='POST' name="form" enctype="multipart/form-data">
                            <div class="form-group row">
                                <div class="col-xs-10">
                                    <input class="form-control" type="text" name="name" value="" placeholder="Product Name" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-xs-10">
                                    <input class="form-control" type="text" name="price" value="" placeholder="Product Price" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-xs-10">
                                    <input class="form-control" type="text" name="code" value="" placeholder="Product Code">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-xs-10">
                                    <select class="form-control" id="" name="cat" required>
                                        <option value="No Cateogry" style="display:none;">Prodcut Category</option>
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
                            <div class="form-group row">
                                <div class="col-xs-10">
                                    Select image to upload:
                                    <input type='file' name="image" id='uploader' required>
                                    <br />
                                    <img id='placeholder'>
                                    <h4 class="success"><?php echo $postSuceess;?></h4>
                                </div>
                                
                                <script type="text/javascript">
                                    $('#placeholder').previewImage( {uploader: '#uploader'});
                                </script>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-4">
                            <div class="form-group row">
                                <div class="col-xs-10" style="margin-top:10px">
                                    <textarea rows="7" cols="36" type='text' name='desKh' value='' placeholder='Description in Khmer' required></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-xs-10">
                                    <textarea rows="7" cols="36" type='text' name='desEn' value='' placeholder='Description in English' required></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-xs-10">
                                    <textarea rows="7" cols="36" type='text' name='desInfo' value='' placeholder='Product Information' required></textarea>
                                </div>
                            </div>
                            <div class='clear'></div>
                            <button class='post' type='submit' name='post' >Post</button>
                            <br/>
                            <div class='clear'></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>