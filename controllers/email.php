<?php

class Email extends Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index(){
  		$this->error();
  	}

    public function add_email(){
      if( empty($this->me) || $this->format!='json' ) $this->error();

        $this->view->setPage('path','Themes/manage/forms/email');
        $this->view->render('add');
    }
    public function edit_email($id=null){
      $id = isset($_REQUEST["id"]) ? $_REQUEST["id"] : $id;
        if( empty($id) || empty($this->me) || $this->format!='json' ) $this->error();

        $item = $this->model->email($id);
        if( empty($item) ) $this->error();

        $this->view->setData('item', $item);
        $this->view->setPage('path','Themes/manage/forms/email');
        $this->view->render('add');
    }
    public function save_email(){
      if( empty($_POST) ) $this->error();

        $id = isset($_POST["id"]) ? $_POST["id"] : null;
        if( !empty($id) ){
            $item = $this->model->email($id);
            if( empty($item) ) $this->error();
        }

        try{
            $form = new Form();
            $form   ->post('email_title')->val('is_empty')
                    ->post('email_detial');
            $form->submit();
            $postData = $form->fetch();

            $has_name = true;
            if( !empty($item) ){
                if( $item['title'] == $postData['email_title'] ) $has_name = false;
            }
            // if( $this->model->is_email($postData['email_title']) && $has_name ){
            //     $arr['error']['email_title'] = 'This name have already !';
            // }

            if( empty($arr['error']) ){
                if(!empty($id)){
                    $this->model->updateEmail($id, $postData);
                }
                else{
                    $this->model->insertEmail($postData);
                }

                $arr['message'] = 'Saved !';
                $arr['url'] = 'refresh';
            }

        } catch (Exception $e) {
            $arr['error'] = $this->_getError($e->getMessage());
        }
        echo json_encode($arr);
    }
    public function del_email($id=null){
        $id = isset($_REQUEST["id"]) ? $_REQUEST["id"] : $id;
        if( empty($id) || empty($this->me) || $this->format!='json' ) $this->error();

        $item = $this->model->email($id);
        if( empty($item) ) $this->error();

        if( !empty($_POST) ){
            if( !empty($item['permit']['del']) ){
                $this->model->deleteEmail($id);
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
            $this->view->setPage('path', 'Themes/manage/forms/email');
            $this->view->render('del');
        }
    }

    public function setData($id=null, $field=null){
        if( empty($id) || empty($field) || empty($this->me) ) $this->error();

        $data[$field] = isset($_REQUEST['value'])? $_REQUEST['value']:'';
        $this->model->update($id, $data);

        $arr['message'] = '1';
        echo json_encode($arr);
    }

}
