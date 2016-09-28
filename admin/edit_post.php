<?php
    include ('../models/admin.php');

    if (isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0){
        $id = $_GET['id'];
        $select= Products::getProductByid($id);
        $row = mysqli_fetch_array($select);
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
            echo "No results!";
        }
    }else{
        // if the 'id' in the URL isn't valid, or if there is no 'id' value, display an error
        echo 'Error!';
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
            $to = "C:/xampp/htdocs/CambodiaIntermarket/uploads/".$_FILES['image']['name'];
            move_uploaded_file($_FILES['image']['tmp_name'],$to);
            $edit_product = Products::edit($id,$pname,$pprice,$pcode,$pcat,$pimage,$deskh,$desen,$pinfor);
            header("Location: listproducts.php");
        }else if($_SESSION['img']){
            $to = "C:/xampp/htdocs/CambodiaIntermarket/uploads/".$_FILES['image']['name'];
            move_uploaded_file($_FILES['image']['tmp_name'],$to);
            $edit_product = Products::edit($id,$pname,$pprice,$pcode,$pcat,$_SESSION['img'],$deskh,$desen,$pinfor);
            header("Location: listproducts.php");
        }
    }
?>
<div class="col-md-12">
    <?php include ("../template/menu_admin.php");?>
    <div class="col-md-9">
        <div class='register_account'>
            <div class='wrap'>
             <h4 class='title'>Update Product</h4>
                <div class="col-md-4 col-lg-4">
                   
                    <form method='POST' name="form" enctype="multipart/form-data">
                        <div class="form-group row">
                            <div class="col-xs-10">
                                <input class="form-control" type="text" name="name" value='<?php echo $pname; ?>'required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-xs-10">
                                <input class="form-control" type="text" name="price" value="<?php echo $pprice; ?>" placeholder="Product Price" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-xs-10">
                                <input class="form-control" type="text" name="code" value="<?php echo $pcode; ?>" placeholder="Product Code" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-xs-10">
                                <select class="form-control" id="category" name="cat">
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
                        <div class="form-group row">
                            <div class="col-xs-10">
                                Select image to upload:
                                <input type="file" name="image" id="uploader"><br/>

                                <?php echo "<img name='image' id='placeholder' src = '../uploads/".$pimage."'>";?>
                            </div>
                            <script type="text/javascript">
                                $('#placeholder').previewImage( {uploader: '#uploader'});
                            </script>
                        </div>
                        </div>
                        <div class="col-md-4 col-lg-4">
                        <div class="form-group row">
                            <div class="col-xs-10">
                                <textarea rows="7" cols="36" type='text' name='desKh' placeholder='Description in Khmer' required>
                                    <?php echo $deskh; ?>
                                </textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-xs-10">
                                <textarea rows="7" cols="36" type='text' name='desEn' placeholder='Description in English' required>
                                    <?php echo $desen; ?>
                                </textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-xs-10">
                                <textarea rows="7" cols="36" type='text' name='desInfo' placeholder='Product Information'>
                                    <?php echo $pinfor; ?>
                                </textarea>
                            </div>
                        </div>
                        <div class='clear'></div>
                        <button class='post' type='submit' name='edit' > Update</button>
                        <div class='clear'></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>