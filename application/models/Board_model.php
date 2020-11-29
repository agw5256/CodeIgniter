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

}
