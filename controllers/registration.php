<?php

class registration extends Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index($id=null){
    	$id = isset($_REQUEST["id"]) ? $_REQUEST["id"] : $id;
    	if( !empty($id) ){

    	}
    	else{
    		if( $this->format=='json' ){
    			$this->view->setData('results', $this->model->lists());
    			$render = "registration/lists/json";
    		}
    		else{
    			$render = "registration/lists/display";
    		}
    	}
    	$this->view->render($render);
    }
    public function add(){

    }
    public function edit($id=null){

    }
    public function save(){

    }
    public function del($id=null){

    }
}