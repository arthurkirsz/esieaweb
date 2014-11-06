<?php

/**
 * Request Controller
 * Controls the Request mgmt
 */

class Request extends Controller
{
    /**
     * Construct this object by extending the basic Controller class
     */
    function __construct()
    {
        parent::__construct();
        Auth::handleLogin();
    }

    /**
     * Index, default action (shows the login form), when you do login/index
     */
    function index()
    {
        $request_model = $this->loadModel('Request');
        $this->view->requests = $request_model->getAllRequests();
        $this->view->render('request/index');
    }

    /**
     * Index, default action (shows the login form), when you do login/index
     */
    function archive()
    {
        $request_model = $this->loadModel('Request');
        $this->view->requests = $request_model->getOldRequests();
        $this->view->render('request/archive');
    }

    /**
     * Add a new request to the database.
     */
    function add()
    {
        $request_model = $this->loadModel('Request');
        $this->view->requests = $request_model->getAllRequests();
        $this->view->render('request/add');
    }

    /**
     * Creates a new request in the DB
     */
    function create()
    {
        $request_model = $this->loadModel('Request');
        $request_success = $request_model->addRequest();

        if ($request_success == true) {
            header('location: ' . URL . 'request/index');
        } else {
            header('location: ' . URL . 'request/add');
        }
        print_r($_POST);
    }

    /**
     * Creates a new request in the DB
     */
    function manage()
    {
        //Auth::isManager();
        $request_model = $this->loadModel('Request');
        $this->view->requests = $request_model->getManageableRequests();

        $this->view->render('request/manage');

    }
    /**
     * Validate a request
     */
    function valid($id)
    {
        $request_model = $this->loadModel('Request');
        $request_success = $request_model->validateRequest($id);
        header('location: ' . URL . 'request/manage');

    }


    /**
     * inValidate a request
     */
    function invalid($id)
    {
        $request_model = $this->loadModel('Request');
        $request_success = $request_model->invalidateRequest($id);
        header('location: ' . URL . 'request/manage');

    }

    /**
     * Deletes a request recortd from the DB using the id
     */
    function delete($id)
    {
        
        $request_model = $this->loadModel('Request');
        $request_success = $request_model->deleteRequest($id);
        header('location: ' . URL . 'request/index');
    }
    /**
     * Manager can validate requests
     */
    function handle()
    {
        Auth::isManager();
        echo 'you are manager';
    }

    
}
