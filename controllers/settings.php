<?php

class Settings extends Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index( ){
    	$this->my();
    }

    public function company( $tap='basic' ) {
      $this->view->setPage("title", "Setting ".ucfirst($tap));

      $this->view->setPage('on', 'settings' );
      $this->view->setData('section', 'company');
      $this->view->setData('tap', 'display');
      $this->view->setData('_tap', $tap);

      if( empty($this->permit['company']['view']) ) $this->error();

      if( $tap != 'basic' ){

        $this->error();
      }

      if( !empty($_POST) && $this->format=='json' ){

        foreach ($_POST as $key => $value) {
          $this->model->load('system')->set( $key, $value);
        }

        $arr['url'] = 'refresh';
        $arr['message'] = 'บันทึกเรียบร้อย';

        echo json_encode($arr);
      }
      else{
        $this->view->render("settings/display");
      }

    }

    public function my( $tap='basic' ) {

        $this->view->setPage("title", "Setting ".ucfirst($tap));

        $this->view->setPage('on', 'settings' );
        $this->view->setData('section', 'my');
        $this->view->setData('tap', 'display');
        $this->view->setData('_tap', $tap);

        if( $tap=='basic' ){
            $this->view
            ->js(  VIEW .'Themes/'.$this->view->getPage('theme').'/assets/js/bootstrap-colorpicker.min.js', true)
            ->css( VIEW .'Themes/'.$this->view->getPage('theme').'/assets/css/bootstrap-colorpicker.min.css', true);

            $this->view->setData('prefixName', $this->model->load('system')->prefixName());
        }

        $this->view->render("settings/display");
    }
    public function registration($tap='attend'){
        $this->view->setPage("title", "Setting ".ucfirst($tap));

        $this->view->setPage('on', 'settings' );
        $this->view->setData('section', 'registration');
        $this->view->setData('tap', $tap);
        // $this->view->setData('_tap', $tap);

        if( $tap=='attend' ){
          $data = $this->model->load('registration')->attend();
        }elseif( $tap=='types' ){
          $data = $this->model->load('presentation')->types();
        }
        else{
          $this->error();
        }

        $this->view->setData('data', $data);
        $this->view->render("settings/display");
    }

    /*Accounts*/
    public function accounts($tap='admin'){
        $this->view->setPage("title", "Setting ".ucfirst($tap));

        $this->view->setPage('on', 'settings' );
        $this->view->setData('section', 'accounts');
        $this->view->setData('tap', $tap);
        // $this->view->setData('_tap', $tap);

        if( $tap=='admin' ){
          $data = $this->model->load('users')->accounts();
        }
        else{
          $this->error();
        }

        $this->view->setData('data', $data);
        $this->view->render("settings/display");
    }

    public function add_accounts(){
      if( empty($this->me) || $this->format!='json' ) $this->error();

        $this->view->setPage('path','Themes/manage/forms/accounts');
        $this->view->render('add');
    }
    public function edit_accounts($id=null){
      $id = isset($_REQUEST["id"]) ? $_REQUEST["id"] : $id;
        if( empty($id) || empty($this->me) || $this->format!='json' ) $this->error();

        $item = $this->model->load('users')->accounts($id);
        if( empty($item) ) $this->error();

        $this->view->setData('item', $item);
        $this->view->setPage('path','Themes/manage/forms/accounts');
        $this->view->render('add');
    }
    public function save_accounts(){
      if( empty($_POST) ) $this->error();

        $id = isset($_POST["id"]) ? $_POST["id"] : null;
        if( !empty($id) ){
            $item = $this->model->attend($id);
            if( empty($item) ) $this->error();
        }

        try{
            $form = new Form();
            $form   ->post('firstname')->val('is_empty')
                    ->post('lastname')->val('is_empty')
                    ->post('email')->val('is_empty')
                    ->post('username')->val('is_empty');
            $form->submit();
            $postData = $form->fetch();

            $has_name = true;
            if( !empty($item) ){
                if( $item['username'] == $postData['username'] ) $has_name = false;
            }

            if( empty($arr['error']) ){
                if(!empty($id)){
                    $this->model->updateAccounts($id, $postData);
                }
                else{
                    $this->model->insertAccounts($postData);
                }

                $arr['message'] = 'Saved !';
                $arr['url'] = 'refresh';
            }

        } catch (Exception $e) {
            $arr['error'] = $this->_getError($e->getMessage());
        }
        echo json_encode($arr);
    }
    public function del_accounts($id=null){
        $id = isset($_REQUEST["id"]) ? $_REQUEST["id"] : $id;
        if( empty($id) || empty($this->me) || $this->format!='json' ) $this->error();

        $item = $this->model->accounts($id);
        if( empty($item) ) $this->error();

        if( !empty($_POST) ){
            if( !empty($item['permit']['del']) ){
                $this->model->deleteAccounts($id);
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
            $this->view->setPage('path', 'Themes/manage/forms/accounts');
            $this->view->render('del');
        }
    }

}
