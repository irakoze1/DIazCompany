<?php //include config
require_once('../includes/config.php');

//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: login.php'); }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex, nofollow">

    <title>Add New User ~ DiazCompany</title>

    <!-- Style Sheet -->
           <?php include('includes/css.php');?>
     <!-- Style Sheet -->

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
                    <h3 class="text-primary">Add New User</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="./">Home</a></li>
                        <li class="breadcrumb-item active">Add New User</li>
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

                            <?php

                                //if form has been submitted process it
                                if(isset($_POST['submit'])){

                                    //collect form data
                                    extract($_POST);

                                    //very basic validation
                                    if($username ==''){
                                        $error[] = 'Please enter the username.';
                                    }

                                    if($email ==''){
                                        $error[] = 'Please enter the email address.';
                                    }

                                    if($password ==''){
                                        $error[] = 'Please enter the password.';
                                    }

                                    if($passwordConfirm ==''){
                                        $error[] = 'Please confirm the password.';
                                    }

                                    if($password != $passwordConfirm){
                                        $error[] = 'Passwords do not match.';
                                    }

                                    if(!isset($error)){

                                        $hashedpassword = $user->password_hash($_POST['password'], PASSWORD_BCRYPT);

                                        try {

                                            //insert into database
                                            $stmt = $db->prepare('INSERT INTO sa_users (username,password,email) VALUES (:username, :password, :email)') ;
                                            $stmt->execute(array(
                                                ':username' => $username,
                                                ':password' => $hashedpassword,
                                                ':email' => $email
                                            ));

                                            //redirect to index page
                                            header('Location: users.php?action=added');
                                            exit;

                                        } catch(PDOException $e) {
                                            echo $e->getMessage();
                                        }

                                    }

                                }

                                //check for any errors
                                if(isset($error)){
                                    foreach($error as $error){
                                        echo '<p class="error">'.$error.'</p>';
                                    }
                                }
                                ?>


                            <div class="card-body">
                                        <form class="form-horizontal form-material" method='post'>
                                            <div class="form-group">
                                                <label class="col-md-12">Username</label>
                                                <div class="col-md-12">
                                                    <input type="text" name='username' value='<?php if(isset($error)){ echo $_POST['username'];}?>' placeholder="Enter Username" class="form-control form-control-line">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="example-email" class="col-md-12">Email</label>
                                                <div class="col-md-12">
                                                    <input type="email" name='email' value='<?php if(isset($error)){ echo $_POST['email'];}?>' placeholder="Enter Email ID" class="form-control form-control-line">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">Password</label>
                                                <div class="col-md-12">
                                                    <input type="password" name='password' value='<?php if(isset($error)){ echo $_POST['password'];}?>' placeholder="Enter Password" class="form-control form-control-line">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">Confirm Password</label>
                                                <div class="col-md-12">
                                                    <input type="password" name='passwordConfirm' value='<?php if(isset($error)){ echo $_POST['passwordConfirm'];}?>' placeholder="Enter Confirm Password" class="form-control form-control-line">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <button type="submit" name='submit' value='Add User' class="btn btn-danger">Add New User</button>
                                                </div>
                                            </div>
                                        </form>
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
