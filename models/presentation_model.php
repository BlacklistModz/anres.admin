<?php
class presentation_Model extends Model{

	public function __construct() {
        parent::__construct();
    }

    public function types($id=null){
        if( !empty($id) ){
            $sth = $this->db->prepare("SELECT type_id AS id, type_name AS name, type_is_presentation
              AS presentation FROM presentation_types WHERE type_id=:id LIMIT 1");
        $sth->execute( array(
            ':id' => $id
        ) );

        return $sth->rowCount()==1
            ? $sth->fetch( PDO::FETCH_ASSOC )
            : array();
        }
        else{
            return $this->db->query("SELECT type_id AS id, type_name AS name, type_is_presentation
              AS presentation FROM presentation_types");
        }
    }

    public function inserttypes($data){
      $this->db->insert("presentation_types", $data);
    }

    public function updatetypes($data,$id){
      $this->db->update("presentation_types", $data, "type_id={$id}");
    }

    public function deletetypes($id){
      $this->db->delete("presentation_types", "type_id={$id}");
    }

    public function is_presentation($text){
      $this->db->count("presentation_types", "type_name=:text", array(":text"=>$text));
    }
  }
  ?>
