<?php
    $newsQuery = "SELECT * FROM newsDatabase WHERE news_headline = '$_GET[article]'";
    $newsResult = mysqli_query($connection, $newsQuery);
    $newsRow = mysqli_fetch_assoc($newsResult); 
    $newsID = $newsRow['ID'];
?>

<div class="container contentContainer" id="about" style="background-color: white;">
<!--            <h1>News</h1>-->
            <h1 class="center"><?php echo $newsRow['news_headline'];?></h1>
            <p><?php echo $newsRow['news_article']?></p>
            <p><?php echo $newsRow['news_timestamp']?></p>
      
            <h3>Comments</h3>
            <p>Example Comment Example Comment Example Comment Example Comment Example CommentExample CommentExample Comment Example Comment</p>
  
        </div>