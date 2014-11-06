<?php

/**
 * Class Company
 * This controller shows the (public) account data of one or all user(s)
 */
class Company extends Controller
{
    /**
     * Construct this object by extending the basic Controller class
     */
    function __construct()
    {
        parent::__construct();

        // VERY IMPORTANT: All controllers/areas that should only be usable by logged-in users
        // need this line! Otherwise not-logged in users could do actions. If all of your pages should only
        // be usable by logged-in users: Put this line into libs/Controller->__construct
        Auth::handleLogin();
    }

    /**
     * This method controls what happens when you move to /overview/index in your app.
     * Shows a list of all users.
     */
    function index()
    {
        $overview_model = $this->loadModel('Overview');
        $this->view->users = $overview_model->getCompanyInformations();
        $this->view->render('company/index');
    }

    /**
     * This method controls what happens when you move to /overview/showuserprofile in your app.
     * Shows the (public) details of the selected user.
     * @param $user_id int id the the user
     */
    function showUserProfile($user_id)
    {
        if (isset($user_id)) {
            $overview_model = $this->loadModel('Overview');
            $this->view->user = $overview_model->getUserProfile($user_id);
            $this->view->render('overview/showuserprofile');
        } else {
            header('location: ' . URL);
        }
    }
}
