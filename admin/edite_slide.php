<?php

    include ("authorization.php");
    include ('../models/admin.php');

    if (isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0){
        $id = $_GET['id'];
        $query = Products::getSlideid($id);
        $row = mysqli_fetch_array($query);
        if($row){
            $desc = $row['description'];
            $_SESSION['img']= $row['image'];
            $image= $row['image'];
            
        }else{
            echo 'Error!';
        }
    }

    if (isset($_POST['edit'])){
        $id = $_GET['id'];
        $descrip = $_POST['description'];
        echo $descrip;
        $type = basename($_FILES['image']['type']);
        $img = basename($_FILES['image']['name']);
        
        if($img){
            $to = "../uploads/".$_FILES['image']['name'];
            move_uploaded_file($_FILES['image']['tmp_name'],$to);
            $edit_slide = Products::editslide($id,$img,$descrip);
            header("Location: manage_slide.php");
        }else if($_SESSION['img']){
            $to = "../uploads/".$_FILES['image']['name'];
            move_uploaded_file($_FILES['image']['tmp_name'],$to);
            $edit_slide = Products::editslide($id,$_SESSION['img'],$descrip);
            header("Location: manage_slide.php");
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
                                <label>Description</label>
                                <textarea class="form-control" rows="3" name="description" required>
                                    <?php echo $desc; ?>
                                </textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-10">
                                <label>Selects Image</label>
                                <input type='file' name="image" id='uploader'><br />
                                <?php echo "<img name='image' style='width:200px;' id='placeholder' src = '../uploads/".$image."'>";?>
                            </div><br/>
                        </div>
                        <script type="text/javascript">
                            $('#placeholder').previewImage( {uploader: '#uploader'});
                        </script>
                        
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