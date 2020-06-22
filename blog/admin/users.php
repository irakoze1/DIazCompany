<?php
//include config
require_once('../includes/config.php');

//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: login.php'); }

//show message from add / edit page
if(isset($_GET['deluser'])){

	//if user id is 1 ignore
	if($_GET['deluser'] !='1'){

		$stmt = $db->prepare('DELETE FROM sa_users WHERE memberID = :memberID') ;
		$stmt->execute(array(':memberID' => $_GET['deluser']));

		header('Location: users.php?action=deleted');
		exit;

	}
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

    <title>Users ~ DiazCompany</title>

     <!-- Style Sheet -->
           <?php include('includes/css.php');?>
     <!-- End Style Sheet -->

<script language="JavaScript" type="text/javascript">
  function deluser(id, title)
  {
	  if (confirm("Are you sure you want to delete '" + title + "'"))
	  {
	  	window.location.href = 'users.php?deluser=' + id;
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
                    <h3 class="text-primary">Users</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="./">Home</a></li>
                        <li class="breadcrumb-item active">Users</li>
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
                                <h4>Users</h4> <a href='new-user.php'> <button type="button" class="btn btn-dark btn-sm m-b-10 m-l-5"><i class="fa fa-plus"></i>  Add New User</button></a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">


					                <?php
                                    //show message from add / edit page
                                    if(isset($_GET['action'])){
                                        echo '<h3>User '.$_GET['action'].'.</h3>';
                                    }
                                    ?>

                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Username</th>
                                                <th>Email</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

									  <tbody>

                                    <?php
                                        try {

                                            $stmt = $db->query('SELECT memberID, username, email FROM sa_users ORDER BY username');
                                            while($row = $stmt->fetch()){

                                          echo '<td>'.$row['memberID'].'</td>';
                                          echo '<td>'.$row['username'].'</td>';
                                          echo '<td>'.$row['email'].'</td>';
                                          ?>
                                                <!-- <td><a href="profile.php?id=<?php echo $row['memberID'];?>"><button type="button" class="btn btn-primary btn-xs btn-addon s-b-10 s-l-5"><i class="fa fa-edit"></i> Edit</button></a> | <?php if($row['memberID'] != 1){?><a href="javascript:deluser('<?php echo $row['memberID'];?>','<?php echo $row['username'];?>')"><button type="button" class="btn btn-danger btn-xs btn-addon s-b-10 s-l-5"><i class="fa fa-trash"></i> Delete</button></a><?php } ?></td> -->
                                                <td><?php if($row['memberID'] != 1){?><a href="profile.php?id=<?php echo $row['memberID'];?>"><button type="button" class="btn btn-primary btn-xs btn-addon s-b-10 s-l-5"><i class="fa fa-edit"></i> Edit</button></a><?php } ?> | <?php if($row['memberID'] != 1){?><a href="javascript:deluser('<?php echo $row['memberID'];?>','<?php echo $row['username'];?>')"><button type="button" class="btn btn-danger btn-xs btn-addon s-b-10 s-l-5"><i class="fa fa-trash"></i> Delete</button></a><?php } ?></td>
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
