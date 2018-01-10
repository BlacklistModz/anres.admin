<?php
class Registration_Model extends Model{

	public function __construct() {
        parent::__construct();
    }

    private $_objName = "registration";
    private $_table = "registration reg LEFT JOIN users u ON reg.uid=u.uid";
    private $_field = "reg.*, u.username, u.email AS user_email, u.id AS user_id";

    public function insert(&$data){
    	$data["created"] = date("c");
    	$data["updated"] = date("c");
    	$this->db->insert($this->_objName, $data);
        $data['id'] = $this->db->lastInsertId();
    }
    public function update($id, $data){
    	$data["updated"] = date("c");
    	$this->db->update($this->_objName, $data, "uid={$id}");
    }
    public function delete($id){
    	$this->db->delete($this->_objName, "uid={$id}");
    }
    public function is_uid($text){
    	return $this->db->count($this->_objName, "uid=:text", array(":text"=>$text));
    }

    public function lists($options=array()){
    	$options = array_merge(array(
            'pager' => isset($_REQUEST['pager'])? $_REQUEST['pager']:1,
            'limit' => isset($_REQUEST['limit'])? $_REQUEST['limit']:50,

            'sort' => isset($_REQUEST['sort'])? $_REQUEST['sort']: 'created',
            'dir' => isset($_REQUEST['dir'])? $_REQUEST['dir']: 'DESC',

            'time'=> isset($_REQUEST['time'])? $_REQUEST['time']:time(),
            'q' => isset($_REQUEST['q'])? $_REQUEST['q']:null,

            'more' => true
        ), $options);

        $date = date('Y-m-d H:i:s', $options['time']);

        $where_str = "";
        $where_arr = array();

        if( isset($_REQUEST["country"]) ){
            $options["country"] = $_REQUEST["country"];
        }
        if( !empty($options["country"]) ){
            $where_str .= !empty($where_str) ? " AND " : "";
            $where_str .= "region=:country";
            $where_arr[":country"] = $options["country"];
        }

        if( isset($_REQUEST["payment_status"]) ){
            $options["payment_status"] = $_REQUEST["payment_status"];
        }
        if( !empty($options["payment_status"]) ){
            $where_str .= !empty($where_str) ? " AND " : "";
            $where_str .= "payment_status=:payment_status";
            $where_arr[":payment_status"] = $options["payment_status"];
        }

        if( !empty($options["permission"]) ){
            $where_str .= !empty($where_str) ? " AND " : "";
            $where_str .= "u.permission=:permission";
            $where_arr[":permission"] = $options["permission"];
        }

        $arr['total'] = $this->db->count($this->_table, $where_str, $where_arr);

        $where_str = !empty($where_str) ? "WHERE {$where_str}":'';
        $orderby = $this->orderby( $options['sort'], $options['dir'] );
        $limit = $this->limited( $options['limit'], $options['pager'] );

        $arr['lists'] = $this->buildFrag( $this->db->query("SELECT {$this->_field} FROM {$this->_table} {$where_str} {$orderby} {$limit}", $where_arr ), $options  );

        if( ($options['pager']*$options['limit']) >= $arr['total'] ) $options['more'] = false;
        $arr['options'] = $options;

        return $arr;
    }
    public function buildFrag($results, $options=array()) {
        $data = array();
        foreach ($results as $key => $value) {
            if( empty($value) ) continue;
            $data[] = $this->convert($value , $options);
        }
        return $data;
    }
    public function get($id, $options=array()){

        $sth = $this->db->prepare("SELECT {$this->_field} FROM {$this->_table} WHERE reg.uid=:id LIMIT 1");
        $sth->execute( array(
            ':id' => $id
        ) );

        return $sth->rowCount()==1
            ? $this->convert( $sth->fetch( PDO::FETCH_ASSOC ) , $options )
            : array();
    }
    public function convert($data , $options=array()){
        $data['permit']['del'] = true;
        $data['fullname'] = $data['title'].$data['firstname'].' '.$data['lastname'];
        $data['payment_status_arr'] = $this->getPaymentStatus($data['payment_status']);
        $data['paper'] = $this->listsFile($data['uid']);

        if( !empty($data['presentation_file']) ){
            $data['presentation_path'] = UPLOADS_PAPER.$data['presentation_file'];
        }

    	return $data;
    }
    public function is_email($text){
        return $this->db->count($this->_objName,"email=:text", array(":text"=>$text));
    }

	#attend
    public function attend($id=null){
        if( !empty($id) ){
            $sth = $this->db->prepare("SELECT attend_id AS id, attend_name AS name, attend_keyword AS keyword, attend_is_student AS is_student, attend_is_international AS is_international, attend_is_mou AS is_mou FROM registration_attend WHERE attend_id=:id LIMIT 1");
            $sth->execute( array(':id'=>$id) );

            $fdata = $sth->fetch( PDO::FETCH_ASSOC );

            $fdata['permit']['del'] = true;

            return $sth->rowCount()==1
            ? $fdata
            : array();
        }
        else{
            return $this->db->query("SELECT attend_id AS id, attend_name AS name, attend_keyword AS keyword, attend_is_student AS is_student, attend_is_international AS is_international, attend_is_mou AS is_mou FROM registration_attend ORDER BY attend_id ASC");
        }
    }
    public function getAttend($keyword){
        $sth = $this->db->prepare("SELECT attend_id AS id, attend_name AS name, attend_keyword AS keyword, attend_is_student AS is_student, attend_is_international AS is_international, attend_is_mou AS is_mou FROM registration_attend WHERE attend_keyword=:keyword LIMIT 1");
        $sth->execute( array(':keyword'=>$keyword) );

        $fdata = $sth->fetch( PDO::FETCH_ASSOC );

        $fdata['permit']['del'] = true;

        return $sth->rowCount()==1
        ? $fdata
        : array();
    }
    public function insertAttend(&$data){
        $this->db->insert("registration_attend", $data);
    }
    public function updateAttend($id, $data){
        $this->db->update("registration_attend", $data, "attend_id={$id}");
    }
    public function deleteAttend($id){
        $this->db->delete("registration_attend", "attend_id={$id}");
    }
    public function is_attend($text){
        return $this->db->count("registration_attend", "attend_name=:text", array(":text"=>$text));
    }

    /*Payment Status*/
    public function paymentStatus(){
        $a[] = array('id'=>'Waiting', 'name'=>'Waiting', 'color'=>'yellow', 'color_text'=>'#fff');
        $a[] = array('id'=>'Rejected', 'name'=>'Rejected', 'color'=>'red',  'color_text'=>'#fff');
        $a[] = array('id'=>'Completed', 'name'=>'Completed', 'color'=>'green',  'color_text'=>'#fff');

        return $a;
    }
    public function getPaymentStatus($id){
        $data = array();
        foreach ($this->paymentStatus() as $key => $value) {
            if( $id == $value['id'] ){
                $data = $value;
                break;
            }
        }
        return $data;
    }

    public function billPayment(){
        $a[] = array('id'=>1, 'name'=>'Counter Service / Bill Payment');
        $a[] = array('id'=>2, 'name'=>'Credit Card');
        $a[] = array('id'=>3, 'name'=>'Cash');

        return $a;
    }

    public function titleName(){
        $a[] = array('id'=>'Prof', 'name'=>'Prof');
        $a[] = array('id'=>'Doctor', 'name'=>'Doctor');
        $a[] = array('id'=>'Mr.', 'name'=>'Mr.');
        $a[] = array('id'=>'Mrs.', 'name'=>'Mrs.');
        $a[] = array('id'=>'Miss', 'name'=>'Miss');

        return $a;
    }

    public function country(){
        return $this->db->query("SELECT id, country_name AS name FROM apps_countries ORDER BY country_name ASC");
    }

    public function submission(){
        $a[] = array('id'=>'Abstract', 'name'=>'Abstract');
        $a[] = array('id'=>'Proceeding', 'name'=>'Proceeding');
        $a[] = array('id'=>'Full article', 'name'=>'Full article');

        return $a;
    }

    #FILE
    public function listsFile($uid){
        $data = array();
        $results = $this->db->query("SELECT * FROM papers WHERE paper_uid = {$uid} ORDER BY paper_seq ASC");
        foreach ($results as $key => $value) {
            $value = $this->cut("paper_", $value);

            $data[$value['seq']] = $value;
            $data[$value['seq']]['path'] = UPLOADS.'paper/'.$value['file'];
        }
        return $data;
    }
}
