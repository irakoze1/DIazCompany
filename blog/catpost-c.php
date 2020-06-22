<?php require('includes/config.php');


$stmt = $db->prepare('SELECT catID,catTitle FROM sa_categories WHERE catSlug = :catSlug');
$stmt->execute(array(':catSlug' => $_GET['id']));
$row = $stmt->fetch();

//if post does not exists redirect user.
if($row['catID'] == ''){
	header('Location: ./');
	exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>DiazCompany - <?php echo $row['catTitle'];?></title>
	<meta name='robots' content='index,follow'>
    <link rel="stylesheet" href="style/normalize.css">
    <link rel="stylesheet" href="style/main.css">
</head>
<body>

	<div id="wrapper">

		<h1>Blog</h1>
		<p>Posts in <?php echo $row['catTitle'];?></p>
		<hr />
		<p><a href="./">Blog Index</a></p>

		<div id='main'>

			<?php
			try {

				$pages = new Paginator('1','p');

				$stmt = $db->prepare('SELECT sa_posts.postID FROM sa_posts, sa_post_categories WHERE sa_posts.postID = sa_post_categories.postID AND sa_post_categories.catID = :catID');
				$stmt->execute(array(':catID' => $row['catID']));

				//pass number of records to
				$pages->set_total($stmt->rowCount());

				$stmt = $db->prepare('
					SELECT
						sa_posts.postID, sa_posts.postTitle, sa_posts.postSlug, sa_posts.postDesc, sa_posts.postDate
					FROM
						sa_posts,
						sa_post_categories
					WHERE
						 sa_posts.postID = sa_post_categories.postID
						 AND sa_post_categories.catID = :catID
					ORDER BY
						postID DESC
					'.$pages->get_limit());
				$stmt->execute(array(':catID' => $row['catID']));
				while($row = $stmt->fetch()){

					echo '<div>';
						echo '<h1><a href="'.$row['postSlug'].'">'.$row['postTitle'].'</a></h1>';
						echo '<p>Posted on '.date('jS M Y H:i:s', strtotime($row['postDate'])).' in ';

							$stmt2 = $db->prepare('SELECT catTitle, catSlug	FROM sa_categories, sa_post_categories WHERE sa_categories.catID = sa_post_categories.catID AND sa_post_categories.postID = :postID');
							$stmt2->execute(array(':postID' => $row['postID']));

							$catRow = $stmt2->fetchAll(PDO::FETCH_ASSOC);

							$links = array();
							foreach ($catRow as $cat)
							{
							    $links[] = "<a href='c-".$cat['catSlug']."'>".$cat['catTitle']."</a>";
							}
							echo implode(", ", $links);

						echo '</p>';
						echo '<p>'.$row['postDesc'].'</p>';
						echo '<p><a href="'.$row['postSlug'].'">Read More</a></p>';
					echo '</div>';

				}

				echo $pages->page_links('c-'.$_GET['id'].'&');

			} catch(PDOException $e) {
			    echo $e->getMessage();
			}

			?>

		</div>

		<div id='sidebar'>
			<?php require('sidebar.php'); ?>
		</div>

		<div id='clear'></div>

	</div>


</body>
</html>
