<div class="box menu">
        <ul>
            
            <a href="<?php echo Config::get('URL'); ?>user/index"><h3>My Account</h3></a>
            
            <!-- Upgrade account link to prem -->
<!--
            <li <?php //if (View::checkForActiveController($filename, "user")) { echo ' '; } ?> >
                <a href="<?php ///echo Config::get('URL'); ?>user/changeUserRole">Change account type</a>
            </li>
-->
            
            
            <li <?php if (View::checkForActiveController($filename, "user")) { echo ' '; } ?> >
                <a href="<?php echo Config::get('URL'); ?>user/editAvatar">Edit your avatar</a>
            </li>
            <li <?php if (View::checkForActiveController($filename, "user")) { echo ' '; } ?> >
                <a href="<?php echo Config::get('URL'); ?>user/editusername">Edit my username</a>
            </li>
            <li <?php if (View::checkForActiveController($filename, "user")) { echo ' '; } ?> >
                <a href="<?php echo Config::get('URL'); ?>user/edituseremail">Edit my email</a>
            </li>
            <li <?php if (View::checkForActiveController($filename, "user")) { echo ' '; } ?> >
                <a href="<?php echo Config::get('URL'); ?>user/changePassword">Change Password</a>
            </li>
            
            <!-- Admin Menu -->
            <?php if (Session::get("user_account_type") == 7) : ?>
                <li <?php if (View::checkForActiveController($filename, "admin")) { echo ' class="active" '; } ?> >
                    <a href="<?php echo Config::get('URL'); ?>admin/"><h3>Admin Tools</h3></a>
                </li>
                <li <?php if (View::checkForActiveController($filename, "admin")) { echo ' class="active" '; } ?> >
                    <a href="<?php echo Config::get('URL'); ?>admin/">User Adminstration</a>
                </li>
                <li <?php if (View::checkForActiveController($filename, "index")) { echo ' class="active" '; } ?> >
                    <a href="<?php echo Config::get('URL'); ?>newArticle/">Create New Article</a>
                </li>
                <li <?php if (View::checkForActiveController($filename, "game")) { echo ' class="active" '; } ?> >
                    <a href="<?php echo Config::get('URL'); ?>matchfinderAdmin/game">Matchfinder Game Editor</a>
                </li>
                <li <?php if (View::checkForActiveController($filename, "region")) { echo ' class="active" '; } ?> >
                    <a href="<?php echo Config::get('URL'); ?>matchfinderAdmin/region">Matchfinder Region Editor</a>
                </li>
                <li <?php if (View::checkForActiveController($filename, "index")) { echo ' class="active" '; } ?> >
                    <a href="<?php echo Config::get('URL'); ?>matchfinderAdmin/">Matchfinder Platform Editor</a>
                </li>
            <?php endif; ?>
            
            <!-- Log Out -->
            <hr>
            <li <?php if (View::checkForActiveController($filename, "login")) { echo ' '; } ?> >
                <a href="<?php echo Config::get('URL'); ?>login/logout">Logout</a>
            </li>
            
        </ul>
    </div>