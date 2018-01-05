<?php

class Admin extends Controller {

    function __construct() {
        parent::__construct();
    }

    public function index(){
        header('location:'.URL.'admin/programs');
    }

    public function settings($section='my',$tap='') {
        
        $this->view->setPage('on', 'settings' );
        $this->view->setData('section', $section);
        if( !empty($tap) ) $this->view->setData('tap', $tap);

        if( $section=='my' ){

            if( empty($tap) ) $tap = 'basic';

    		$this->view->setPage('on', 'settings' );
    		$this->view->setData('section', 'my');
    		$this->view->setData('tap', 'display');
    		$this->view->setData('_tap', $tap);

    		if( $tap=='basic' ){

    			$this->view
    			->js(  VIEW .'Themes/'.$this->view->getPage('theme').'/assets/js/bootstrap-colorpicker.min.js', true)
    			->css( VIEW .'Themes/'.$this->view->getPage('theme').'/assets/css/bootstrap-colorpicker.min.css', true);

    			$this->view->setData('prefixName', $this->model->query('system')->prefixName());
    		}
    	}
    	elseif( $section=='system' ){

    		if( empty($tap) ) $tap = 'basic';

    		$this->view->setPage('on', 'settings' );
    		$this->view->setData('section', 'system');
    		$this->view->setData('tap', 'display');
    		$this->view->setData('_tap', $tap);

    		if( empty($this->permit['system']['view']) ) $this->error();

    		if( !empty($_POST) && $this->format=='json' ){

                foreach ($_POST as $key => $value) {
                    $this->model->query('system')->set( $key, $value);
                }

                $arr['url'] = 'refresh';
                $arr['message'] = 'บันทึกเรียบร้อย';

                echo json_encode($arr); die;
            }

            if( empty($tap) ) $tap = 'basic';
            if( $tap=='locations' ){
                $this->view->setData('city', $this->model->query('system')->city());
            }

            $this->view->setData('tap', 'display');
            $this->view->setData('_tap', $tap);
        }
    	elseif( $section=='users' ){

    		if($tap==''){

                $data = array();

                if( $this->format=="json" ){
                   $this->view->setData('results', $this->model->query('users')->lists());
                   $render = 'settings/sections/users/users/json';
                }

                $this->view->setData("roles", $this->model->query("users")->roles());
                // print_r($data); die;
            }
            // elseif( $tap=='roles' ){
            //     $data = $this->model->query('users')->roles();
            // }
            else{
                $this->error();
            }

            $this->view->setData('data', $data);
    	}
        elseif( $section=="projects" ){
            if( empty($tap) ) $tap == "type";

            if( $tap == "type" ){
                $data = $this->model->query("projects")->type();
            }
            elseif( $tap == "email" ){
                $data = $this->model->query("projects")->email();
            }
            else{
                $this->error();
            }

            $this->view->setData("data", $data);
        }
        else{
            $this->error();
        }
        
        $this->view->render( !empty($render) ? $render : "settings/display");   
    }

    public function programs($id=null){

        $this->view->setPage("title", "Programs");
        $this->view->setPage("on", "programs");

        if( !empty($id) ){

        }
        else{

            $this->view->setData('status', $this->model->query("projects")->status() );

            if( $this->format=='json' )
            {
                $this->view->setData('results', $this->model->query('projects')->lists() );
                $render = "programs/lists/json";
            }
            else{

                $this->view->setData('type', $this->model->query("projects")->type() );
                $render = "programs/lists/display";
            }

            $this->view->render($render);
        }
    }

    public function visitors($id=null){

        $this->view->setPage("title", "Visitors");
        $this->view->setPage("on", "visitors");

        if( !empty($id) ){

        }
        else{
            $this->view->setData("status", $this->model->query("projects")->visitor_status());
            if( $this->format=='json' ){
                $this->view->setData("results", $this->model->query("projects")->visitor_lists());
                $render = "visitors/lists/json";
            }
            else{
                $render = "visitors/lists/display";
            }

            $this->view->render($render);
        }
    }

    public function mambers() {
        
    }

    public function attendees() {
        
    }

    public function presentation() {
        
    }

    public function calendar(){
        $this->view->setPage("on", "calendar");
        $this->view->render("events/calendar");
    }
}