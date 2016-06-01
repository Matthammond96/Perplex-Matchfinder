<?php

class NewArticleController extends Controller
{
    /**
     * Construct this object by extending the basic Controller class
     */
    public function __construct()
    {
        parent::__construct();

        // special authentication check for the entire controller: Note the check-ADMIN-authentication!
        // All methods inside this controller are only accessible for admins (= users that have role type 7)
        Auth::checkAdminAuthentication();
    }

    /**
     * This method controls what happens when you move to /admin or /admin/index in your app.
     */
    public function index()
    {
	    $this->View->render('newArticle/index', array(
                'user_name' => Session::get('user_name'),
                'user_email' => Session::get('user_email'),
                'user_gravatar_image_url' => Session::get('user_gravatar_image_url'),
                'user_avatar_file' => Session::get('user_avatar_file'),
                'user_account_type' => Session::get('user_account_type')
            ));
    }
}