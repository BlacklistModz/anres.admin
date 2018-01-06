<?php

class Users_Model extends Model{

    public function __construct() {
        parent::__construct();
    }

    private $_objName = "users";
    private $_table = "users";
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
            $where_str .= "name LIKE :q OR username LIKE :q";
            $where_arr[":q"] = "%{$options['q']}%";

            // $arrQ = explode(' ', $options['q']);
            // $wq = '';
            // foreach ($arrQ as $key => $value) {
            //     $wq .= !empty( $wq ) ? " OR ":'';
            //     $wq .= "name LIKE :q{$key}
            //             OR username LIKE :q{$key}";
            //     $where_arr[":q{$key}"] = "%{$value}%";
            //     $where_arr[":s{$key}"] = "{$value}%";
            //     $where_arr[":f{$key}"] = $value;
            // }

            // if( !empty($wq) ){
            //     $where_str .= !empty( $where_str ) ? " AND ":'';
            //     $where_str .= "($wq)";
            // }
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

        $sth = $this->db->prepare("SELECT {$this->_field} FROM {$this->_table} WHERE id=:id LIMIT 1");
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
    public function insert(&$data){
        $data['create_stamp'] = date("c");
        $data['update_stamp'] = date("c");
        $this->db->insert($this->_objName, $data);
        $data['id'] = $this->db->lastInsertId();
    }
    public function update($id, $data){
        $data['update_stamp'] = date("c");
        $this->db->update($this->_objName, $data, "id={$id}");
    }
    public function delete($id){
        $this->db->delete($this->_objName, "id={$id}");
    }

    /**/
    /* LOGIN */
    /**/
    /*public function login($user, $pass){

        $sth = $this->db->prepare("SELECT id FROM {$this->_table} WHERE username=:login AND password=:pass");

        $sth->execute( array(
            ':login' => $user,
            ':pass' => Hash::create('sha256', $pass, HASH_PASSWORD_KEY)
        ) );

        $fdata = $sth->fetch( PDO::FETCH_ASSOC );
        return $sth->rowCount()==1 ? $fdata['id']: false;
    }*/
    public function login($user, $pass){
        // OR email=:login
        $sth = $this->db->prepare("SELECT id,password FROM {$this->_table} WHERE username=:login AND permission='admin'");
        $sth->execute( array(
            ':login' => $user
        ) );

        $fdata = $sth->fetch( PDO::FETCH_ASSOC );
        if( $sth->rowCount()==1 ){
            if( password_verify($pass, $fdata['password']) ){
                return $fdata['id'];
            }
            else{
                return false;
            }
        }
        else{
            return false;
        }
    }
    public function is_user($text){
        return $this->db->count($this->_objName, "username='{$text}'");
    }
    public function is_email($text){
    	return $this->db->count($this->_objName, "email=:text", array(":text"=>$text));
    }

    #accounts
    /*public function accounts($id=null){
          if( !empty($id) ){
              $sth = $this->db->prepare("SELECT id AS id, firstname AS firstname, lastname AS lastname, email AS email, username AS username, password AS password FROM users WHERE id=:id LIMIT 1");
              $sth->execute( array(':id'=>$id) );

              $fdata = $sth->fetch( PDO::FETCH_ASSOC );

              $fdata['permit']['del'] = true;

              return $sth->rowCount()==1
              ? $fdata
              : array();
          }
          else{
              return $this->db->query("SELECT id AS id, firstname AS firstname, lastname AS lastname, email AS email, username AS username, password AS password FROM users ORDER BY id ASC");
          }
      }
      public function insertAccounts(&$data){
          $data['create_stamp'] = date("c");
          $data['update_stamp'] = date("c");
          $this->db->insert("users", $data);
      }
      public function updateAccounts($id, $data){
          $this->db->update("users", $data, "id={$id}");
      }
      public function deleteAccounts($id){
          $this->db->delete("users", "id={$id}");
      } */
}
