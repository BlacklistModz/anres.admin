<?php

class Index extends Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->view->setPage('on', 'dashboard');
        $this->view->render("dashboard/display");
    }

    public function search($param=null) {

        
        // print_r($param); die;
    	/*if( !empty($param[0]) ){
    		if( in_array($param[0], array('property', 'search')) ){
               
    			$this->_callMethodProperty($param);
    			exit;
    		}
    	}*/

        $this->error();
    }
}
