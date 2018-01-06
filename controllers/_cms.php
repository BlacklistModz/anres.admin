<?php 
class Cms extends Controller {

    function __construct() {
        parent::__construct();
    }

    public function index(){
        header('location:'.URL.'cms/settings');
    }

    public function settings($section='my',$tap=''){

    	$this->view->setPage('on', 'settings' );
        $this->view->setPage('title', 'ตั้งค่า');
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
            if( $tap=='fonts' ){
                $this->view->setData('results', $this->model->query('font')->lists());
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
        elseif( $section=='student' ){

            if( empty($tap) ) $tap = "faculty";

            if( $tap=='faculty' ){
                $data = array();
                if( $this->format=="json" ){
                   $this->view->setData('results', $this->model->query('student')->faculty());
                   $render = 'settings/sections/student/faculty/json';
                }
            }
            elseif( $tap=='majors' ){
                if( $this->format=="json" ){
                   $this->view->setData('results', $this->model->query('student')->majors());
                   $render = 'settings/sections/student/majors/json';
                }
                $this->view->setData('faculty', $this->model->query('student')->faculty());
            }
            else{
                $this->error();
            }

            // $this->view->setData('data', $data);
            $this->view->setData('tap', $tap);
        }
        elseif( $section == 'academic' ){

            if( empty($tap) ) $tap = 'year';

            if( $tap=='year' ){
                $data = array();
                if( $this->format=="json" ){
                   $this->view->setData('results', $this->model->query('year')->lists());
                   $render = 'settings/sections/academic/year/json';
                }
            }
            elseif( $tap=='term' ){
                if( $this->format=="json" ){
                   $this->view->setData('results', $this->model->query('year')->term());
                   $render = 'settings/sections/academic/term/json';
                }
                $this->view->setData('year', $this->model->query('year')->lists());
            }
            else{
                $this->error();
            }

            $this->view->setData('tap', $tap);
        }
        elseif( $section=='news' ){

            $data = array();
            if( empty($tap) ) $tap = 'forums';

            if( $tap=='forums' ){
                $data = $this->model->query('topics')->forums();
            }

            $this->view->setData('data', $data);
        }
        else{
            $this->error();
        }
        
        $this->view->render( !empty($render) ? $render : "settings/display");
    }
    public function student($id=null, $section='basic'){

        $this->view->setPage('title', 'นักศึกษา');
        $this->view->setPage('on', 'student');

        if( !empty($id) ){
            $item = $this->model->query('student')->get($id);
            if( empty($item) ) $this->error();

            $this->view->setData('year', $this->model->query('year')->lists());
            $this->view->setData('faculty', $this->model->query('student')->faculty());
            $this->view->setData('status', $this->model->query('users')->status());

            if( $section=='basic' ){
                $this->view->setData('prefixName', $this->model->query('system')->prefixName());
            }

            $this->view->setData('item', $item);
            $this->view->setData('section', $section);
            $render = 'student/profile/display';
        }
        else{
            if( $this->format=='json' ) {

                $results = $this->model->query('student')->lists();
                $this->view->setData('results', $results);
                $render = "student/lists/json";
            } 
            else{

                $this->view->setData('faculty', $this->model->query('student')->faculty());
                $render = "student/lists/display";
           }
        }

        $this->view->render( $render );
    }
    public function corporation($id=null){

        $this->view->setPage('title', 'สถานประกอบการ');
        $this->view->setPage('on', 'corporation');

        if( !empty($id) ){

        }
        else{
            if( $this->format=='json' ) {

                $results = $this->model->query('corporation')->lists();
                $this->view->setData('results', $results);
                $render = "corporation/lists/json";
            } 
            else{
                $render = "corporation/lists/display";
           }
        }

        $this->view->render( $render );
    }
    public function news($id=null){
        $id = isset($_REQUEST["id"]) ? $_REQUEST["id"] : $id;

        $this->view->setPage('title', 'ข่าวสาร');
        $this->view->setPage('on', 'news');

        if( $this->format=='json' ) {

            $results = $this->model->query('topics')->lists();
            $this->view->setData('results', $results);
            $render = "news/json";
        } 
        else{
            $this->view->setData('forums', $this->model->query('topics')->forums());
            $this->view->setData('status', $this->model->query('topics')->status());
            $render = "news/display";
        }

        $this->view->render( $render );
    }
}