<div class="container">
    <!-- echo out the system feedback (error and success messages) -->
    <?php $this->renderFeedbackMessages(); ?>
    
    <?php require_once('includes/settingsMenu.php'); ?>
    
    <div class="box content">
        <h2>Post New News Article</h2>
        <form action="<?php $response = post_newArticle(); ?>" method="post">
            <input class="form-control" type="text" name="news_headline" placeholder="Enter Headline" required />
            <br>
            <textarea style="height: 300px;" class="form-control" type="text" name="news_article" placeholder="Write Away" required></textarea>
<!--            <input class="form-control" type="text" name="news_author" placeholder="By" required />-->
            <button class="btn btn-success floatRight" type="submit" name="submit" value="Submit">Publish Article</button>
        </form>
        
        <p>Writen by: <?= $this->user_name; ?></p>
        <?php echo $response; ?>
    </div>
    
</div>