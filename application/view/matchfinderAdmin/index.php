<div class="container" style="margin-top: 80px;">
    <?php $this->renderFeedbackMessages(); 
    require_once('includes/settingsMenu.php'); ?>
    
    <div class="box content">
        <div class="editor-container">
            <h3>Edit Game Options</h3>
            <form method="post" action="<?php $response_game = add_matchfinder_filter(); ?>">
                <input style="width:40%; display:inline-block;" class="form-control" name="display_game" placeholder="Display Name">
                <input style="width:40%; display:inline-block;" class="form-control" name="server_game" placeholder="Server Name (no spacing)">
                <button type="submit" name="submit-game" value="Submit" />
            </form>
            <?php echo $response_game ?>
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Display Name</th>
                        <th>Server Name (no spacing)</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $result = query_matchfinder_db($database = 'matchfinder_game');
                        
                        $x = 1;
                    
                        while ($row = mysqli_fetch_assoc($result)) { ?>
                            <tr>
                                <th scope="row"><?php echo $x; $x ++;?></th>
                                <td><?php echo $row['game_display_name']; ?></td>
                                <td><?php echo $row['game_server_name']; ?></td>
                                <td><a style="color: black;" href="">Delete</a>/<a style="color: black;" href="">Edit</a></td>
                            </tr>
                        <?php }
                    ?>
                </tbody>
            </table>
        </div>
        
        <hr>
        
        <div class="editor-container">
            <h3>Edit Region Options</h3>
            <form method="post" action="<?php $response_region = add_matchfinder_filter(); ?>">
                <input style="width:40%; display:inline-block;" class="form-control" name="display_region" placeholder="Display Name">
                <input style="width:40%; display:inline-block;" class="form-control" name="server_region" placeholder="Server Name (no spacing)">
                <input style="width:40%; display:inline-block;" class="form-control" name="image_region" placeholder="Server Name (no spacing)">
                <button class="btn btn-success" type="submit" name="submit-region" value="Submit">Add</button>
            </form>
            <?php echo $response_region ?>
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Display Name</th>
                        <th>Server Name (no spacing)</th>
                        <th>Attached Images</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $result = query_matchfinder_db($database = 'matchfinder_region');
                        
                        $x = 1;
                    
                        while ($row = mysqli_fetch_assoc($result)) { ?>
                            <tr>
                                <th scope="row"><?php echo $x; $x ++;?></th>
                                <td><?php echo $row['region_display_name']; ?></td>
                                <td><?php echo $row['region_server_name']; ?></td>
                                <td><?php echo $row['region_image']; ?></td>
                                <td><a style="color: black;" href="">Delete</a>/<a style="color: black;" href="">Edit</a></td>
                            </tr>
                        <?php }
                    ?>
                </tbody>
            </table>
        </div>
        
        <hr>
        
        <div class="editor-container">
            <h3>Edit Platform Options</h3>
    
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Display Name</th>
                        <th>Server Name (no spacing)</th>
                        <th>Attached Images</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $result = query_matchfinder_db($database = 'matchfinder_platform');
                        
                        $x = 1;
                    
                        while ($row = mysqli_fetch_assoc($result)) { ?>
                            <tr>
                                <th scope="row"><?php echo $x; $x ++;?></th>
                                <td><?php echo $row['platform_display_name']; ?></td>
                                <td><?php echo $row['platform_server_name']; ?></td>
                                <td><?php echo $row['platform_image']; ?></td>
                                <td><a style="color: black;" href="">Delete</a>/<a style="color: black;" href="">Edit</a></td>
                            </tr>
                        <?php }
                    ?>
                </tbody>
            </table>
        </div>
        
    </div>
</div>