<?php
    $db = mysqli_connect("localhost","root","","cambointermarket");
        mysqli_query ( $db,"set character_set_results='utf8'" );
    include ("authorization.php");
    include ('../models/admin.php');
?>
    <style type="text/css">
        body { height: 1000px; }
        thead{
            background-color:#4cb1ca;
            color:#fff;
        }
    </style>
<?php
    $per_page=10;
    if (isset($_GET['page'])) {

    $page = $_GET['page'];
    }
    else {
    $page=1;
    }
    // Page will start from 0 and Multiple by Per Page
    $start_from = ($page-1) * $per_page;
    //Selecting the data from table but with limit
    $query = "select products.*, category.cat_name from products inner join category on products.cat_id=category.cat_id LIMIT $start_from, $per_page";
    $result = mysqli_query ($db, $query);
?>
<div id="wrapper">
    <?php include("menu_admin.php");?>
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Product Listing
                    </h1>
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                        </li>
                        <li class="active">
                            <i class="fa fa-table"></i> ListProducts
                        </li>
                    </ol>
                </div>
            </div>
      <div class="row">
        <div class="col-lg-12">
          <div id="table-container" class="table-responsive">
            <table id="maintable" class="table table-bordered table-hover table-striped">
              <thead >
              <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Price</th>
                  <th>Category</th>
                  <th>Code</th>
                  <th>English Description</th>
                  <th>Khmer Description</th>
                  <th>Information</th>
                  <th>Image</th>
                  <th>Action</th>
              </tr>
              </thead>
              <tbody>
                <?php
                  while ($row = mysqli_fetch_assoc($result)) {
                ?>
                  <tr align="center">
                  <td><?php echo $row['pro_id']; ?></td>
                  <td><?php echo $row['pro_name']; ?></td>
                  <td><?php echo "$ ".$row['pro_price']; ?></td>
                  <td><?php echo $row['cat_name']; ?></td>
                  <td><?php echo $row['pro_code']; ?></td>
                  <td><?php echo $row['pro_descriptionEn']; ?></td>
                  <td><?php echo $row['pro_descriptionKh']; ?></td>
                  <td><?php echo $row['pro_information']; ?></td>
                  <td><?php echo "<img style='width:100px' src='../uploads/".$row['pro_image']."'/>"?></td>
                  <td style="width:13%" >
                  <a style="z-index:0; background:#4cb1ca;border:1px #4cb1ca;" href='edit_post.php?id=<?php echo $row['pro_id'];?>' class="btn btn-success">Edit</a>
                  <a style="z-index:0;" href="delete_post.php?id=<?php echo $row['pro_id'];?>" onclick="return confirm('You want to delete product?')" class="btn btn-danger">Delete</a></td>
                  </tr>
                <?php 
                  }
                ?>
              </tbody>
            </table>
              <div id="bottom_anchor"></div>
                <?php
                  //Now select all from table
                  $query = "SELECT * from products";
                  $result = mysqli_query($db, $query);

                  // Count the total records
                  $total_records = mysqli_num_rows($result);

                  //Using ceil function to divide the total records on per page
                  $total_pages = ceil($total_records / $per_page);

                  //Going to first page
                  echo "<center><a href='listproducts.php?page=1'>".'First Page'."</a> ";

                  for ($i=1; $i<=$total_pages; $i++) {

                  echo "<a href=listproducts.php?page=".$i."'>".$i."</a> ";
                  };
                  // Going to last page
                  echo "<a href='listproducts.php?page=$total_pages'>".'Last Page'."</a></center> ";
                ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>