<?php
Class News_Feed_Database extends CI_Model {

	public function load_public_news($type){
		if($type==='public'){
			$condition = "news_type = '".$type."'" ;
			$this->db->select('*');
			$this->db->from('tb_news');
			$this->db->join('tb_member', 'tb_member.member_studentID = tb_news.news_authorID');
			$this->db->where($condition);
			$this->db->order_by('news_createdate','DESC');
			$query = $this->db->get();
			return $query->result_array();
		}
	}

	public function load_news_by_id($type,$id){
		if($id!=null){
			if($type==='public'){
				$condition = "news_type = '".$type."' AND news_newsID = '".$id."'" ;
				$this->db->select('*');
				$this->db->from('tb_news');
				$this->db->join('tb_member', 'tb_member.member_studentID = tb_news.news_authorID');
				$this->db->where($condition);
				$this->db->limit(1);
				$query = $this->db->get();
				return $query->result_array();
			}
		}else{
			$condition = "news_type = '".$type."'" ;
			$this->db->select('*');
			$this->db->from('tb_news');
			$this->db->where($condition);
			$this->db->limit(1);
			$this->db->order_by('news_createdate','DESC');
			$query = $this->db->get();
			return $query->result_array();
		}

	}

	public function post_news($topic,$details,$name,$datetime){
		//set time post
			$data2 = array(
				'news_createdate' => $datetime ,
				'news_topic' => $topic ,
				'news_details' => $details ,
				'news_authorID' => $name ,
				'news_type' => 'public' ,
				'news_family' => ''
			);
		$this->db->insert('tb_news',$data2);
	}



	public function delete_news($news_id){
		$this->db->delete('tb_news',array('news_newsid'=>$news_id));
	}

	public function edit_news($data,$news_id){
		$this->db->where('news_newsid', $news_id);
		$this->db->update('tb_news', $data);
	}

	public function reply_news(){
		
	}

	public function edit_reply_news(){
		
	}

	public function delete_reply_news(){
		
	}

}

?>