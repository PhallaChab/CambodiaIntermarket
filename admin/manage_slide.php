<?php
    include ("authorization.php");
    include ('../models/admin.php');

    $postSuceess="";
    $codeErr="";

    if(isset($_POST['post'])){
        $description = $_POST['desc'];
        $type = basename($_FILES['image']['type']);
        $image = basename($_FILES['image']['name']);
        $date = date("Y/m/d H:i:s");
        $yes = 1;
        
        if($type != "png" && $type != "jpg" && $type != "jpeg"){
            echo "This file not respond because it is not file image.";
            $yes = 0;
        }else{
            $to = "../uploads/".$_FILES['image']['name'];
            echo "Hello path :".$to;
            move_uploaded_file($_FILES['image']['tmp_name'],$to);
            $insert_slide = Products::insertslide($description,$image,$date);
            $postSuceess="You have successfull add slide.";
            $yes=1;
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
                        Manage SlideShow
                    </h1>
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                        </li>
                        <li class="active">
                            <i class="fa fa-table"></i> ManageSlide
                        </li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <form role="form" method="POST" enctype="multipart/form-data" >
                    <div class="col-lg-4">
                        <div class="form-group">
                            <div class="col-xs-10">
                                <label>Description</label>
                                <textarea class="form-control" rows="3" name="desc"></textarea>
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
                        <div class="form-group">
                            <div class="col-xs-10">
                                <button type="submit" name="post" class="btn btn-success">Submit Post</button>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-lg-12">
                            <div id="table-container" class="table-responsive">
                                <table id="maintable" class="table table-bordered table-hover table-striped">
                                    <thead >
                                        <tr>
                                            <th>#</th>
                                            <th>Image</th>
                                            <th>Description</th>
                                            <th style="width:20%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $slides =  Products::getSlide();
                                                foreach($slides as $s){?>
                                                <tr>
                                                    <td scope="row"><?php echo $s['id'];?></td>
                                                    <td><?php echo "<img style='width:100px' src='../uploads/".$s['image']."'/>"?></td>
                                                    <td><?php echo $s['description'];?></td>
                                                    <td style="width:13%" >
                                                        <a style="z-index:0;" href='edite_slide.php?id=<?php echo $s['id'];?>' class="btn btn-success">Edit</a>
                                                        <a style="z-index:0;" href="delete_slide.php?id=<?php echo $s['id'];?>" onclick="return confirm('You want to delete slide?')" class="btn btn-danger">Delete</a>
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