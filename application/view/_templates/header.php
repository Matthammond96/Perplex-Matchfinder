<!doctype html>
<html>
<head>
    <title>Welcome to Perplex.gg</title>
    <!-- META -->
    <meta charset="utf-8">
    <!-- send empty favicon fallback to prevent user's browser hitting the server for lots of favicon requests resulting in 404s -->
    <link rel="icon" href="data:;base64,=">
    <!-- CSS Linked internally -->
    <!--    <link rel="stylesheet" href="<?php //echo Config::get('URL'); ?>css/style.css" />-->
    
    
    
    <link href="<?php echo Config::get('URL'); ?>css/bootstrap.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="<?php echo Config::get('URL'); ?>css/style.css" />
    <link rel="stylesheet" href="<?php echo Config::get('URL'); ?>css/playerCards.css" />
    <link rel="stylesheet" href="<?php echo Config::get('URL'); ?>css/nav.css" />
    <link rel="stylesheet" href="<?php echo Config::get('URL'); ?>css/footer.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
    
    
</head>
 <body data-spy="scroll" data-target=".navbar-collapse"> 
     
     <?php
        require_once('includes/connection.php');
        include('includes/perplexPHPfunctions.php');
     ?>

     <div id="eminem"></div>   
        
     <div class="navbar navbar-defaul navBlack">
         <div class="container"> 
        
             <div class="navbar-header">          
                 <a href="../../index.html" class="navbar-brand">
                     <img class="navLogo" src="http://perplex.gg/images/perplexNav.png">
                 </a>        
                 <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">            
                     <span class="sr-only">Toggle Navigation</span>            
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>            
                 </button>                
             </div>
             
             <div class="collapse navbar-collapse navbar-right">          
                 <ul class="nav navbar-nav">      
                     
                     <li <?php if (View::checkForActiveController($filename, "index/index")) { echo ' class="active" '; } ?> >
                         <a href="<?php echo Config::get('URL'); ?>index/index">Home</a>
                     </li>
                     <li <?php if (View::checkForActiveController($filename, "matchfinder/index")) { echo ' class="active" '; } ?> >
                         <a href="<?php echo Config::get('URL'); ?>matchfinder/index">Matchfinder</a>
                     </li>
                     <li <?php if (View::checkForActiveControllerAndAction($filename, "news/index")) { echo ' class="active" '; } ?> >
                         <a href="<?php echo Config::get('URL'); ?>news/index">News</a>
                     </li>
                     
                     <li class="dropdown"> 
                         <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Teams<span class="caret"></span></a>
                         <ul class="dropdown-menu">
                             <?php
                                $teamNavQuery = "SELECT ID, team_name, team_display_name FROM teamDatabase ORDER BY ID ASC";
                                $result = mysqli_query($connection, $teamNavQuery);
                             
                                while($teamNavRow = mysqli_fetch_assoc($result)){ ?>
                             
                                    <li <?php if (View::checkForActiveControllerAndAction($filename, "teams/index")) { echo ' class="active" '; } ?> >
                                        <a href="<?php echo Config::get('URL'); ?>teams/index?TEAM=<?php echo $teamNavRow['team_name']; ?>"><?php echo $teamNavRow['team_display_name']; ?></a>
                                    </li>
                             
                             
                             
                                
                                <?php } ?> 
                         </ul> 
                     </li>
                     
                     <!-- IF LOGGED IN -->
                     <?php if (Session::userIsLoggedIn()) { ?>
                     
                     <li class="dropdown loginDropdown"> 
                         <a href="#" class="dropdown-toggle loginDropdownA" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="color:#ef7a23;"><?php echo Session::get('user_name'); ?><span class="caret"></span></a>
                         <ul class="dropdown-menu">
                             <!-- My Account -->
                             <li style="color:black;" <?php if (View::checkForActiveController($filename, "user")) { echo ' class="active" '; } ?> >
                                 <a href="<?php echo Config::get('URL'); ?>user/index">My Account</a>
                                 <ul class="navigation-submenu">
<!--
                                     <li <?php //if (View::checkForActiveController($filename, "user")) { echo ' class="active" '; } ?> >
                                         <a href="<?php //echo Config::get('URL'); ?>user/changeUserRole">Change account type</a>
                                     </li>
-->
                                     <li <?php if (View::checkForActiveController($filename, "user")) { echo ' class="active" '; } ?> >
                                         <a href="<?php echo Config::get('URL'); ?>user/editAvatar">Edit your avatar</a>
                                     </li>
                                     <li <?php if (View::checkForActiveController($filename, "user")) { echo ' class="active" '; } ?> >
                                         <a href="<?php echo Config::get('URL'); ?>user/editusername">Edit my username</a>
                                     </li>
                                     <li <?php if (View::checkForActiveController($filename, "user")) { echo ' class="active" '; } ?> >
                                         <a href="<?php echo Config::get('URL'); ?>user/edituseremail">Edit my email</a>
                                     </li>
                                     <li <?php if (View::checkForActiveController($filename, "user")) { echo ' class="active" '; } ?> >
                                         <a href="<?php echo Config::get('URL'); ?>user/changePassword">Change Password</a>
                                     </li>
                                     <li <?php if (View::checkForActiveController($filename, "login")) { echo ' class="active" '; } ?> >
                                         <a href="<?php echo Config::get('URL'); ?>login/logout">Logout</a>
                                     </li>
                                 </ul>
                             </li>
                             <!-- Log Out -->
                             <li <?php if (View::checkForActiveController($filename, "login")) { echo ' class="active" '; } ?> >
                                 <a href="<?php echo Config::get('URL'); ?>login/logout">Logout</a>
                             </li>
                             <!-- IF Admin -->
                             <?php if (Session::get("user_account_type") == 7) : ?>
                                <li <?php if (View::checkForActiveController($filename, "admin")) {
                                    echo ' class="active" ';
                                } ?> >
                                    <a href="<?php echo Config::get('URL'); ?>admin/">Admin Settings</a>
                                </li>
                            <?php endif; ?>
                         </ul>
                     </li>
        
                     <?php } else { ?>
                     
                     <!-- Not Logged In / Login & Register -->
                     <li class="dropdown loginDropdown"> 
                         <a href="#" class="dropdown-toggle loginDropdownA" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Login/Register<span class="caret"></span></a>
                         <ul class="dropdown-menu" style="width: 510px;">
                             
                             <div id="rightLogin" style="width:300px; display:inline-block;">
                                 
                                 <form action="<?php echo Config::get('URL'); ?>login/login" method="post">
                                     <input class="form-control" type="text" name="user_name" placeholder="Username or email" required />
                                     <input class="form-control" type="password" name="user_password" placeholder="Password" required />
                                     <input class="form-control" type="checkbox" name="set_remember_me_cookie" class="remember-me-checkbox" style="width:10px; margin:0; float:none"/>
                                     <p>Remember me for 2 weeks</p>
                                     
                                     <!-- when a user navigates to a page that's only accessible for logged a logged-in user, then
the user is sent to this page here, also having the page he/she came from in the URL parameter
(have a look). This "where did you came from" value is put into this form to sent the user back
there after being logged in successfully.
Simple but powerful feature, big thanks to @tysonlist. -->
                                   
                                     <!--
set CSRF token in login form, although sending fake login requests mightn't be interesting gap here.
If you want to get deeper, check these answers:
1. natevw's http://stackoverflow.com/questions/6412813/do-login-forms-need-tokens-against-csrf-attacks?rq=1
2. http://stackoverflow.com/questions/15602473/is-csrf-protection-necessary-on-a-sign-up-form?lq=1
3. http://stackoverflow.com/questions/13667437/how-to-add-csrf-token-to-login-form?lq=1
-->
                                     <input class="form-control" type="hidden" name="csrf_token" value="<?= Csrf::makeToken(); ?>" />
                                     <input class="login-submit-button form-control btn btn-success" type="submit" value="Log in"/>
                                 </form>
                                 
                                 <div class="link-forgot-my-password">
                                     <a style="color:black;" href="<?php echo Config::get('URL'); ?>login/requestPasswordReset">I forgot my password</a>
                                 </div>
                                 
                             </div>   
                             
                             <div id="leftLogin" style="width:200px; display:inline-block;">
                                 
                                 <a class="form-control btn btn-success" type="submit" href="<?php echo Config::get('URL'); ?>register/index"/>Register</a>
                             
                             </div>
                         
                 </ul>
                 </li>
         </div>
         
         <?php } ?>
         
         
         
         </ul>    
     </div> 
    
    </div>  
</div>

