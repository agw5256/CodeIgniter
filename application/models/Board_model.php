<?php

class Board_model extends CI_Model
{
  public function gets($data)
	{
		return $this->db->query("SELECT * FROM Board WHERE boardContent like '%$data%'")->result();
	}
  public function get($id)
	{
    return $this->db->query("SELECT * FROM Board WHERE $id")->row();
	}
  function addBoard($option)
   {
     $this->db->set('boardContent', $option['boardContent']);
     $this->db->set('user', $option['user']);

     $this->db->insert('board');
     $result = $this->db->insert_id();

     return $result;
   }
}
