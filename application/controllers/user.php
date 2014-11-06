<?php

/**
 * User Controller
 * Controls the user mgmt
 */

class User extends Controller
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
        Auth::isRH();
    }

    /**
     * Index, default action (shows the login form), when you do login/index
     */
    function index()
    {
        $user_model = $this->loadModel('User');
        $this->view->users = $user_model->getAllUsersProfiles();
        $this->view->render('user/index');
    }

    /**
     * The login action, when you do login/login
     */
    function login()
    {
        // run the login() method in the login-model, put the result in $login_successful (true or false)
        $login_model = $this->loadModel('Login');
        // perform the login method, put result (true or false) into $login_successful
        $login_successful = $login_model->login();

        // check login status
        if ($login_successful) {
            // if YES, then move user to dashboard/index (btw this is a browser-redirection, not a rendered view!)
            header('location: ' . URL . 'dashboard/index');
        } else {
            // if NO, then move user to login/index (login form) again
            header('location: ' . URL . 'login/index');
        }
    }

    

    /**
     * Edit user name (show the view with the form)
     */
    function editUsername()
    {
        // Auth::handleLogin() makes sure that only logged in users can use this action/method and see that page
        Auth::handleLogin();
        $this->view->render('login/editusername');
    }

    /**
     * Edit user name (perform the real action after form has been submitted)
     */
    function editUsername_action()
    {
        // Auth::handleLogin() makes sure that only logged in users can use this action/method and see that page
        // Note: This line was missing in early version of the script, but it was never a real security issue as
        // it was not possible to read or edit anything in the database unless the user is really logged in and
        // has a valid session.
        Auth::handleLogin();
        $login_model = $this->loadModel('Login');
        $login_model->editUserName();
        $this->view->render('login/editusername');
    }

    /**
     * Edit user email (show the view with the form)
     */
    function editUserEmail()
    {
        // Auth::handleLogin() makes sure that only logged in users can use this action/method and see that page
        Auth::handleLogin();
        $this->view->render('login/edituseremail');
    }

    /**
     * Edit user email (perform the real action after form has been submitted)
     */
    function editUserEmail_action()
    {
        // Auth::handleLogin() makes sure that only logged in users can use this action/method and see that page
        // Note: This line was missing in early version of the script, but it was never a real security issue as
        // it was not possible to read or edit anything in the database unless the user is really logged in and
        // has a valid session.
        Auth::handleLogin();
        $login_model = $this->loadModel('Login');
        $login_model->editUserEmail();
        $this->view->render('login/edituseremail');
    }

    /**
     * Upload avatar
     */
    function uploadAvatar()
    {
        // Auth::handleLogin() makes sure that only logged in users can use this action/method and see that page
        Auth::handleLogin();
        $login_model = $this->loadModel('Login');
        $this->view->avatar_file_path = $login_model->getUserAvatarFilePath();
        $this->view->render('login/uploadavatar');
    }

   
    /**
     * Register page
     * Show the register form (with the register-with-facebook button). We need the facebook-register-URL for that.
     */
    function register()
    {
        $user_model = $this->loadModel('User');
        $this->view->render('user/register');
    }
   
   
    /**
     * Register page action (after form submit)
     */
    function register_action()
    {
        $user_model = $this->loadModel('User');
        $registration_successful = $user_model->registerNewUser();

        if ($registration_successful == true) {
            header('location: ' . URL . 'user/index');
        } else {
            header('location: ' . URL . 'user/register');
        }
    }

    function delete_action($user_id)
    {
        $user_model = $this->loadModel('User');
        $delete_successful = $user_model->deleteUser($user_id);


        if ($delete_successful == true) {
            header('location: ' . URL . 'user/index');
        } else {
            header('location: ' . URL . 'user/index');
        }
    }



    /**
     * This method controls what happens when you move to /user/profile in your app.
     * Shows the (public) details of the selected user.
     * @param $user_id int id the the user
     */
    function profile($user_id)
    {
        if (isset($user_id)) {
            $user_model = $this->loadModel('User');
            $this->view->user = $user_model->getUserProfile($user_id);
            $this->view->render('user/showuserprofile');
        } else {
            header('location: ' . URL);
        }
    }
}
