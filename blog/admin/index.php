<?php
//include config
require_once('../includes/config.php');

//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: login.php'); }

//show message from add / edit page
if(isset($_GET['delpost'])){

	$stmt = $db->prepare('DELETE FROM sa_posts WHERE postID = :postID') ;
	$stmt->execute(array(':postID' => $_GET['delpost']));

	//delete post categories.
	$stmt = $db->prepare('DELETE FROM sa_post_categories WHERE postID = :postID');
	$stmt->execute(array(':postID' => $_GET['delpost']));

	header('Location: index.php?action=deleted');
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

    <title>Dashboard ~ DiazCompany</title>

    <!-- Style Sheet -->
           <?php include('includes/css.php');?>
     <!-- Style Sheet -->

<script language="JavaScript" type="text/javascript">
  function delpost(id, title)
  {
	  if (confirm("Are you sure you want to delete '" + title + "'"))
	  {
	  	window.location.href = 'index.php?delpost=' + id;
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
                    <h3 class="text-primary">Dashboard</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="./">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>




            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->

                <div class="row">
                    <div class="col-md-3">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-sticky-note f-s-40 color-primary"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <h2>
                                        <?php
                                          $nRows = $db->query('select count(*) from sa_posts')->fetchColumn();
                                         echo $nRows;
                                        ?>
                                    </h2>
                                    <p class="m-b-0">Total Posts</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-list-ul f-s-40 color-success"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <h2><?php
                                          $nRows = $db->query('select count(*) from sa_categories')->fetchColumn();
                                         echo $nRows;
                                        ?>
                                    </h2>
                                    <p class="m-b-0">Total Categories</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-users f-s-40 color-warning"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <h2><?php
                                          $nRows = $db->query('select count(*) from sa_users')->fetchColumn();
                                         echo $nRows;
                                        ?></h2>
                                    <p class="m-b-0">Profiles</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-eye f-s-40 color-danger"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <h2><a href="../" target="_blank" class="btn btn-dark btn-xs m-b-10 m-l-5">View Now</a></h2>
                                    <p class="m-b-0">Website</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                <a href='new-post.php'> <button type="button" class="btn btn-dark m-b-10 m-l-5"><i class="fa fa-sticky-note"></i>  Add Post</button></a>



                <div class="row">
				    <div class="col-lg-12">
                        <div class="card">


                            <div class="card-title">
                                <h4>Recent Post </h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">


					                <?php
									//show message from add / edit page
									if(isset($_GET['action'])){
										echo '<h3>Post '.$_GET['action'].'.</h3>';
									}
									?>

                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Title</th>
                                                <th>Categories</th>
                                                <th>Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

									  <tbody>



                                    <?php
										try {

											$stmt = $db->query('SELECT * FROM sa_posts ORDER BY postID DESC');
											while($row = $stmt->fetch()){

                                            echo '<tr>';

                                          echo '<td>'.$row['postID'].'</td>';
                                          echo '<td>'.$row['postTitle'].'</td>';
                                          echo '<td>';
                                          $stmt1 = $db->query('SELECT * FROM sa_categories where catID in (select catID from sa_post_categories where postID='. $row['postID'].')');
										  while($row1 = $stmt1->fetch()){

                                          echo $row1['catTitle'];

                                            }
                                            echo '</td>';
                                          echo '<td>'.date('jS M Y', strtotime($row['postDate'])).'</td>';
                                          ?>
                                                <td><a href="edit-post.php?id=<?php echo $row['postID'];?>"><button type="button" class="btn btn-primary btn-xs btn-addon s-b-10 s-l-5"><i class="fa fa-edit"></i> Edit</button></a> | <a href="javascript:delpost('<?php echo $row['postID'];?>','<?php echo $row['postTitle'];?>')"><button type="button" class="btn btn-danger btn-xs btn-addon s-b-10 s-l-5"><i class="fa fa-trash"></i> Delete</button></a></td>

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
