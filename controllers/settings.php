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
}
