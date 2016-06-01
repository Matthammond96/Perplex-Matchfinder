<?php

/**
 * RegisterController
 * Register new user
 */
class MatchfinderAdminController extends Controller {
    /**
     * Construct this object by extending the basic Controller class. The parent::__construct thing is necessary to
     * put checkAuthentication in here to make an entire controller only usable for logged-in users (for sure not
     * needed in the RegisterController).
     */
    public function __construct()
    {
        parent::__construct();

        // special authentication check for the entire controller: Note the check-ADMIN-authentication!
        // All methods inside this controller are only accessible for admins (= users that have role type 7)
        Auth::checkAdminAuthentication();
    }

    /**
     * Register page
     * Show the register form, but redirect to main-page if user is already logged-in
     */
    public function index()
    {
        if (LoginModel::isUserLoggedIn()) {
            $this->View->render('matchfinderAdmin/index');
        } else {
            Redirect::home();
        }
    }

    public function game()
    {
        $this->View->render('matchfinderAdmin/game');
    }
    
    public function region()
    {
        $this->View->render('matchfinderAdmin/region');
    }
    
}