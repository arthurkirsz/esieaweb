<?php

/**
 * RequestModel
 *
 * Handles the Request CRUD
 */


class RequestModel
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
     * Gets an array that contains all the request of the logged_in user in the database.
     * the array's keys are the user ids.
     * Each array element is an object, containing a specific user's data.
     * @return array The profiles of all users
     */
    public function getAllRequests()
    {
        $sth = $this->db->prepare("SELECT * FROM requests WHERE user_id = :user_id AND request_status = 'EN COURS' ORDER BY request_creation_timestamp DESC");

        $sth->execute(array(':user_id' => $_SESSION["user_id"]));

        $all_requests_profiles = array();

        foreach ($sth->fetchAll() as $request) {
            // a new object for every request. This is eventually not really optimal when it comes
            // to performance, but it fits the view style better
            $all_requests_profiles[$request->request_id] = new stdClass();
            $all_requests_profiles[$request->request_id]->request_id = $request->request_id;
            $all_requests_profiles[$request->request_id]->exercice_id = $request->exercice_id;
            $all_requests_profiles[$request->request_id]->creation_time = $request->request_creation_timestamp;
            $all_requests_profiles[$request->request_id]->startdate = $request->request_startdate_timestamp;
            $all_requests_profiles[$request->request_id]->enddate = $request->request_enddate_timestamp;



            // Date algorithm to generate proper human date format
            $request_creation_timestamp = $request->request_creation_timestamp;
            $request_startdate_timestamp = $request->request_startdate_timestamp;
            $request_enddate_timestamp = $request->request_enddate_timestamp;
            $request_starthour_timestamp = $request->request_starthour_timestamp;
            $request_endthour_timestamp = $request->request_endhour_timestamp;

            // One day only
            if($request_enddate_timestamp - $request_startdate_timestamp == 0)
            {
                $date = 'Le ' . Utils::getDateFromTimestamp($request_startdate_timestamp) . ' <span> ';
                        //  .
                        // 'de ' . Utils::getDateFromTimestamp($request_starthour_timestamp) . 'h ' .
                        // 'à ' . Utils::getDateFromTimestamp($request_endhour_timestamp) . 'h </span>';
            }
            else 
            {
                $date = 'Du ' . Utils::getDateFromTimestamp($request_startdate_timestamp) . ' ' .
                        'au ' . Utils::getDateFromTimestamp($request_enddate_timestamp);
            }

            //
        // echo '<hr>'.$timestamp;
        // $date = Utils::getDateFromTimestamp($timestamp);
        // echo '<hr>'.$date;

            $all_requests_profiles[$request->request_id]->request_date = $date;


            $all_requests_profiles[$request->request_id]->request_validation_timestamp = $request->request_validation_timestamp;
            $all_requests_profiles[$request->request_id]->request_cancelation_timestamp = $request->request_cancelation_timestamp;

            $all_requests_profiles[$request->request_id]->request_length = $request->request_length;


            $all_requests_profiles[$request->request_id]->request_type = $request->request_type;
            $all_requests_profiles[$request->request_id]->request_status = $request->request_status;
        }
        return $all_requests_profiles;
    }


    public function getRequestFromId($id)
    {
        $sth = $this->db->prepare("SELECT * FROM requests WHERE request_id = :request_id AND request_status = 'EN COURS'");

        $sth->execute(array(':request_id' => $id));

        $all_requests_profiles = array();

        foreach ($sth->fetchAll() as $request) {
            // a new object for every request. This is eventually not really optimal when it comes
            // to performance, but it fits the view style better
            $all_requests_profiles[$request->request_id] = new stdClass();
            $all_requests_profiles[$request->request_id]->request_id = $request->request_id;
            $all_requests_profiles[$request->request_id]->exercice_id = $request->exercice_id;
            $all_requests_profiles[$request->request_id]->creation_time = $request->request_creation_timestamp;
            $all_requests_profiles[$request->request_id]->startdate = $request->request_startdate_timestamp;
            $all_requests_profiles[$request->request_id]->enddate = $request->request_enddate_timestamp;



            // Date algorithm to generate proper human date format
            $request_creation_timestamp = $request->request_creation_timestamp;
            $request_startdate_timestamp = $request->request_startdate_timestamp;
            $request_enddate_timestamp = $request->request_enddate_timestamp;
            $request_starthour_timestamp = $request->request_starthour_timestamp;
            $request_endthour_timestamp = $request->request_endhour_timestamp;

            

            //$all_requests_profiles[$request->request_id]->request_date = $date;


            $all_requests_profiles[$request->request_id]->request_validation_timestamp = $request->request_validation_timestamp;
            $all_requests_profiles[$request->request_id]->request_cancelation_timestamp = $request->request_cancelation_timestamp;

            $all_requests_profiles[$request->request_id]->request_length = $request->request_length;


            $all_requests_profiles[$request->request_id]->request_type = $request->request_type;
            $all_requests_profiles[$request->request_id]->request_status = $request->request_status;
        }
        return $all_requests_profiles;

    }


    /**
     * Gets an array that contains all the request of the logged_in user in the database.
     * the array's keys are the user ids.
     * Each array element is an object, containing a specific user's data.
     * @return array The profiles of all users
     */
    public function getOldRequests()
    {
        $sth = $this->db->prepare("SELECT * FROM requests WHERE user_id = :user_id AND request_status != 'EN COURS' ORDER BY request_creation_timestamp DESC");

        $sth->execute(array(':user_id' => $_SESSION["user_id"]));

        $all_requests_profiles = array();

        foreach ($sth->fetchAll() as $request) {
            // a new object for every request. This is eventually not really optimal when it comes
            // to performance, but it fits the view style better
            $all_requests_profiles[$request->request_id] = new stdClass();
            $all_requests_profiles[$request->request_id]->request_id = $request->request_id;
            $all_requests_profiles[$request->request_id]->exercice_id = $request->exercice_id;
            $all_requests_profiles[$request->request_id]->creation_time = $request->request_creation_timestamp;
            $all_requests_profiles[$request->request_id]->startdate = $request->request_startdate_timestamp;
            $all_requests_profiles[$request->request_id]->enddate = $request->request_enddate_timestamp;



            // Date algorithm to generate proper human date format
            $request_creation_timestamp = $request->request_creation_timestamp;
            $request_startdate_timestamp = $request->request_startdate_timestamp;
            $request_enddate_timestamp = $request->request_enddate_timestamp;
            $request_starthour_timestamp = $request->request_starthour_timestamp;
            $request_endthour_timestamp = $request->request_endhour_timestamp;

            // One day only
            if($request_enddate_timestamp - $request_startdate_timestamp == 0)
            {
                $date = 'Le ' . Utils::getDateFromTimestamp($request_startdate_timestamp) . ' <span> ';
                        //  .
                        // 'de ' . Utils::getDateFromTimestamp($request_starthour_timestamp) . 'h ' .
                        // 'à ' . Utils::getDateFromTimestamp($request_endhour_timestamp) . 'h </span>';
            }
            else 
            {
                $date = 'Du ' . Utils::getDateFromTimestamp($request_startdate_timestamp) . ' ' .
                        'au ' . Utils::getDateFromTimestamp($request_enddate_timestamp);
            }

            //
        // echo '<hr>'.$timestamp;
        // $date = Utils::getDateFromTimestamp($timestamp);
        // echo '<hr>'.$date;

            $all_requests_profiles[$request->request_id]->request_date = $date;


            $all_requests_profiles[$request->request_id]->request_validation_timestamp = $request->request_validation_timestamp;
            $all_requests_profiles[$request->request_id]->request_cancelation_timestamp = $request->request_cancelation_timestamp;

            $all_requests_profiles[$request->request_id]->request_length = $request->request_length;


            $all_requests_profiles[$request->request_id]->request_type = $request->request_type;
            $all_requests_profiles[$request->request_id]->request_status = $request->request_status;
        }
        return $all_requests_profiles;
    }


    /**
     * Gets an array that contains all the request of the logged_in user in the database.
     * the array's keys are the user ids.
     * Each array element is an object, containing a specific user's data.
     * @return array The profiles of all users
     */
    public function getManageableRequests()
    {
        $sth = $this->db->prepare("SELECT * FROM requests WHERE request_status = 'EN COURS'  ORDER BY request_creation_timestamp DESC");

        $sth->execute(array());

        $all_requests_profiles = array();

        foreach ($sth->fetchAll() as $request) {
            // a new object for every request. This is eventually not really optimal when it comes
            // to performance, but it fits the view style better
            $all_requests_profiles[$request->request_id] = new stdClass();
            $all_requests_profiles[$request->request_id]->request_id = $request->request_id;
            $all_requests_profiles[$request->request_id]->exercice_id = $request->exercice_id;
            $all_requests_profiles[$request->request_id]->creation_time = $request->request_creation_timestamp;
            $all_requests_profiles[$request->request_id]->startdate = $request->request_startdate_timestamp;
            $all_requests_profiles[$request->request_id]->enddate = $request->request_enddate_timestamp;



            // Date algorithm to generate proper human date format
            $request_creation_timestamp = $request->request_creation_timestamp;
            $request_startdate_timestamp = $request->request_startdate_timestamp;
            $request_enddate_timestamp = $request->request_enddate_timestamp;
            $request_starthour_timestamp = $request->request_starthour_timestamp;
            $request_endthour_timestamp = $request->request_endhour_timestamp;

            // One day only
            if($request_enddate_timestamp - $request_startdate_timestamp == 0)
            {
                $date = 'Le ' . Utils::getDateFromTimestamp($request_startdate_timestamp) . ' <span> ';
                        //  .
                        // 'de ' . Utils::getDateFromTimestamp($request_starthour_timestamp) . 'h ' .
                        // 'à ' . Utils::getDateFromTimestamp($request_endhour_timestamp) . 'h </span>';
            }
            else 
            {
                $date = 'Du ' . Utils::getDateFromTimestamp($request_startdate_timestamp) . ' ' .
                        'au ' . Utils::getDateFromTimestamp($request_enddate_timestamp);
            }

            //
        // echo '<hr>'.$timestamp;
        // $date = Utils::getDateFromTimestamp($timestamp);
        // echo '<hr>'.$date;

            $all_requests_profiles[$request->request_id]->request_date = $date;


            $all_requests_profiles[$request->request_id]->request_validation_timestamp = $request->request_validation_timestamp;
            $all_requests_profiles[$request->request_id]->request_cancelation_timestamp = $request->request_cancelation_timestamp;

            $all_requests_profiles[$request->request_id]->request_length = $request->request_length;


            $all_requests_profiles[$request->request_id]->request_type = $request->request_type;
            $all_requests_profiles[$request->request_id]->request_status = $request->request_status;
        }
        return $all_requests_profiles;
    }




    /**
     * Gets an array that contains all the request of the logged_in user in the database.
     * the array's keys are the user ids.
     * Each array element is an object, containing a specific user's data.
     * @return array The profiles of all users
     */
    public function addRequest()
    {

        // perform all necessary form checks
        // if (!$this->checkCaptcha()) {
        //     $_SESSION["feedback_negative"][] = FEEDBACK_CAPTCHA_WRONG;
        // } elseif (empty($_POST['company_name'])) {
        //     $_SESSION["feedback_negative"][] = FEEDBACK_USERNAME_FIELD_EMPTY;
        // } elseif (empty($_POST['user_name'])) {
        //     $_SESSION["feedback_negative"][] = FEEDBACK_USERNAME_FIELD_EMPTY;
        // } elseif (empty($_POST['user_password_new']) OR empty($_POST['user_password_repeat'])) {
        //     $_SESSION["feedback_negative"][] = FEEDBACK_PASSWORD_FIELD_EMPTY;
        // } elseif ($_POST['user_password_new'] !== $_POST['user_password_repeat']) {
        //     $_SESSION["feedback_negative"][] = FEEDBACK_PASSWORD_REPEAT_WRONG;
        // } elseif (strlen($_POST['user_password_new']) < 6) {
        //     $_SESSION["feedback_negative"][] = FEEDBACK_PASSWORD_TOO_SHORT;
        // } elseif (strlen($_POST['user_name']) > 64 OR strlen($_POST['user_name']) < 2) {
        //     $_SESSION["feedback_negative"][] = FEEDBACK_USERNAME_TOO_SHORT_OR_TOO_LONG;
        // } elseif (!preg_match('/^[a-z\d]{2,64}$/i', $_POST['user_name'])) {
        //     $_SESSION["feedback_negative"][] = FEEDBACK_USERNAME_DOES_NOT_FIT_PATTERN;
        // } elseif (empty($_POST['user_email'])) {
        //     $_SESSION["feedback_negative"][] = FEEDBACK_EMAIL_FIELD_EMPTY;
        // } elseif (strlen($_POST['user_email']) > 64) {
        //     $_SESSION["feedback_negative"][] = FEEDBACK_EMAIL_TOO_LONG;
        // } elseif (!filter_var($_POST['user_email'], FILTER_VALIDATE_EMAIL)) {
        //     $_SESSION["feedback_negative"][] = FEEDBACK_EMAIL_DOES_NOT_FIT_PATTERN;
        // } elseif (!empty($_POST['user_name'])
        //     AND strlen($_POST['company_name']) <= 64
        //     AND strlen($_POST['company_name']) >= 2
        //     AND strlen($_POST['user_name']) <= 64
        //     AND strlen($_POST['user_name']) >= 2
        //     AND preg_match('/^[a-z\d]{2,64}$/i', $_POST['user_name'])
        //     AND !empty($_POST['user_email'])
        //     AND strlen($_POST['user_email']) <= 64
        //     AND filter_var($_POST['user_email'], FILTER_VALIDATE_EMAIL)
        //     AND !empty($_POST['user_password_new'])
        //     AND !empty($_POST['user_password_repeat'])
        //     AND ($_POST['user_password_new'] === $_POST['user_password_repeat'])) {
        if(!empty($_POST["type"])) {

            $user_id = $_SESSION["user_id"];
            $exercice_id = 2014;
            $request_creation_timestamp = time();
            $request_status = "EN COURS";
            $request_validation_timestamp = NULL;
            $request_cancelation_timestamp = NULL;
            $request_credit = 1;




            $request_type = strip_tags($_POST['type']);

            $startdate = Utils::getTimestamp($_POST["startdate"], 'Y-m-d');
            $request_startdate_timestamp = strip_tags($startdate);

            $enddate = Utils::getTimestamp($_POST["enddate"], 'Y-m-d');
            $request_enddate_timestamp = strip_tags($enddate);

            $request_starthour_timestamp = 1 || strip_tags($_POST['starthour']) || NULL;
            $request_endhour_timestamp = 1 || strip_tags($_POST['endhour']) || NULL;
            

            // Get business days :)
            // Holiday array is empty for the moment
            // TODO : holiday civil french year
            $request_length = Utils::getWorkingDays($startdate, $enddate, array());

            $request_note = 1 || strip_tags($_POST['note']) || NULL;


            // write new request data into database
            $sql = "INSERT INTO requests (user_id, exercice_id, request_creation_timestamp, request_startdate_timestamp, request_enddate_timestamp, request_starthour_timestamp, request_endhour_timestamp, request_validation_timestamp, request_cancelation_timestamp, request_length, request_type, request_status, request_note, request_credit)
                    VALUES (:user_id, :exercice_id, :request_creation_timestamp, :request_startdate_timestamp, :request_enddate_timestamp, :request_starthour_timestamp, :request_endhour_timestamp, :request_validation_timestamp, :request_cancelation_timestamp, :request_length, :request_type, :request_status, :request_note, :request_credit)";
            $query = $this->db->prepare($sql);

            $values = array(':user_id' => $user_id, 
                            ':exercice_id' => $exercice_id, 
                            ':request_creation_timestamp' => $request_creation_timestamp, 
                            ':request_startdate_timestamp' => $request_startdate_timestamp, 
                            ':request_enddate_timestamp' => $request_enddate_timestamp, 
                            ':request_starthour_timestamp' => $request_starthour_timestamp, 
                            ':request_endhour_timestamp' => $request_endhour_timestamp, 
                            ':request_validation_timestamp' => $request_validation_timestamp, 
                            ':request_cancelation_timestamp' => $request_cancelation_timestamp, 
                            ':request_length' => $request_length, 
                            ':request_type' => $request_type, 
                            ':request_status' => $request_status, 
                            ':request_note' => $request_note, 
                            ':request_credit' => $request_credit);
            $query->execute($values);
            $count =  $query->rowCount();
            if ($count != 1) {
                $_SESSION["feedback_negative"][] = FEEDBACK_ACCOUNT_CREATION_FAILED;
                return false;
            }
            else {
                return true;
            }
        } else {
            $_SESSION["feedback_negative"][] = FEEDBACK_UNKNOWN_ERROR;
        }
        // default return, returns only true of really successful (see above)
        return false;
    }


    /**
     * Update a request with a given ID
     * the array's keys are the user ids.
     * Each array element is an object, containing a specific user's data.
     * @return array The profiles of all users
     */
    public function updateRequest($id)
    {

        // perform all necessary form checks
        // if (!$this->checkCaptcha()) {
        //     $_SESSION["feedback_negative"][] = FEEDBACK_CAPTCHA_WRONG;
        // } elseif (empty($_POST['company_name'])) {
        //     $_SESSION["feedback_negative"][] = FEEDBACK_USERNAME_FIELD_EMPTY;
        // } elseif (empty($_POST['user_name'])) {
        //     $_SESSION["feedback_negative"][] = FEEDBACK_USERNAME_FIELD_EMPTY;
        // } elseif (empty($_POST['user_password_new']) OR empty($_POST['user_password_repeat'])) {
        //     $_SESSION["feedback_negative"][] = FEEDBACK_PASSWORD_FIELD_EMPTY;
        // } elseif ($_POST['user_password_new'] !== $_POST['user_password_repeat']) {
        //     $_SESSION["feedback_negative"][] = FEEDBACK_PASSWORD_REPEAT_WRONG;
        // } elseif (strlen($_POST['user_password_new']) < 6) {
        //     $_SESSION["feedback_negative"][] = FEEDBACK_PASSWORD_TOO_SHORT;
        // } elseif (strlen($_POST['user_name']) > 64 OR strlen($_POST['user_name']) < 2) {
        //     $_SESSION["feedback_negative"][] = FEEDBACK_USERNAME_TOO_SHORT_OR_TOO_LONG;
        // } elseif (!preg_match('/^[a-z\d]{2,64}$/i', $_POST['user_name'])) {
        //     $_SESSION["feedback_negative"][] = FEEDBACK_USERNAME_DOES_NOT_FIT_PATTERN;
        // } elseif (empty($_POST['user_email'])) {
        //     $_SESSION["feedback_negative"][] = FEEDBACK_EMAIL_FIELD_EMPTY;
        // } elseif (strlen($_POST['user_email']) > 64) {
        //     $_SESSION["feedback_negative"][] = FEEDBACK_EMAIL_TOO_LONG;
        // } elseif (!filter_var($_POST['user_email'], FILTER_VALIDATE_EMAIL)) {
        //     $_SESSION["feedback_negative"][] = FEEDBACK_EMAIL_DOES_NOT_FIT_PATTERN;
        // } elseif (!empty($_POST['user_name'])
        //     AND strlen($_POST['company_name']) <= 64
        //     AND strlen($_POST['company_name']) >= 2
        //     AND strlen($_POST['user_name']) <= 64
        //     AND strlen($_POST['user_name']) >= 2
        //     AND preg_match('/^[a-z\d]{2,64}$/i', $_POST['user_name'])
        //     AND !empty($_POST['user_email'])
        //     AND strlen($_POST['user_email']) <= 64
        //     AND filter_var($_POST['user_email'], FILTER_VALIDATE_EMAIL)
        //     AND !empty($_POST['user_password_new'])
        //     AND !empty($_POST['user_password_repeat'])
        //     AND ($_POST['user_password_new'] === $_POST['user_password_repeat'])) {
        if(!empty($_POST["type"])) {

            $user_id = $_SESSION["user_id"];
            $exercice_id = 2014;
            $request_creation_timestamp = time();
            $request_status = "EN COURS";
            $request_validation_timestamp = NULL;
            $request_cancelation_timestamp = NULL;
            $request_credit = 1;




            $request_type = strip_tags($_POST['type']);

            $startdate = Utils::getTimestamp($_POST["startdate"], 'Y-m-d');
            $request_startdate_timestamp = strip_tags($startdate);

            $enddate = Utils::getTimestamp($_POST["enddate"], 'Y-m-d');
            $request_enddate_timestamp = strip_tags($enddate);

            $request_starthour_timestamp = 1 || strip_tags($_POST['starthour']) || NULL;
            $request_endhour_timestamp = 1 || strip_tags($_POST['endhour']) || NULL;
            

            // Get business days :)
            // Holiday array is empty for the moment
            // TODO : holiday civil french year
            $request_length = Utils::getWorkingDays($startdate, $enddate, array());

            $request_note = 1 || strip_tags($_POST['note']) || NULL;


            // write new request data into database
            $sql = "UPDATE requests SET 
                            user_id = :user_id, 
                            exercice_id = :exercice_id, 
                            request_creation_timestamp = :request_creation_timestamp, 
                            request_startdate_timestamp = :request_startdate_timestamp, 
                            request_enddate_timestamp = :request_enddate_timestamp, 
                            request_starthour_timestamp = :request_starthour_timestamp, 
                            request_endhour_timestamp = :request_endhour_timestamp, 
                            request_validation_timestamp = :request_validation_timestamp, 
                            request_cancelation_timestamp = :request_cancelation_timestamp, 
                            request_length = :request_length, 
                            request_type = :request_type, 
                            request_status = :request_status, 
                            request_note = :request_note, 
                            request_credit = :request_credit
                        WHERE request_id = :request_id";
            $query = $this->db->prepare($sql);

            $values = array(':request_id' => $id, 
                            ':user_id' => $user_id, 
                            ':exercice_id' => $exercice_id, 
                            ':request_creation_timestamp' => $request_creation_timestamp, 
                            ':request_startdate_timestamp' => $request_startdate_timestamp, 
                            ':request_enddate_timestamp' => $request_enddate_timestamp, 
                            ':request_starthour_timestamp' => $request_starthour_timestamp, 
                            ':request_endhour_timestamp' => $request_endhour_timestamp, 
                            ':request_validation_timestamp' => $request_validation_timestamp, 
                            ':request_cancelation_timestamp' => $request_cancelation_timestamp, 
                            ':request_length' => $request_length, 
                            ':request_type' => $request_type, 
                            ':request_status' => $request_status, 
                            ':request_note' => $request_note, 
                            ':request_credit' => $request_credit);
            $query->execute($values);
            $count =  $query->rowCount();
            if ($count != 1) {
                $_SESSION["feedback_negative"][] = FEEDBACK_ACCOUNT_CREATION_FAILED;
                return false;
            }
            else {
                return true;
            }
        } else {
            $_SESSION["feedback_negative"][] = FEEDBACK_UNKNOWN_ERROR;
        }
        // default return, returns only true of really successful (see above)
        return false;
    }

    public function deleteRequest($id)
    {
        $sth = $this->db->prepare("DELETE FROM requests WHERE request_id = :request_id");
        $sth->execute(array(':request_id' => $id));
    }

    public function validateRequest($id)
    {
        $sth = $this->db->prepare("UPDATE requests SET request_status = 'VALIDEE' WHERE request_id = :request_id");

        $sth->execute(array(':request_id' => $id));
    }

    public function invalidateRequest($id)
    {
        $sth = $this->db->prepare("UPDATE requests SET request_status = 'REFUSEE' WHERE request_id = :request_id");
        $sth->execute(array(':request_id' => $id));
    }

}
