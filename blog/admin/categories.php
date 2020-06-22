<?php
//include config
require_once('../includes/config.php');

//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: login.php'); }

//show message from add / edit page
if(isset($_GET['delcat'])){

	$stmt = $db->prepare('DELETE FROM sa_categories WHERE catID = :catID') ;
	$stmt->execute(array(':catID' => $_GET['delcat']));

	header('Location: categories.php?action=deleted');
	exit;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex, nofollow">

    <title>Categories ~ DiazCompany</title>

    <!-- Style Sheet -->
           <?php include('includes/css.php');?>
     <!-- Style Sheet -->

  <script language="JavaScript" type="text/javascript">
  function delcat(id, title)
  {
	  if (confirm("Are you sure you want to delete '" + title + "'"))
	  {
	  	window.location.href = 'categories.php?delcat=' + id;
	  }
  }
  </script>

</head>

<body class="fix-header fix-sidebar">
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
        </svg>
    </div>
        <!-- Main wrapper  -->
      <div id="main-wrapper">

        <!-- Menu -->
           <?php include('includes/menu.php');?>
        <!-- End Menu -->

        <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->

            <div id="wrapper">


            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Categories</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="./">Home</a></li>
                        <li class="breadcrumb-item active">Categories</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->


                <div class="row">
				    <div class="col-lg-12">
                        <div class="card">


                            <div class="card-title">
                                <h4>Categories</h4> <a href='add-category.php'> <button type="button" class="btn btn-dark btn-sm m-b-10 m-l-5"><i class="fa fa-plus"></i> Add New Category</button></a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">

                                    <?php
                                    //show message from add / edit page
                                    if(isset($_GET['action'])){
                                        echo '<h3>Category '.$_GET['action'].'.</h3>';
                                    }
                                    ?>

                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

									  <tbody>


                                        <?php
                                            try {

                                                $stmt = $db->query('SELECT catID, catTitle, catSlug FROM sa_categories ORDER BY catTitle DESC');
                                                while($row = $stmt->fetch()){

                                                echo '<td>'.$row['catID'].'</td>';
                                                echo '<td>'.$row['catTitle'].'</td>';
                                                ?>

                                                <td><a href="edit-category.php?id=<?php echo $row['catID'];?>"><button type="button" class="btn btn-primary btn-xs btn-addon s-b-10 s-l-5"><i class="fa fa-edit"></i> Edit</button></a> | <a href="javascript:delcat('<?php echo $row['catID'];?>','<?php echo $row['catSlug'];?>')"><button type="button" class="btn btn-danger btn-xs btn-addon s-b-10 s-l-5"><i class="fa fa-trash"></i> Delete</button></a></td>

                                            <?php
												echo '</tr>';

											}

										} catch(PDOException $e) {
										    echo $e->getMessage();
										}
									?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                </div>


                <!-- End PAge Content -->
            </div>
            <!-- End Container fluid  -->
            <!-- footer -->
            <footer class="footer"> Copyrights &copy; <?php echo date("Y"); ?> <a href="index.php" target="_blank">DiazCompany.info</a>. All Rights Reserved.</footer>
            <!-- End footer -->
        </div>
        <!-- End Page wrapper  -->
    </div>
    <!-- End Wrapper -->

     <!-- Java Scripts -->
           <?php include('includes/js.php');?>
     <!-- End Java Scripts -->

</body>

</html>
