    <div class="footer">
            
        <div class="row  footer">
            
            <a href="teams.html">
                <div class="col-md-4 borderRight footerHeaders" style="margin-right: 0px; margin-left: 0px;">
                    <h2><span class="glyphicon glyphicon-user"></span> Teams</h2>
                    <p>Discover the wide range of talent within our teams. Ranging from Call of Duty to Counter Strike!</p>
                </div>
            </a>
            
            <a href="matchfinder.php">
                <div class="col-md-4 borderRight footerHeaders">
                    <h2><span class="glyphicon glyphicon-screenshot"></span> MatchFinder</h2>
                    <p>A place to find new lobby's, whether it be Call of Duty 8's lobby's or GTA Heists. All under one roof!</p>
                </div>
            </a>
            
            <a href="www.gamersapparel.co.uk">
                <div class="col-md-4 footerHeaders">
                    <h2><span class="glyphicon glyphicon-shopping-cart"></span> Shop</h2>
                    <p>Purchase the latest Perplex gear!</p> <br />
                </div>
            </a>
            
        </div>
        
        <div class="row footer socialFooter" style="margin-right: 0px; margin-left: 0px;">
            
            <div class="col-md-9 col-md-push-3">
            
                <a href="https://www.youtube.com/channel/UC5TqNry1Ion_JcF_dNN5M9A"><img src="images/youtubeFooter.png"></a>
                <a href="https://www.twitch.tv/perplex_esports"><img src="images/twitch.png"></a>
                <a href="https://twitter.com/Perplex_eSports"><img src="images/twitterFooter.png"></a>
            
            </div>
            
            <div class="col-md-3 col-md-pull-9">
                <p>Copyright &copy; 2016 - Perplex eSports</p>
            </div>
            
        </div>
        
    </div>

    
    <script src="<?php echo Config::get('URL'); ?>js/parralax.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            
            var imageSrc = $('.StartofIndex').attr('data-image-link');
            
            
            if (imageSrc == undefined) {
                
            } else {
                $('#eminem').append(' <img id="headerImage" src="' + imageSrc + '"> ');
            }
             
        })
    </script>
    <style>.navbar-nav li:hover {background-color: rgba(255, 255, 255, 0);}</style>
</body>
</html>