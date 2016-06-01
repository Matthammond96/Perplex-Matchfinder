<div class="StartofIndex container contentContainer" id="about" style="background-color: white;" data-image-link="http://perplex.gg/images/codeuheader.png">
    <?php
        $newsQuery = "SELECT * FROM newsDatabase ORDER BY ID DESC LIMIT 0,10";
        $newsResult  = mysqli_query($connection, $newsQuery);
        
    ?>
    
    <div class="container contentContainer" id="about" style="background-color: white;">
        <div>
            <h1>News</h1>
            <hr>
            <?php 
                while($newsRow = mysqli_fetch_assoc($newsResult)) {
            ?>
            <div class="newsPost">
                <a href="<?php echo Config::get('URL') . 'article/index?article=' . $newsRow['news_headline'] ?>"><h3 style="color: #333"><?php echo $newsRow['news_headline']; ?> - <?php echo $newsRow['news_timestamp']; ?></h3></a>
                 <p><?php 
                        
                    $stringOG = $newsRow['news_article'];
                    $StringLeng = 200;
                    //$hrefLoc = '<a href="article.php?='+ $newsRow['news_headline']; + '" ';
                        
                    $string = strip_tags($stringOG);

                    if (strlen($string) > $StringLeng) {
                        // truncate string
                        $stringCut = substr($string, 0, $StringLeng);
                        // make sure it ends in a word so assassinate doesn't become ass...
                        $string = substr($stringCut, 0, strrpos($stringCut, ' ')).'... '; 
                    }
                    
                    echo $string;   
                    echo '<a href="' . Config::get('URL') . 'article/index?article=', $newsRow['news_headline'] ,'" style="color:#333;">Read More</a>';
                        
                    ?></p>
                    <p>Author: <?php echo $newsRow['news_author']; ?></p>
                    <hr>
                </div>  
            
                <?php } ?>
            </div>
        </div>
</div>