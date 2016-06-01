<?php    
    $teamQueryH = "SELECT * FROM teamDatabase WHERE team_name = '$_GET[TEAM]'";
    $teamResultH = mysqli_query($connection, $teamQueryH);
    $teamRowH = mysqli_fetch_assoc($teamResultH);    
    $teamID = $teamRowH['ID']; 
?>  
    
        
      
        <div class="container contentContainer" id="about" style="background-color: white;">
        
            <div class="row" class="center">                
                <h1 class="center title">Perplex eSports <?php echo $teamRowH['team_display_name']; ?> Team</h1>
                <p class="lead center marginBottom thinFont"><?php echo $teamRowH['team_description']; ?></p>
            </div>
        
            <div class="row marginBottom">
                <p class="lead center thinFont">Click on each headshot to view their profile!</p>
                
                <div class="col-md-1"></div>
                <?php 
                    $playerQuery = "SELECT * FROM playerDatabase WHERE team_ID = '$teamID'";
                    $playerResult = mysqli_query($connection, $playerQuery);
                ?>
                <div class="col-md-10">
                <?php
                    while($playerRow = mysqli_fetch_assoc($playerResult)){
                        
                        if ($teamRowH['team_player_size'] === '3') {
                            ?> <div class="col-xs-6 col-sm-4"> <?php
                        } else if ($teamRowH['team_player_size'] === '4') {
                            ?> <div class="col-xs-6 col-sm-3"> <?php
                        } else if ($teamRowH['team_player_size'] === '5') {
                            ?> <div class="col-xs-6 col-sm-2"> <?php
                        } ?> 
                     
                        <div class="profilePic" data-profileinfo-name="<?php echo $playerRow["player_name"]; ?>" data-profileinfo-nickname="<?php echo $playerRow["player_nickname"]; ?>" data-profileinfo-role="<?php echo $playerRow["player_role"]; ?>" data-profileinfo-since="<?php  echo $playerRow["player_since"]; ?>" data-profileinfo-joined="<?php echo $playerRow["player_joined"]; ?>" data-profileinfo-bio="<?php echo $playerRow["player_bio"]; ?>" data-profilesocial-twitter="<?php echo $playerRow["player_twitter"]; ?>" data-profilesocial-twitch="<?php echo $playerRow["player_twitch"]; ?>" data-profilesocial-youtube="<?php echo $playerRow["player_youtube"]; ?>" data-full-picture="<?php echo $playerRow["player_full_image"];?>">
                        
                            <img class="facePic" src="images/player/<?php echo $playerRow["player_profile_image"];?>"> 
                        </div>
                        <h3 class="center"><?php echo $playerRow["player_nickname"]; ?></h3>
                    </div>  
                <?php
                    };                
                ?>
                                                  
                </div>
                <div class="col-md-1"></div>    
                
                
                   
            </div>
            
            <?php 
                $playerCardQuery = "SELECT * FROM playerDatabase WHERE team_ID = '$teamID' AND player_captain = 'true' LIMIT 0 , 1";
                $playerCardResult = mysqli_query($connection, $playerCardQuery);
                
                while($playerCardRow = mysqli_fetch_assoc($playerCardResult)) {
            ?>
            
            <div class="row" id="playerCard">
                <div class="gradient-border-left">
                <div class="gradient-border-right">
                <div class="playerCard whiteText">
                    <div class="col-md-3">
                        <img  class="facePic marginTop" id="data-full-picture" src="images/player/<?php echo $playerCardRow["player_full_image"];?>">
                    </div>
                    <div class="col-md-9">
                        <h1 class="center" id="data-profileinfo-nickname"><?php echo $playerCardRow["player_nickname"]; ?></h1>
                        <h3>Name: <span class="thinFont" id="data-profileinfo-name"><?php echo $playerCardRow["player_name"]; ?></span></h3>
                        <h3>Role: <span class="thinFont" id="data-profileinfo-role"><?php echo $playerCardRow["player_role"]; ?></span></h3>
                        <h3>Competed Since: <span class="thinFont" id="data-profileinfo-since"><?php echo $playerCardRow["player_since"]; ?></span></h3>
                        <h3>Joined Perplex: <span class="thinFont" id="data-profileinfo-joined"><?php echo $playerCardRow["player_joined"]; ?></span></h3>
                        <h3>Bio:</h3>
                        <p id="data-profileinfo-bio"><?php echo $playerCardRow["player_bio"]; ?></p>
                        <div class="marginBottom"></div>
                        <!--Social Media Links-->
                        <div class="marginBottom">
                            <a class="playerSocial" id="data-profilesocial-youtube" href="<?php echo $playerCardRow["player_youtube"]; ?>"><img src="images/youtubeFooter.png"> Youtube</a>
                            <a class="playerSocial" id="data-profilesocial-twitch" href="<?php echo $playerCardRow["player_twitch"]; ?>"><img src="images/twitch.png">Twitch</a>
                            <a class="playerSocial" id="data-profilesocial-twitter" href="<?php echo $playerCardRow["player_twitter"]; ?>"><img src="images/twitterFooter.png">Tweeter</a>
                        </div>
                    </div>
                    </div>
                    </div>
                </div>
            </div>
             
            <hr>
      
            <?php }; ?>
        
        </div>