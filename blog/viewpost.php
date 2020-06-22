<?php require('includes/config.php');
$stmt = $db->prepare('SELECT * FROM sa_posts WHERE postSlug = :postSlug');
$stmt->execute(array(':postSlug' => $_GET['id']));
$row = $stmt->fetch();
//if post does not exists redirect user.
if($row['postID'] == ''){
	header('Location: ./');
	exit;
}
 ?>
<!DOCTYPE html>
<html>
   <head>
      <title>DiazCompany - <?php echo $row['postTitle'];?></title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name='keywords' content='<?php echo $row['postTitle'];?>'>
		<meta name='description' content='<?php echo $row['postCont']; ?>'>
		<meta name='copyright' content='softAOX'>
		<meta name='language' content='en'>
		<!-- <meta name='robots' content='index,follow'> -->
      <meta name="robots" content="noindex, nofollow">

      <!--css-->
      <link href="assets/css/master.css" rel="stylesheet" type="text/css">
      <!--jquery-->
      <link rel="icon" type="image/png" href="assets/images/favicon.ico" sizes="16x16">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script src="assets/js/general.js" type="text/javascript"></script>
   </head>
   <body class="bg">
      <div class="top-line">
      </div>
      <!--end of line-->
      <div class="top-bar">
         <div class="logo">
            <a href="./"><img src="assets/images/diazcompany.jpg"/></a>
         </div>
         <!--end of logo-->
         <?php include ('includes/navbar.php'); ?>
		  <!--end navbar -->
      </div>
      <!--end of top bar-->
      <div class="all-container">
         <div class="row nopadding full-section">

            <div class="col-md-12 nopadding">
               <div class="col-md-7 nopadding">
                  <div class="blog-listing">

                  <?php
                  echo '<div>';
                     echo '<h1>'.$row['postTitle'].'</h1>';
                     echo  '<div class="blog-listing-one-img inner-page">';
                     echo  '<a href="'.$row['postSlug'].'"><img src="admin/uploads/'.$row['image'].'" width="100%"></a>';
                     echo '</div>';

                     echo'<div class="blog-listing-one-like-bookmark">';
                            echo '<ul>';
                              echo '<li><i class="fa fa-calendar" aria-hidden="true"></i><span> On:</span> '.date('jS M Y', strtotime($row['postDate'])).'</li>';

							  $stmt2 = $db->prepare('SELECT catTitle, catSlug FROM sa_categories, sa_post_categories WHERE sa_categories.catID = sa_post_categories.catID AND sa_post_categories.postID = :postID');
								$stmt2->execute(array(':postID' => $row['postID']));

								$catRow = $stmt2->fetchAll(PDO::FETCH_ASSOC);

								$links = array();
								foreach ($catRow as $cat)
								{
								    $links[] = "<a href='c-".$cat['catSlug']."'>".$cat['catTitle']."</a>";
								}

							   echo '<li><i class="fa fa-folder-open"></i><span> Category: </span>'.implode(", ", $links).'</li>';

                           echo '</ul>';
                        echo '</div>';

                     echo '<p>'.$row['postCont'].'</p>';
                  echo '</div>';
               ?>




                </div>
			    <!--end of blog listing-->
              </div>
               <!--end of col-md-7-->

               <div class="col-md-5 nopadding padding-left">
                <div id='sidebar'>
                    <?php require('sidebar.php'); ?>
                </div>
               </div>

               <!--end of col-05-->
            </div>
            <!--end of col-md-12-->
         </div>
         <!--end of row-->
      </div>
      <!--end of all container-->
      <?php include ('includes/footer.php'); ?>
      <!--end of footer-->
   </body>
</html>
