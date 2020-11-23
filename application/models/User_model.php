<?php

class User_model extends CI_Model
{
  public function gets()
	{
		//return $this->db->query("SELECT * FROM User")->result();
	}
  function add($option)
   {
     $this->db->set('ID', $option['id']);
     $this->db->set('password', $option['password']);
     $this->db->set('name', $option['name']);
     $this->db->set('email', $option['email']);
     $this->db->set('created', 'NOW()', false);

     $this->db->insert('User');
     $result = $this->db->insert_id();

     return $result;
   }
   function getByEmail($option)
   {
       $result = $this->db->get_where('user', array('email'=>$option['email']))->row();
       return $result;
   }
}
