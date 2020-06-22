<?php require('includes/config.php'); ?>
<!DOCTYPE html>
<html>
   <head>
      <title>DiazCompany - Archives</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name='robots' content='index,follow'>
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
            <a href="index.php"><img src="assets/images/diazcompany.jpg"/></a>
         </div>
		 <!--end of logo-->
		 <?php include ('includes/navbar.php'); ?>
		  <!--end navbar -->

      </div>
      <!--end of top bar-->
      <div class="all-container">

	 	 <h1>DiazCompany</h1>
		<hr />
		<p><a href="./" >Back</a></p>

         <div class="row nopadding">

            <div class="col-md-12 nopadding">
               <div class="col-md-7 nopadding">
                  <div class="blog-listing">


				  <?php
				try {

					//collect month and year data
					$month = $_GET['month'];
					$year = $_GET['year'];

					//set from and to dates
					$from = date('Y-m-01 00:00:00', strtotime("$year-$month"));
					$to = date('Y-m-31 23:59:59', strtotime("$year-$month"));


					$pages = new Paginator('4','p');

					$stmt = $db->prepare('SELECT postID FROM sa_posts WHERE postDate >= :from AND postDate <= :to');
					$stmt->execute(array(
						':from' => $from,
						':to' => $to
				 	));

					//pass number of records to
					$pages->set_total($stmt->rowCount());

					$stmt = $db->prepare('SELECT * FROM sa_posts WHERE postDate >= :from AND postDate <= :to ORDER BY postID DESC '.$pages->get_limit());
					$stmt->execute(array(
						':from' => $from,
						':to' => $to
				 	));
					while($row = $stmt->fetch()){

					echo '<div class="blog-listing-one">';

						echo '<h2><a href="'.$row['postSlug'].'">'.$row['postTitle'].'</a></h2>';
						echo  '<div class="blog-listing-one-img">';
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
						echo '<p>'.$row['postDesc'].'</p>';
						echo '<a href="'.$row['postSlug'].'" class="btn-readmore">Continue Reading</a>';
					echo '</div>';

				}

				echo $pages->page_links("a-$month-$year&");

				} catch(PDOException $e) {
				    echo $e->getMessage();
				}
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
