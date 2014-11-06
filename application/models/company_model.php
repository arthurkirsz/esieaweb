<?php

/**
 * CompanyModel
 *
 * Handles the Company CRUD
 */


class CompanyModel
{
    /**
     * Constructor, expects a Database connection
     * @param Database $db The Database object
     */
    public function __construct(Database $db)
    {
        $this->db = $db;
    }

    /**
     * Gets an array that contains all the users in the database. The array's keys are the user ids.
     * Each array element is an object, containing a specific user's data.
     * @return array The profiles of all users
     */
    public function getCompanyInformations()
    {
        $sth = $this->db->prepare("SELECT user_id, user_name, user_email, user_active, user_has_avatar FROM users");
        $sth->execute();

        $all_users_profiles = array();

        foreach ($sth->fetchAll() as $user) {
            // a new object for every user. This is eventually not really optimal when it comes
            // to performance, but it fits the view style better
            $all_users_profiles[$user->user_id] = new stdClass();
            $all_users_profiles[$user->user_id]->user_id = $user->user_id;
            $all_users_profiles[$user->user_id]->user_name = $user->user_name;
            $all_users_profiles[$user->user_id]->user_email = $user->user_email;

            if (USE_GRAVATAR) {
                $all_users_profiles[$user->user_id]->user_avatar_link =
                    $this->getGravatarLinkFromEmail($user->user_email);
            } else {
                $all_users_profiles[$user->user_id]->user_avatar_link =
                    $this->getUserAvatarFilePath($user->user_has_avatar, $user->user_id);
            }

            $all_users_profiles[$user->user_id]->user_active = $user->user_active;
        }
        return $all_users_profiles;
    }

    /**
     * Edit the user's name, provided in the editing form
     * @return bool success status
     */
    public function editUserName()
    {
        // new username provided ?
        if (!isset($_POST['user_name']) OR empty($_POST['user_name'])) {
            $_SESSION["feedback_negative"][] = FEEDBACK_USERNAME_FIELD_EMPTY;
            return false;
        }

        // new username same as old one ?
        if ($_POST['user_name'] == $_SESSION["user_name"]) {
            $_SESSION["feedback_negative"][] = FEEDBACK_USERNAME_SAME_AS_OLD_ONE;
            return false;
        }

        // username cannot be empty and must be azAZ09 and 2-64 characters
        if (!preg_match("/^(?=.{2,64}$)[a-zA-Z][a-zA-Z0-9]*(?: [a-zA-Z0-9]+)*$/", $_POST['user_name'])) {
            $_SESSION["feedback_negative"][] = FEEDBACK_USERNAME_DOES_NOT_FIT_PATTERN;
            return false;
        }

        // clean the input
        $user_name = substr(strip_tags($_POST['user_name']), 0, 64);

        // check if new username already exists
        $query = $this->db->prepare("SELECT user_id FROM users WHERE user_name = :user_name");
        $query->execute(array(':user_name' => $user_name));
        $count =  $query->rowCount();
        if ($count == 1) {
            $_SESSION["feedback_negative"][] = FEEDBACK_USERNAME_ALREADY_TAKEN;
            return false;
        }

        $query = $this->db->prepare("UPDATE users SET user_name = :user_name WHERE user_id = :user_id");
        $query->execute(array(':user_name' => $user_name, ':user_id' => $_SESSION['user_id']));
        $count =  $query->rowCount();
        if ($count == 1) {
            Session::set('user_name', $user_name);
            $_SESSION["feedback_positive"][] = FEEDBACK_USERNAME_CHANGE_SUCCESSFUL;
            return true;
        } else {
            $_SESSION["feedback_negative"][] = FEEDBACK_UNKNOWN_ERROR;
            return false;
        }
    }

    /**
     * Edit the user's email, provided in the editing form
     * @return bool success status
     */
    public function editUserEmail()
    {
        // email provided ?
        if (!isset($_POST['user_email']) OR empty($_POST['user_email'])) {
            $_SESSION["feedback_negative"][] = FEEDBACK_PASSWORD_FIELD_EMPTY;
            return false;
        }

        // check if new email is same like the old one
        if ($_POST['user_email'] == $_SESSION["user_email"]) {
            $_SESSION["feedback_negative"][] = FEEDBACK_EMAIL_SAME_AS_OLD_ONE;
            return false;
        }

        // user's email must be in valid email format
        if (!filter_var($_POST['user_email'], FILTER_VALIDATE_EMAIL)) {
            $_SESSION["feedback_negative"][] = FEEDBACK_EMAIL_DOES_NOT_FIT_PATTERN;
            return false;
        }

        // check if user's email already exists
        $query = $this->db->prepare("SELECT * FROM users WHERE user_email = :user_email");
        $query->execute(array(':user_email' => $_POST['user_email']));
        $count =  $query->rowCount();
        if ($count == 1) {
            $_SESSION["feedback_negative"][] = FEEDBACK_USER_EMAIL_ALREADY_TAKEN;
            return false;
        }

        // cleaning and write new email to database
        $user_email = substr(strip_tags($_POST['user_email']), 0, 64);
        $query = $this->db->prepare("UPDATE users SET user_email = :user_email WHERE user_id = :user_id");
        $query->execute(array(':user_email' => $user_email, ':user_id' => $_SESSION['user_id']));
        $count =  $query->rowCount();
        if ($count != 1) {
            $_SESSION["feedback_negative"][] = FEEDBACK_UNKNOWN_ERROR;
            return false;
        }

        Session::set('user_email', $user_email);
        // call the setGravatarImageUrl() method which writes gravatar URLs into the session
        $this->setGravatarImageUrl($user_email, AVATAR_SIZE);
        $_SESSION["feedback_positive"][] = FEEDBACK_EMAIL_CHANGE_SUCCESSFUL;
        return false;
    }

   