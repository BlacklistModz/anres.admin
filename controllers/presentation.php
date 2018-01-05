<?php

class Presentation extends Controller {

    public function __construct() {
        parent::__construct();
    }

    // public function index($id=null){
    // 	$id = isset($_REQUEST["id"]) ? $_REQUEST["id"] : $id;
    // 	if( !empty($id) ){

    // 	}
    // 	else{
    // 		if( $this->format=='json' ){
    // 			$this->view->setData('results', $this->model->lists());
    // 			$render = "presentation/lists/json";
    // 		}
    // 		else{
    // 			$render = "presentation/lists/display";
    // 		}
    // 	}
    // 	$this->view->render($render);
    // }

    public function add_type(){
      if( empty($this->me) || $this->format!='json' ) $this->error();

        $this->view->setPage('path','Themes/manage/forms/presentation');
        $this->view->render('add');
    }
    public function edit_type($id=null){
      $id = isset($_REQUEST["id"]) ? $_REQUEST["id"] : $id;
        if( empty($id) || empty($this->me) || $this->format!='json' ) $this->error();

        $item = $this->model->types($id);
        if( empty($item) ) $this->error();

        $this->view->setData('item', $item);
        $this->view->setPage('path','Themes/manage/forms/presentation');
        $this->view->render('add');
    }
    public function save_type(){
      if( empty($_POST) ) $this->error();

        $id = isset($_POST["id"]) ? $_POST["id"] : null;
        if( !empty($id) ){
            $item = $this->model->types($id);
            if( empty($item) ) $this->error();
        }

        try{
            $form = new Form();
            $form   ->post('type_name')->val('is_empty')
                    ->post('type_keyword')->val('is_empty');
            $form->submit();
            $postData = $form->fetch();

            $has_name = true;
            if( !empty($item) ){
                if( $item['name'] == $postData['type_name'] ) $has_name = false;
            }
            if( $this->model->is_presentation($postData['type_name']) && $has_name ){
                $arr['error']['type_name'] = 'This name have already !';
            }
            $postData["type_is_presentation"] = isset($_POST["type_is_presentation"]) ? 1 : 0;

            if( empty($arr['error']) ){
                if(!empty($id)){
                    $this->model->updateType($id, $postData);
                }
                else{
                    $this->model->insertType($postData);
                }

                $arr['message'] = 'Saved !';
                $arr['url'] = 'refresh';
            }

        } catch (Exception $e) {
            $arr['error'] = $this->_getError($e->getMessage());
        }
        echo json_encode($arr);
    }
    public function del_type($id=null){
        $id = isset($_REQUEST["id"]) ? $_REQUEST["id"] : $id;
        if( empty($id) || empty($this->me) || $this->format!='json' ) $this->error();

        $item = $this->model->types($id);
        if( empty($item) ) $this->error();

        if( !empty($_POST) ){
            if( !empty($item['permit']['del']) ){
                $this->model->deleteType($id);
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
            $this->view->setPage('path', 'Themes/manage/forms/presentation');
            $this->view->render('del');
        }
    }
}
