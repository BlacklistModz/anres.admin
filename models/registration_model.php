<?php
class Registration_Model extends Model{

	public function __construct() {
        parent::__construct();
    }

    private $_objName = "registration";
    private $_table = "registration reg LEFT JOIN users u ON reg.uid=u.reg_id";
    private $_field = "reg.*, u.username, u.email, u.id AS user_id";

    public function insert(&$data){
    	$data["created"] = date("c");
    	$data["updated"] = date("c");
    	$this->db->insert($this->_objName, $data);
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

        $sth = $this->db->prepare("SELECT {$this->_field} FROM {$this->_table} WHERE uid=:id LIMIT 1");
        $sth->execute( array(
            ':id' => $id
        ) );

        return $sth->rowCount()==1
            ? $this->convert( $sth->fetch( PDO::FETCH_ASSOC ) , $options )
            : array();
    }
    public function convert($data , $options=array()){
        $data['permit']['del'] = true;
        $data['fullname'] = $data['firstname'].' '.$data['lastname'];
    	return $data;
    }

		#attend
    public function attend(){
        return $this->db->query("SELECT attend_id AS id, attend_name AS name FROM registration_attend ORDER BY id ASC");
    }
    public function getAttend($id){

        $sth = $this->db->prepare("SELECT attend_id AS id, attend_name AS name FROM registration_attend WHERE attend_id=:id LIMIT 1");
        $sth->execute( array(':id'=>$id) );

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
}
