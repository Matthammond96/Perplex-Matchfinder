<div class="StartofIndex container contentContainer" id="about" style="background-color: white;" data-image-link="http://perplex.gg/images/perplexHomeHeader.png">
        
            <div class="row" class="center">
                <h1 class="center title">Perplex eSports</h1>
                <p class="lead center marginBottom thinFont">A Multi Platform eSports Organisation.</p>
            </div>
        
            <div class="row marginBottom">
                <div class="col-md-4">      
                    <h2><span class="glyphicon glyphicon-user"></span> Teams</h2>
                    <p class="thinFont">Discover the wide range of talent within our teams. Ranging from Call of Duty to Counter Strike!</p>
                    <button class="btn btn-success marginTop">Something Now!</button>
                </div>
                <div class="col-md-4">      
                    <h2><span class="glyphicon glyphicon-screenshot"></span> MatchFinder</h2>
                    <p class="thinFont">A place to find new lobby's, whether it be Call of Duty 8's lobby's or GTA Heists. All under one roof!</p>
                    <button class="btn btn-success marginTop">Discover Now!</button>
                </div>
                <div class="col-md-4">      
                    <h2><span class="glyphicon glyphicon-shopping-cart"></span> Shop</h2>
                    <p class="thinFont">Purchase the latest Perplex gear!</p> <br />
                    <button class="btn btn-success marginTop">Buy Now!</button>
                </div>        
            </div>    
        </div>
      
        <div class="container contentContainer" id="footer" style="padding-top:30px;">
            <div class="row" style="position: relative;">
                <h1 class="center title whiteText">Latest News</h1>
                <div class="col-md-12 newsContainer">
                
                <?php             
                    $newsQuery = "SELECT * FROM newsDatabase ORDER BY ID DESC LIMIT 0,3";
                    $newsResult  = mysqli_query($connection, $newsQuery);
                    while($newsRow = mysqli_fetch_assoc($newsResult)) {
                ?>
                    <div class="col-md-12 news">
                        <div class="newsPost center">
                            <a class="center whiteText" href="<?php $newsRow['news_headline']; ?>"><h3 class="center whiteText" id="newArticle"><?php echo $newsRow['news_headline']; ?> - <?php echo $newsRow['news_timestamp']; ?></h3></a>
                            <p class="center whiteText" id="newsPara"><?php 
                        
                                $stringOG = $newsRow['news_article'];
                                $StringLeng = 200;
                                $hrefLoc = '<a href="article.php?='+ $newsRow['news_headline']; + '" ';
                                
                                $string = strip_tags($stringOG);
        
                                   if (strlen($string) > $StringLeng) {
                                        //truncate string
                                       $stringCut = substr($string, 0, $StringLeng);
                                        // make sure it ends in a word so assassinate doesn't become ass...
                                       $string = substr($stringCut, 0, strrpos($stringCut, ' ')).'... '; 
                                 }
                                   echo $string;   
                                    
                                   echo '<a class="whiteText" href="article.php?=', $newsRow['news_headline'] ,'">Read More</a>';
                                    
                            ?></p>
                            <p class="center whiteText" id="newsAuthor">Author: <?php echo $newsRow['news_author']; ?></p>
                        </div>  
                    </div>
                    <?php } ?>
                    
                </div>
                
                <p class="whiteText" id="next">NEXT</p>
                <p class="whiteText" id="previous">Previous</p>
                
            </div>
            <br />  <br />  <br />  <br />  <br />
        </div>

<script src="<?php ?>/js/newScroller.js"></script>
