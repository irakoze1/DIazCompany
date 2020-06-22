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

    <title>Add Category ~ DiazCompany</title>

    <!-- Style Sheet -->
           <?php include('includes/css.php');?>
     <!-- Style Sheet -->

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
                    <h3 class="text-primary">Add Category</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="./">Home</a></li>
                        <li class="breadcrumb-item active">Add Category</li>
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
                                if($catTitle ==''){
                                    $error[] = 'Please enter the Category.';
                                }

                                if(!isset($error)){

                                    try {

                                        $catSlug = slug($catTitle);

                                        //insert into database
                                        $stmt = $db->prepare('INSERT INTO sa_categories (catTitle,catSlug) VALUES (:catTitle, :catSlug)') ;
                                        $stmt->execute(array(
                                            ':catTitle' => $catTitle,
                                            ':catSlug' => $catSlug
                                        ));

                                        //redirect to categories page
                                        header('Location: categories.php?action=added');
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
                                                        <label class="col-md-12">Name</label>
                                                        <div class="col-md-12">
                                                            <input type="text" name='catTitle' value='<?php if(isset($error)){ echo $_POST['catTitle'];}?>' placeholder="Enter Category Name" class="form-control form-control-line">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-sm-12">
                                                            <button type="submit" name='submit' value='Add User' class="btn btn-success">Add New Category</button>
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
