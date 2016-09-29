
<?php
    include ('../models/admin.php');
    include ("../config/config.php");
    session_start();

    if ($_SESSION['login_user']!='Undefined' && $_SESSION['rerole']!="admin") {
        header("location: ".URL."login.php");
    }
?>

<!-- <div class="col-md-12">
    <?php //include ("../template/menu_admin.php");?>
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
                                    <textarea rows="7" cols="36" type='text' name='desInfo' value='' placeholder='Product Information'></textarea>
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
</div> -->

<div id="wrapper">    
    <?php 
        include ("../template/menu_admin.php");
    ?>
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Dashboard
                    </h1>
                    <ol class="breadcrumb">
                        <li class="active">
                            <i class="fa fa-dashboard"></i> Dashboard
                        </li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-comments fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">26</div>
                                    <div>New Comments!</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">12</div>
                                    <div>New Tasks!</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-shopping-cart fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">124</div>
                                    <div>New Orders!</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-support fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">13</div>
                                    <div>Support Tickets!</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>