<?php
Class Partner_Database extends CI_Model {

	public function save($name,$host){
		$data = array(
		   'take_partner' => $name ,
		   'take_host' =>  $host
		);
		$this->db->insert('tb_take', $data); 
	}


}

?>