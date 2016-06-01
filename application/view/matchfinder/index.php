 <?php $this->renderFeedbackMessages(); ?>

<div class="StartofIndex content contentContainer" id="topContainer" data-image-link="http://dev.perplex.gg/images/matchfinder.jpg">
    <div class="row">   
        <div class="col-md-8 col-md-offset-2" id="bgColor">
            
            
            
            <h1 class="titleText orangeText">Match Finder</h1>  
            
            <?php 
                if (LoginModel::isUserLoggedIn()) {
                    ?> <button class="btn btn-success" id="postButton">Post A Match</button> <?php
                } else {
                    ?> <button class="btn btn-success" id="loginButton">Please Login</button> <?php
                }
            
            
                $gameValue = '';
                $regionValue = '';
                $consoleValue = '';
            ?>
            
            <!-- Filters -->
            <form class="sameLine floatRight">
                <select class="form-control filterRegion">
                    <option value="">Filter Region:</option>
                    <option value="na">NA</option>
                    <option value="eu">EU</option>
                    <option value="anz">ANZ</option>
                </select>
            </form>
            <form class="sameLine floatRight">
                <select class="form-control filterGame">
                    <option value="">Filter Game:</option>
                    <option value="BO3">BO3</option>
                    <option value="CSGO">CSGO</option>
                    <option value="GTA">GTA</option>
                </select>
            </form>
            <form class="sameLine floatRight">
                <select class="form-control filterConsole">
                    <option value="">Filter Console:</option>
                    <option value="ps4">PS4</option>
                    <option value="xb1">Xbox One</option>
                    <option value="pc">PC</option>
                </select>
            </form>    
            
            <div class="postHidden" id="formPost">
                <div class="row marginTop">
                    <div class="col-md-6">
                        <div class="form-group">                        
                            <form action="<?php $response = post_matchfinder(); ?>" method="post">
                                <input type="text" name="Gamertag" value="<?php //echo $_POST["Gamertag"]; ?>" class="form-control" placeholder="Gamertag:" id="gamertagWidth"> <br />
                                <select name="Game" class="form-control" id="sameLine">
                                    <option value="">Select Game:</option>
                                    <option <?php if ($gameValue == "BO3") { echo "selected"; }?> value="BO3">Black Ops III</option>
                                    <option <?php if ($gameValue == "CSGO") { echo "selected"; }?> value="CSGO">CS:GO</option>
                                    <option <?php if ($gameValue == "GTA") { echo "selected"; }?> value="GTA">GTA V</option>
                                </select> 
                                
                                <select name="Region" class="form-control" id="sameLine">
                                    <option value="">Select Region:</option>
                                    <option <?php if ($regionValue == "eu") { echo "selected"; }?> value="eu">EU</option>
                                    <option <?php if ($regionValue == "na") { echo "selected"; }?> value="na">NA</option>
                                    <option <?php if ($regionValue == "ANZ") { echo "selected"; }?> value="ANZ">ANZ</option>
                                </select>
                                <select name="Console" class="form-control" id="sameLine">
                                    <option value="">Select Console:</option>
                                    <option <?php if ($consoleValue == "ps4") { echo "selected"; }?> value="ps4">PS4</option>
                                    <option <?php if ($consoleValue == "xb1") { echo "selected"; }?> value="xb1">Xbox One</option>
                                    <option <?php if ($consoleValue == "pc") { echo "selected"; }?> value="pc">PC</option>
                                </select> 
                                <br /> <br />
                                <textarea type="text" name="Description" value="" class="form-control" placeholder="Message:" id="gamertagWidth"><?php //echo $_POST["Description"]; ?></textarea> <br />
                                <button style="width:100%;" class="btn btn-success floatRight" type="submit" name="submit" value="Submit">Submit Match</button>
                            </form>  
                            
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="alert alert-success tipDiv">
                            <h3>Tips for posting a match.</h3>
                            <li><ul>Make sure you spell your Gamertag correctly.</ul></li>
                            <li><ul>Be descriptive with what you are looking for.</ul></li>
                            <li><ul>Your post will expire after 3 hours.</ul></li>
                            
                        </div>
                    </div>
                </div>    
            </div>
            
            <hr>
            
            <div id="matchfinderLoader" data-backend="<?php echo Config::get('URL'); ?>">   
                <?php include_once('matcherJSON.php'); ?>
            </div>
        </div>
    </div>
</div>

<script>

    $(document).ready(function() {
        
        
       
        
        $('#loginButton').click(function(e){
            e.stopPropagation();
            $('.loginDropdownA').dropdown('toggle');
        });
        
        $("#postButton").click(function() {
            
            if ($("#formPost").height() == 0) {
                $("#formPost").removeClass("postHidden"); 
                $("#formPost").addClass("postForm");
            } else {
                $("#formPost").removeClass("postForm"); 
                $("#formPost").addClass("postHidden");
            }
        });
        
        var filterOne = "";
        var filterTwo = "";
        var filterThree = "";
        
        $("#matchfinderLoader").load($('#matchfinderLoader').attr('data-backend') + 'MatcherJSON.php?GAME=' + filterTwo +"&Region="+ filterOne +"&Console="+ filterThree);
        
        $(".filterRegion").change(function(){     
            filterOne = $(".filterRegion option:selected").val();
            filter();
        });
        
        $(".filterGame").change(function(){     
            filterTwo = $(".filterGame option:selected").val();
            filter();
        });
        
        $(".filterConsole").change(function(){
            filterThree = $(".filterConsole option:selected").val();
            filter();
        });
        
        
        
        function filter() {
            $("#matchfinderLoader").html("");
            $("#matchfinderLoader").load($('#matchfinderLoader').attr('data-backend') + 'MatcherJSON.php?GAME=' + filterTwo +"&Region="+ filterOne +"&Console="+ filterThree);
            
        };
    });

</script>