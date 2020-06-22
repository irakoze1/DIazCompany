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

    <title>Add New Post ~ DiazCompany</title>
    <!-- Style Sheet -->
           <?php include('includes/css.php');?>
     <!-- Style Sheet -->
    <script src="//tinymce.cachefly.net/4.0/tinymce.min.js"></script>
     <script>
         tinymce.init({
              selector: "textarea",
              plugins: [
                  "advlist autolink lists link image charmap print preview anchor",
                  "searchreplace visualblocks code fullscreen",
                  "insertdatetime media table contextmenu paste"
              ],
              toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
          });
</script>
<style>
/* Custom CSS */
.mce-tinymce {
margin: 0;
padding: 0;
display: block;
border: 1px solid #e3e3e3 !important;
border-top-left-radius: 3px !important;
border-top-right-radius: 3px !important;
border-bottom: 0px !important;
}
</style>
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
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Add Post</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="./">Home</a></li>
                        <li class="breadcrumb-item active">Add Post</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->







            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->

                <?php

                    //if form has been submitted process it
                    if(isset($_POST['submit'])){

                        //collect form data
                        extract($_POST);

                        //very basic validation
                        if($postTitle ==''){
                            $error[] = 'Please enter the title.';
                        }

                        if($postDesc ==''){
                            $error[] = 'Please enter the description.';
                        }

                        if($postCont ==''){
                            $error[] = 'Please enter the content.';
                        }

                        if(!isset($error)){

                            try {

                                $postSlug = slug($postTitle);

                                $folder ="uploads/";

                                $image = $_FILES['image']['name'];

                                $path = $folder . $image ;

                                $target_file=$folder.basename($_FILES["image"]["name"]);


                                 $imageFileType=pathinfo($target_file,PATHINFO_EXTENSION);


                                $allowed=array('jpeg','png' ,'jpg'); $filename=$_FILES['image']['name'];

                                $ext=pathinfo($filename, PATHINFO_EXTENSION); if(!in_array($ext,$allowed) )

                                {

                                 echo "Sorry, only JPG, JPEG, PNG & GIF  files are allowed.";

                                }

                                else{

                                move_uploaded_file( $_FILES['image'] ['tmp_name'], $path);

                                //insert into database
                                $stmt = $db->prepare('INSERT INTO sa_posts (postTitle,postSlug,postDesc,postCont,postDate,image) VALUES (:postTitle, :postSlug, :postDesc, :postCont, :postDate, :image)') ;
                                $stmt->execute(array(
                                    ':postTitle' => $postTitle,
                                    ':postSlug' => $postSlug,
                                    ':postDesc' => $postDesc,
                                    ':postCont' => $postCont,
                                    ':postDate' => date('Y-m-d H:i:s'),
                                    ':image' => $image
                                ));
                                $postID = $db->lastInsertId();

                                //add categories
                                if(is_array($catID)){
                                    foreach($_POST['catID'] as $catID){
                                        $stmt = $db->prepare('INSERT INTO sa_post_categories (postID,catID)VALUES(:postID,:catID)');
                                        $stmt->execute(array(
                                            ':postID' => $postID,
                                            ':catID' => $catID
                                        ));
                                    }
                                }





                              //  $sth=$db->prepare("insert into sa_posts(image)values(:image) ");

                              //  $sth->bindParam(':image',$image);

                                //$sth->execute();

                                }



                                //redirect to index page
                                header('Location: index.php?action=added');
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

                <!-- /# row -->
                 <form class="form-horizontal form-material" action='' method='post' enctype="multipart/form-data">
                <div class="row">

                    <div class="col-lg-9">
                     <div class="card">
                        <div class="card-title">
                            <h4>Add New Post</h4>
                        </div>
                        <div class="card-body">

                        <div class="form-group">
                            <div class="col-md-12">
                                 <h4 class="card-title">Name</h4>
                                <input type="text" placeholder="Enter post title" class="form-control form-control-line" name='postTitle' value='<?php if(isset($error)){ echo $_POST['postTitle'];}?>'>
                            </div>
                        </div>

                      <div class="form-group">
                        <div class="col-md-12">
                        <h4 class="card-title">Description</h4>
                        <textarea name='postDesc' cols='60' rows='4'><?php if(isset($error)){ echo $_POST['postDesc'];}?></textarea>
                        </div>
                     </div>

                      <div class="form-group">
                        <div class="col-md-12">
                          <h4 class="card-title">Content</h4>
                         <textarea name='postCont' cols='60' rows='10'><?php if(isset($error)){ echo $_POST['postCont'];}?></textarea>
                         </div>
                     </div>

                      <div class="form-group">
                        <div class="col-md-12">
                          <h4 class="card-title">Images</h4>
                                <input type="file" name="image" accept=".jpg,.jpeg,.png"/>
                           </div>
                      </div>



                            </div>
                        </div>
                    </div>
                    <!-- /# column -->

                    <div class="col-lg-3">

                       <div class="col-lg-12">
                        <div class="card">

                            <div class="card-title">
                                <h4>Publish Post</h4>
                            </div>
                            <div class="card-body">

                             <div class="form-group">
                                    <div class="col-sm-12">
                                        <button type="submit" name='submit' value='Submit' class="btn btn-danger">Publish</button>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>


                    <div class="col-lg-12">
                        <div class="card">

                             <div class="card-title">
                                <h4>Categories</h4>
                            </div>
                            <div class="card-body">


                            <?php

								$stmt2 = $db->query('SELECT catID, catTitle FROM sa_categories ORDER BY catTitle');
								while($row2 = $stmt2->fetch()){

									if(isset($_POST['catID'])){

										if(in_array($row2['catID'], $_POST['catID'])){
										   $checked="checked='checked'";
										}else{
										   $checked = null;
										}
									}
                                    echo "<label><input type='checkbox' name='catID[]' value='".$row2['catID']."' $checked> ".$row2['catTitle']."</label><br />";
								}

								?>


                        </div>
                        </div>
                    </div>


                 </div>


                </div>
                <!-- /# row -->
                </form>
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
