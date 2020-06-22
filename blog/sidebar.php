  <div class="right-box sidebar">
     <!--end of search-->
     <div class="right-card latest">
        <div class="head">
           <h4>Recent Posts</h4>
        </div>
        <!--end of head-->
        <div class="blog-listing-one blog-listing-one-latest">
            <?php
            $stmt = $db->query('SELECT * FROM sa_posts ORDER BY postID DESC LIMIT 5');
            while($row = $stmt->fetch()){
            echo '<div class="well">';
                echo '<div class="media">';
                echo '<a class="pull-left" href="'.$row['postSlug'].'">';
                echo '<img class="media-object" src="admin/uploads/'.$row['image'].'" width="100%">';
                echo '</a>';
                  echo '<div class="media-body">';
                   
                    $string = $row['postTitle'];
                    if (strlen($string) > 80) {
                    $trimhead = substr($string, 0, 80);
                    } else {
                    $trimhead = $string;
                    }
                    
                    echo '<h4 class="media-heading"><a href="'.$row['postSlug'].'">'.$trimhead.'</a></h4>';
                  
                      echo '<ul class="list-inline list-unstyled">';
                          echo '<li>
                              <span><i class="fa fa-calendar" aria-hidden="true"></i> '.date('M jS Y', strtotime($row['postDate'])).'</span>
                            </li>';
                        echo '</ul>';
                    echo '</div>';
                 echo '</div>';
                echo '</div>';
                    }
                    ?>
            </div>
      </div>
      <!--Start of Catgories-->
      <div class="right-card latest">
        <div class="head">
           <h4>Catgories</h4>
        </div>
        <!--Start of List-->
        <div class="panel panel-info">
                <ul class="list-group">
                    <?php
                    $stmt = $db->query('SELECT catTitle, catSlug FROM sa_categories ORDER BY catID DESC');
                    while($row = $stmt->fetch()){
                         echo '<a href="c-'.$row['catSlug'].'" class="list-group-item">'.$row['catTitle'].'</a>';
                     }
                    ?>
                </ul>
            </div>
      </div>
       <!--Archives of Catgories-->
      <div class="right-card latest">
        <div class="head">
           <h4>Archives</h4>
        </div>
        <!--Start of List-->
        <div class="panel panel-info">
                <ul class="list-group">
                    <?php
                    $stmt = $db->query("SELECT Month(postDate) as Month, Year(postDate) as Year FROM sa_posts GROUP BY Month(postDate), Year(postDate) ORDER BY postDate DESC");
                    while($row = $stmt->fetch()){
                        $monthName = date("F", mktime(0, 0, 0, $row['Month'], 10));
                        $slug = 'a-'.$row['Month'].'-'.$row['Year'];
                         echo '<a href='.$slug.' class="list-group-item">'.$monthName.'</a>';
                     }
                    ?>
                </ul>
         </div>
      </div>
     <!--end of tags-->
  </div>
  <!--end of right box-->
