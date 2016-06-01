<style>
    h1 {
        color: white;
    }
    p {
        color: white;
    }
    
    .match-container-bottom {
        width: 100%;
    }
    
    .match-container-bottom .col-md-3 {
        height: 20px;
        vertical-align: middle;
    }
    
    .match-container-bottom .col-md-3 img {
        height: 100%;
    }
    
    .result-box:nth-child(odd) {
        background-color: #ffc467;
        border-radius: 3px;
    }
    
    .result-box:nth-child(even) {
        background-color: #f7a628;
        border-radius: 3px;
    }
</style>

<?php
    require_once('includes/perplexPHPfunctions.php');
    require_once('includes/connection.php');
?>
<?php
    //Set Varibles
    $gameFilter = '';
    $regionFilter = '';
    $consoleFilter = '';

    //Get String From URL
    if (array_key_exists('GAME', $_GET)) { $gameFilter = $_GET['GAME']; }
    if (array_key_exists('Region', $_GET)) { $regionFilter = $_GET['Region']; }
    if (array_key_exists('Console', $_GET)) { $consoleFilter = $_GET['Console']; }
    
    //Call Function
    $result = get_matchfinder($gameFilter, $regionFilter, $consoleFilter); 
?>
<?php while($row = mysqli_fetch_assoc($result)) { ?>

    
    <div class="box col-md-12 result-box">
        <div class="row">
            <div class="col-md-11">
                <h1><?php echo $row['game']; ?>: <?php echo $row['title'] ?></h1>
            </div>
            <div class="col-md-1">
                <p>
                    <?php echo $row['region']; ?>
                </p>
            </div>
        </div>

        <p>Description: <?php //echo $row["description"]; ?></p> <br />

        <div class="match-container-bottom row">
            <hr>
            <div class="col-md-3">
                <img src="<?php echo Config::get('URL'); ?>img/controllerIcon.png">
                <p style="display: inline-block; margin-left:7px;"><?php echo $row["console"]; ?></p>
            </div>
            <div class="col-md-3"><p>Gamertag: <?php //echo $row["user"]; ?></p></div>
            <div class="col-md-3">
                <p>
                    <span class="glyphicon glyphicon-time" style="text-align:left;"></span>
                    <?php
                            $timeago=get_timeago(strtotime($row['time']));
                            echo $timeago;
                        ?>
                </p>
            </div>
            <div class="col-md-3"><a href="">View Lobby</a></div>
            
        </div>
        
            <hr>
        
    </div>

<?php } ?>  