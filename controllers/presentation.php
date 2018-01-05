<?php

class prsentation extends Controller {

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
    			$render = "presentation/lists/json";
    		}
    		else{
    			$render = "presentation/lists/display";
    		}
    	}
    	$this->view->render($render);
    }

    public function add(){
      if( empty($this->me) || $this->format!='json' ) $this->error();

        $this->view->setPage('path','Themes/manage/forms/presentation');
        $this->view->render('add');
    }
    public function edit($id=null){
      $id = isset($_REQUEST["id"]) ? $_REQUEST["id"] : $id;
        if( empty($id) || empty($this->me) || $this->format!='json' ) $this->error();

        $item = $this->model->attend($id);
        if( empty($item) ) $this->error();

        $this->view->setData('item', $item);
        $this->view->setPage('path','Themes/manage/forms/presentation');
        $this->view->render('add');
    }
    public function save(){
      if( empty($_POST) ) $this->error();

        $id = isset($_POST["id"]) ? $_POST["id"] : null;
        if( !empty($id) ){
            $item = $this->model->attend($id);
            if( empty($item) ) $this->error();
        }

        try{
            $form = new Form();
            $form   ->post('types_name')->val('is_empty');
            $form->submit();
            $postData = $form->fetch();

            $has_name = true;
            if( !empty($item) ){
                if( $item['name'] == $postData['types_name'] ) $has_name = false;
            }
            if( $this->model->is_attend($postData['types_name']) && $has_name ){
                $arr['error']['types_name'] = 'This name have already !';
            }

            if( empty($arr['error']) ){
                if(!empty($id)){
                    $this->model->updateAttend($id, $postData);
                }
                else{
                    $this->model->insertAttend($postData);
                }

                $arr['message'] = 'Saved !';
                $arr['url'] = 'refresh';
            }

        } catch (Exception $e) {
            $arr['error'] = $this->_getError($e->getMessage());
        }
        echo json_encode($arr);
    }
    public function del($id=null){
        $id = isset($_REQUEST["id"]) ? $_REQUEST["id"] : $id;
        if( empty($id) || empty($this->me) || $this->format!='json' ) $this->error();

        $item = $this->model->attend($id);
        if( empty($item) ) $this->error();

        if( !empty($_POST) ){
            if( !empty($item['permit']['del']) ){
                $this->model->deleteAttend($id);
                $arr['message'] = 'Deleted !';
                $arr['url'] = 'refresh';
            }
            else{
                $arr['message'] = 'Error : This can not delete by SYSTEM';
            }
            echo json_encode($arr);
        }
        else{
            $this->view->setData('item', $item);
            $this->view->setPage('path', 'Themes/manage/forms/registration');
            $this->view->render('del');
        }
    }
}
