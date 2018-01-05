<?php

class Registration extends Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index($id=null){
    	$id = isset($_REQUEST["id"]) ? $_REQUEST["id"] : $id;

        $this->view->setPage('on', 'registration');
        $this->view->setPage('title', 'Registration');

    	if( !empty($id) ){
            $this->error();
    	}
    	else{
    		if( $this->format=='json' ){
    			$this->view->setData('results', $this->model->lists());
    			$render = "registration/lists/json";
    		}
    		else{
                $this->view->setData('country', $this->model->country());
                $this->view->setData('paymentStatus', $this->model->paymentStatus());
    			$render = "registration/lists/display";
    		}
    	}
    	$this->view->render($render);
    }
    public function add(){
        if( empty($this->me) ) $this->error();

        $this->view->setPage('on','registration');
        $this->view->setPage('title', 'Create Registration');

        $this->view->setData('titleName', $this->model->titleName());
        $this->view->setData('country', $this->model->country());
        $this->view->setData('attend', $this->model->attend());
        $this->view->setData('types', $this->model->load('presentation')->types());
        $this->view->setData('submission', $this->model->submission());
        $this->view->setData('payment', $this->model->billPayment());
        $this->view->render('registration/forms/create');
    }
    public function edit($id=null){
        $id = isset($_REQUEST["id"]) ? $_REQUEST["id"] : $id;
        if( empty($this->me) ) $this->error();

        $this->view->setPage('on','registration');
        $this->view->setPage('title', 'Edit Registration');

        $item = $this->model->get($id);
        if( empty($item) ) $this->error();

        $this->view->setData('item', $item);
        $this->view->setData('titleName', $this->model->titleName());
        $this->view->setData('country', $this->model->country());
        $this->view->setData('attend', $this->model->attend());
        $this->view->setData('types', $this->model->load('presentation')->types());
        $this->view->setData('submission', $this->model->submission());
        $this->view->setData('payment', $this->model->billPayment());
        $this->view->render('registration/forms/create');
    }

    /*ATTEND*/
    public function add_attend(){
      if( empty($this->me) || $this->format!='json' ) $this->error();

        $this->view->setPage('path','Themes/manage/forms/registration');
        $this->view->render('add');
    }
    public function edit_attend($id=null){
      $id = isset($_REQUEST["id"]) ? $_REQUEST["id"] : $id;
        if( empty($id) || empty($this->me) || $this->format!='json' ) $this->error();

        $item = $this->model->attend($id);
        if( empty($item) ) $this->error();

        $this->view->setData('item', $item);
        $this->view->setPage('path','Themes/manage/forms/registration');
        $this->view->render('add');
    }
    public function save_attend(){
      if( empty($_POST) ) $this->error();

        $id = isset($_POST["id"]) ? $_POST["id"] : null;
        if( !empty($id) ){
            $item = $this->model->attend($id);
            if( empty($item) ) $this->error();
        }

        try{
            $form = new Form();
            $form   ->post('attend_name')->val('is_empty')
                    ->post('attend_keyword')->val('is_empty');
            $form->submit();
            $postData = $form->fetch();

            $postData['attend_is_student'] = !empty($_POST["is_student"]) ? 1 : 0;
            $postData['attend_is_international'] = !empty($_POST["is_international"]) ? 1 : 0;
            $postData['attend_is_mou'] = !empty($_POST["is_mou"]) ? 1 : 0;

            $has_name = true;
            if( !empty($item) ){
                if( $item['name'] == $postData['attend_name'] ) $has_name = false;
            }
            if( $this->model->is_attend($postData['attend_name']) && $has_name ){
                $arr['error']['attend_name'] = 'This name have already !';
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
    public function del_attend($id=null){
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

    public function setData($id=null, $field=null){
        if( empty($id) || empty($field) || empty($this->me) ) $this->error();

        $data[$field] = isset($_REQUEST['value'])? $_REQUEST['value']:'';
        $this->model->update($id, $data);

        $arr['message'] = '1';
        echo json_encode($arr);
    }
}
