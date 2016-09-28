<div class="col-md-12">
    <?php include ("../template/menu_admin.php");?>
    <div class="col-md-10">
        <div class='register_account'>
            <div class='wrap'>
             <h4 class='title'>Manage Category</h4>
                <div class="form">
                    <div class="col-md-4 col-lg-4">
                        <form method='POST' name="form" enctype="multipart/form-data">
                            <div class="form-group row">
                                <div class="col-xs-10">
                                    <input class="form-control" type="text" name="name" value="" placeholder="Category Name" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-xs-10" style="margin-top:10px">
                                    <textarea rows="7" cols="36" type='text' name='desKh' value='' placeholder='Description' required></textarea>
                                </div>
                            </div>
                            <div class='clear'></div>
                            <button class='post' type='submit' name='submit' >Submit</button>
                            <br/>
                            <div class='clear'></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>