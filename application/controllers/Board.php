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
  function registerboard(){
      $this->load->view('head');

      $this->load->library('form_validation');

      $this->form_validation->set_rules('boardContent', 'boardContent', 'required|min_length[1]|max_length[200]');
      if($this->form_validation->run() === false){
          $this->load->view('boardregister');
      }
      else{
        $this->Board_model->addBoard(array(
          'boardContent'=>$this->input->post('boardContent'),
          'user'=> $this->session->userdata('user_id')
        ));
        $this->session->set_flashdata('message', '게시글 등록에 성공했습니다.');
        $this->load->helper('url');
        redirect("/Board/boardlist");
      }

      $this->load->view('footer');
  }
}
