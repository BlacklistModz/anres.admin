<?php

class presentation extends Controller {

    public function __construct() {
        parent::__construct();
    }
    public function index(){
  		$this->error();
  	}

  	#Users
  	public function add(){

  		if( empty($this->me) || $this->format!="json" ) $this->error();
  		$this->view->setPage("path", "registration/types");
  		$this->view->render("add");
  	}
  	public function edit($id=null){

  		$id = isset($_REQUEST["id"]) ? $_REQUEST["id"] : $id;
  		if( empty($id) || empty($this->me) || $this->format!="json" ) $this->error();

  		$item = $this->model->get($id);
  		if( empty($item) ) $this->error();

  		$this->view->setData("item", $item);
  		$this->view->setPage("path", "registration/types");
  		$this->view->render("add");
  	}


  	public function del($id=null){
  		$id = isset($_REQUEST["id"]) ? $_REQUEST["id"] : $id;
  		if( empty($this->me) || empty($id) || $this->format!="json" ) $this->error();

  		$item = $this->model->get($id);
  		if( empty($item) ) $this->error();

  		if( !empty($_POST) ){
  			if( !empty($item["permit"]["del"]) ){

                  if( !empty($item['image_id']) ) $this->model->load('media')->del($item['image_id']);

                  if( $item['role_id'] == 2 ) $this->model->load('student')->delByUser( $id );
                  if( $item['role_id'] == 4 ) $this->model->load('corporation')->delByUser( $id );

  				$this->model->delete( $id );
  				$arr["message"] = "ลบข้อมูลเรียบร้อย";
  				$arr["url"] = "refresh";
  			}
  			else{
  				$arr["message"] = "ไม่สามารถลบข้อมูลได้";
  			}

  			echo json_encode($arr);
  		}
  		else{
  			$this->view->setData("item", $item);
  			$this->view->setPage("path", "registration/types");
  			$this->view->render("del");
  		}
  	}


}
