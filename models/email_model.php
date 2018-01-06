<?php
class Email_Model extends Model{

	public function __construct() {
        parent::__construct();
    }

    private $_objName = "email";
    private $_table = "email";
    private $_field = "*";

		public function lists( $options=array() ){

			$options = array_merge(array(
						'pager' => isset($_REQUEST['pager'])? $_REQUEST['pager']:1,
						'limit' => isset($_REQUEST['limit'])? $_REQUEST['limit']:50,

						'sort' => isset($_REQUEST['sort'])? $_REQUEST['sort']: 'create_stamp',
						'dir' => isset($_REQUEST['dir'])? $_REQUEST['dir']: 'DESC',

						'time'=> isset($_REQUEST['time'])? $_REQUEST['time']:time(),
						'q' => isset($_REQUEST['q'])? $_REQUEST['q']:null,

						'more' => true
				), $options);

				$date = date('Y-m-d H:i:s', $options['time']);

				$where_str = "";
				$where_arr = array();

				if( !empty($options['q']) ){
						$where_str .= !empty($where_str) ? " AND " : "";
						$where_str .= "email_title LIKE :q";
						$where_arr[":q"] = "%{$options['q']}%";
				}

				if( isset($_REQUEST["permission"]) ){
						$options["permission"] = $_REQUEST["permission"];
				}
				if( !empty($options["permission"]) ){
						$where_str .= !empty($where_str) ? " AND " : "";
						$where_str .= "permission=:permission";
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

        $sth = $this->db->prepare("SELECT {$this->_field} FROM {$this->_table} WHERE email_id=:id LIMIT 1");
        $sth->execute( array(
            ':id' => $id
        ) );

        return $sth->rowCount()==1
            ? $this->convert( $sth->fetch( PDO::FETCH_ASSOC ) , $options )
            : array();
    }
    // public function convert($data , $options=array()){
    //     $data['permit']['del'] = true;
    //     $data['fullname'] = $data['firstname'].' '.$data['lastname'];
    //     $data['payment_status_arr'] = $this->getPaymentStatus($data['payment_status']);
    // 	return $data;
    // }

    public function email($id=null){
        if( !empty($id) ){
            $sth = $this->db->prepare("SELECT email_id AS id, email_title AS title, email_detial AS detial FROM email WHERE email_id=:id LIMIT 1");
            $sth->execute( array(':id'=>$id) );

            $fdata = $sth->fetch( PDO::FETCH_ASSOC );

            $fdata['permit']['del'] = true;

            return $sth->rowCount()==1
            ? $fdata
            : array();
        }
        else{
            return $this->db->query("SELECT email_id AS id, email_title AS title, email_detial AS detial FROM email ORDER BY email_id ASC");
        }
    }
    // public function getEmail($keyword){
    //     $sth = $this->db->prepare("SELECT email_id AS id, email_title AS title, email_detial AS detial FROM email WHERE email_id=:id LIMIT 1");
    //     $sth->execute( array(':id'=>$id) );
    //
    //     $fdata = $sth->fetch( PDO::FETCH_ASSOC );
    //
    //     $fdata['permit']['del'] = true;
    //
    //     return $sth->rowCount()==1
    //     ? $fdata
    //     : array();
    // }
    public function insertEmail(&$data){
        $this->db->insert("email", $data);
    }
    public function updateEmail($id, $data){
        $this->db->update("email", $data, "email_id={$id}");
    }
    public function deleteEmail($id){
        $this->db->delete("email", "email_id={$id}");
    }

}
