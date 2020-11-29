<?php

class Board_model extends CI_Model
{
  public function gets()
	{
		return $this->db->query("SELECT * FROM Board")->result();
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
