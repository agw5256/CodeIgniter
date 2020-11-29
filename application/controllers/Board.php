<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Board extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
    $this->load->database();
    $this->load->model('Board_model');
	}
  function boardlist(){
     	$this->load->view('head');
      $data = $this->Board_model->gets();
      $this->load->view('board_list', array('data'=>$data));
      $this->load->view('footer');
  }
  function myboard($id){
      $this->load->view('head');
      $data = $this->Board_model->get($id);
      $this->load->view('board', array('data'=>$data));
      $this->load->view('footer');
  }

}
