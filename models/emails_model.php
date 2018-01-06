<?php 
class Emails_Model extends Model{

    public function __construct() {
        parent::__construct();
    }
    private $_objName = "emails";
    private $_table = "eamils";
    private $_field = "*";
    private $_cutNamefield = "email_";

    public function insert(&$data){
        $data["{$this->_cutNamefield}created"] = date("c");
        $data["{$this->_cutNamefield}updated"] = date("c");
        $this->db->insert($this->_objName, $data);
        $data['id'] = $this->db->lastInsertId();
    }
    public function update($id, $data){
        $data["{$this->_cutNamefield}updated"] = date("c");
        $this->db->update($this->_objName, $data, "uid={$id}");
    }
    public function delete($id){
        $this->db->delete($this->_objName, "uid={$id}");
    }

    public function lists($options=array()){
        
    }
}