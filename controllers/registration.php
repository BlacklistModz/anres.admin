<?php

class Registration extends Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index($id=null){
        if( empty($this->me) ) $this->error();
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
    public function save(){
        if( empty($_POST) ) $this->error();

        $id = isset($_POST["id"]) ? $_POST["id"] : null;
        if( !empty($id) ){
            $item = $this->model->get($id);
            if( empty($item) ) $this->error();
        }

        try{
            $form = new Form();
            $form   ->post('title')
                    ->post('firstname')->val('is_empty')
                    ->post('lastname')->val('is_empty')
                    ->post('gender')->val('is_empty')
                    ->post('affiliation')
                    ->post('address')->val('is_empty')
                    ->post('district')
                    ->post('province')->val('is_empty')
                    ->post('postal')->val('is_empty')
                    ->post('region')->val('is_empty')
                    ->post('email')->val('email');
            $form->submit();
            $postData = $form->fetch();

            $has_email = true;
            if( !empty($item) ){
                if( $item['email'] == $postData['email'] ) $has_email = false;
            }
            if( $this->model->is_email($postData['email']) && $has_email ){
                $arr['error']['email'] = 'ตรวจพบ Email นี้ซ้ำในระบบ';
            }

            if( empty($_POST['attend_type']) ){
                $arr['error']['attend_type'] = 'กรุณาเลือก Attend Type';
            }
            if( empty($_POST["presentation_type"]) ){
                $arr['error']['presentation_type'] = 'กรุณาเลือก Presentation Type';
            }

            $postData['attend_type'] = isset($_POST['attend_type']) ? $_POST['attend_type'] : null;
            $postData['presentation_type'] = isset($_POST['presentation_type']) ? $_POST['presentation_type'] : null;
            $postData['attend_type'] = str_replace("-", " ", $postData["attend_type"]);
            $postData['presentation_type'] = str_replace("-", " ", $postData['presentation_type']);

            $attend = $this->model->getAttend($postData['attend_type']);
            $presentation = $this->model->load('presentation')->getPresentation($postData['presentation_type']);

            if( empty($_POST["stu_card"]) ){
                if( !empty($attend['is_student']) && empty($item['path_std']) ){
                    if( empty($_FILES["stu_card"]) ){
                        $arr['error']['stu_card'] = 'กรุณาเลือกไฟล์สำหรับอัพโหลด Student Card';
                    }
                    else{
                        /* CHECK SIZE 2MB */
                        if( $_FILES['stu_card']['size'] > 2100000 ){
                            $arr['error']['stu_card'] = 'ขนาดไฟล์ต้องไม่เกิน 2MB (เมกะไบต์)';
                        }
                    }
                }
            }
            else{
                $postData['stu_card'] = $_POST["stu_card"];
            }

            if( empty($_POST["mou_doc"]) ){
                if( !empty($attend['is_mou']) && empty($item['path_mou']) ){
                    if( empty($_FILES["mou_doc"]) ){
                        $arr['error']['mou_doc'] = 'กรุณาเลือกไฟล์สำหรับอัพโหลด MOU Document';
                    }
                    else{
                        /* CHECK SIZE 2MB */
                        if( $_FILES['mou_doc']['size'] > 2100000 ){
                            $arr['error']['mou_doc'] = 'ขนาดไฟล์ต้องไม่เกิน 2MB (เมกะไบต์)';
                        }
                    }
                }
            }
            else{
                $postData['mou_doc'] = $_POST["mou_doc"];
            }

            if( !empty($presentation['presentation']) ){
                if( empty($_POST["submission_type"]) ){
                    $arr['error']['submission_type'] = 'กรุณาเลือก Submission Type';
                }
                else{
                    $postData['submission_type'] = $_POST["submission_type"];
                }
            }

            if( empty($_POST["payment_type"]) ){
                $arr['error']['payment_type'] = 'กรุณาเลือก Payment Type';
            }
            else{
                $postData['payment_type'] = $_POST["payment_type"];
            }

            if( !empty($_POST) )

            if( empty($arr['error']) ){
                if( !empty($id) ){
                    $this->model->update($id, $postData);
                }
                else{
                    $postData['payment_status'] = 'Waiting';
                    $this->model->insert($postData);
                    $id = $postData['id'];
                }

                if( !empty($id) ){
                    if( !empty($_FILES["stu_card"]) ){
                        if( !empty($item['path_std']) ){
                            @unlink(WWW_UPLOADS."file/".$item['path_std']);
                        }
                        $type = strrchr($_FILES["stu_card"]['name'],".");
                        $name_std = 'stu_'.date('Y-m-d-H-i-s').'_'.uniqid('', true).$type;
                        move_uploaded_file($_FILES["stu_card"]["tmp_name"], WWW_UPLOADS."file/".$name_std);

                        $data['path_std'] = $name_std;
                    }
                    if( !empty($_FILES["mou_doc"]) ){
                        if( !empty($item['path_mou']) ){
                            @unlink(WWW_UPLOADS."file/".$item['path_mou']);
                        }
                        $type = strrchr($_FILES["mou_doc"]['name'],".");
                        $name_mou = 'mou_'.date('Y-m-d-H-i-s').'_'.uniqid('', true).$type;
                        move_uploaded_file($_FILES["mou_doc"]["tmp_name"], WWW_UPLOADS."file/".$name_mou);

                        $data['path_mou'] = $name_mou;
                    }

                    if( !empty($data) ){
                        $this->model->update($id, $data);
                    }
                }

                $arr['message'] = 'บันทึกข้อมูลเรียบร้อย';
                $arr['url'] = URL.'registration';
                $arr['id'] = $id;
            }

        } catch (Exception $e) {
            $arr['error'] = $this->_getError($e->getMessage());
        }
        echo json_encode($arr);
    }
    public function del($id=null){
        $id = isset($_REQUEST["id"]) ? $_REQUEST["id"] : $id;
        if( empty($this->me) ) $this->error();

        $item = $this->model->get($id);
        if( empty($item) ) $this->error();

        if( !empty($_POST) ){
            if( !empty($item['permit']['del']) ){
                $this->model->delete($id);
                $arr['message'] = 'ลบข้อมูลเรียบร้อย';
                $arr['url'] = 'refresh';
            }
            else{
                $arr['message'] = 'ไม่สามารถลบข้อมูลได้';
            }
            echo json_encode($arr);
        }
        else{
            $this->view->setData('item', $item);
            $this->view->setPage('path', 'Themes/manage/forms/registration');
            $this->view->render('del_regis');
        }
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

    /*ATTEND*/
    public function getAttend($text=null, $url=null){
        $text = str_replace("-", " ", $text);
        if( !empty($url) ){
            $text .= '/'.str_replace("-", " ", $url);
        }
        echo json_encode( $this->model->getAttend($text) );
    }
    public function getSubmission($text=null, $url=null){
        $text = str_replace("-", " ", $text);
        if( !empty($url) ){
            $text .= '/'.str_replace("-", " ", $url);
        }
        echo json_encode( $this->model->load('presentation')->getPresentation($text) );
    }

    /* UPLOAD */
    public function upload_student(){
        if( !empty($_FILES["file"]) ){
            $type = strrchr($_FILES["file"]['name'],".");
            $name_std = 'stu_'.date('Y-m-d-H-i-s').'_'.uniqid('', true).$type;
            move_uploaded_file($_FILES["file"]["tmp_name"], WWW_UPLOADS."file/".$name_std);

            $arr['name'] = $name_std;
            $arr['path'] = WWW_UPLOADS."file/".$name_std;
        }
        else{
            $arr['error'] = 'false';
        }

        
        echo json_encode($arr);
    }
    public function upload_mou(){
        if( !empty($_FILES["file"]) ){
            $type = strrchr($_FILES["file"]['name'],".");
            $name_std = 'stu_'.date('Y-m-d-H-i-s').'_'.uniqid('', true).$type;
            move_uploaded_file($_FILES["file"]["tmp_name"], WWW_UPLOADS."file/".$name_std);

            $arr['name'] = $name_std;
            $arr['path'] = WWW_UPLOADS."file/".$name_std;
        }
        else{
            $arr['error'] = 'false';
        }

        
        echo json_encode($arr);
    }

    public function confirm_payment(){
        $PSourceID = isset($_REQUEST["PSourceID"]) ? $_REQUEST["PSourceID"] : null;
        $Currency = isset($_REQUEST["Currency"]) ? $_REQUEST["Currency"] : null;
        $TotAmount = isset($_REQUEST["TotAmount"]) ? $_REQUEST["TotAmount"] : null;
        $RetCode = isset($_REQUEST["RetCode"]) ? $_REQUEST["RetCode"] : null;

        $item = $this->model->get($PSourceID);
        if( !empty($item) ){
            if( $TotAmount != $item['price'] ){
                $postData['payment_status'] = 'Rejected';
            }
            if( $RetCode == "10" ){
                $postData['payment_status'] = 'Waiting';
            }
            else{
                $code = substr($RetCode, 0,1);
                if( $code == 1 ){
                    $postData['payment_status'] = 'Rejected';
                }
                else{
                    $postData['payment_status'] = 'Completed';
                }

                if( $postData['payment_status'] == 'Completed' ){

                    $presentation_type = str_replace(" ", "-", $item['presentation_type']);
                    if( $presentation_type == 'Attend-the-conference-only' ){
                        $mail = new Mailer();
                        $mail->sendThenkYou( array(
                            'title' => 'The International Conference on Agriculture and Natural Resources 2018',
                            'name' => 'Anres Conference 2018',
                            'email' => $item['email'],
                            'fullname' => $item['fullname']
                        ));
                    }
                    else{
                        $password = mt_rand(100000, 999999);

                        $postUser['username'] = $PSourceID;
                        $postUser['uid'] = $PSourceID;
                        $postUser['password'] = $this->fn->q('password')->PasswordHash($password);
                        $postUser['permission'] = 'user';

                        $this->model->load('users')->insert($postData);

                        $mail = new Mailer();
                        $mail->sendConfirm( array(
                            'title' => 'The International Conference on Agriculture and Natural Resources 2018',
                            'name' => 'Anres Conference 2018',
                            'email' => $item['email'],
                            'fullname' => $item['fullname'],
                            'submission_type' => $item['submission_type'],
                            'username' => $postData['username'],
                            'password' => $password
                        ));
                    }
                }
            }

            $this->model->update($PSourceID, $postData);
            $arr['url'] = 'http://anresconference2018.org/member';
        }
        else{
            $arr['error'] = 'Not Found Data !';
        }
        echo json_encode($arr);
    }
}
