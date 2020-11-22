<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Auth extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
    $this->load->database();
    $this->load->model('User_model');
	}
  function get(){
        $this->load->view('head');
        $topic = $this->User_model->gets();
        $this->load->view('get', array('topic'=>$topic));
        $this->load->view('footer');
  }
  function login(){
     	$this->load->view('head');
      $this->load->view('login');
      $this->load->view('footer');
  }

  function logout(){
     	$this->session->sess_destroy();
     	$this->load->helper('url');
     	redirect('/Auth/login');
  }

  function register(){
      $this->load->view('head');

      $this->load->library('form_validation');

      $this->form_validation->set_rules('email', 'E-mail', 'required|valid_email|is_unique[User.email]');
  		$this->form_validation->set_rules('id', 'Student ID', 'required|min_length[4]|max_length[10]|is_unique[User.ID]');
  		$this->form_validation->set_rules('password', 'PASSWORD', 'required|min_length[6]|max_length[30]|matches[re_password]');
  		$this->form_validation->set_rules('re_password', 'RE-PASSWORD', 'required');
  		$this->form_validation->set_rules('name', 'NAME', 'required');

      if($this->form_validation->run() === false){
          $this->load->view('register');
      } else {
          if(!function_exists('password_hash')){
              $this->load->helper('password');
          }
          $hash = password_hash($this->input->post('password'), PASSWORD_BCRYPT);

          $this->load->model('User_model');
          $this->User_model->add(array(
              'id' => $this->input->post('id'),
              'email'=>$this->input->post('email'),
              'password'=>$hash,
              'name'=>$this->input->post('name')
          ));

          $this->session->set_flashdata('message', '회원가입에 성공했습니다.');
          $this->load->helper('url');
          redirect('/Auth/login');
      }


      $this->load->view('footer');
  }
  function authentication(){
    	$this->load->model('User_model');
      $user = $this->User_model->getByEmail(array('email'=>$this->input->post('email')));
      if(!function_exists('password_hash')){
          $this->load->helper('password');
      }
    	if(
    		$this->input->post('email') == $user->email &&
            password_verify($this->input->post('password'), $user->password)
    	) {
    		$this->session->set_userdata('is_login', true);
    		$this->load->helper('url');
    		redirect("/Auth/login");
    	} else {
    		echo "불일치";
    		$this->session->set_flashdata('message', '로그인에 실패 했습니다.');
    		$this->load->helper('url');
    		redirect('/Auth/login');
    	}
    }

    function mypage(){
      if (!$this->session->userdata('is_login')) {
        redirect('/auth/login/');
      }

      $this->load->view('head');
      $uid = $this->session->userdata('user_id');

      $user_info = $this->user_model->getUserinfo($uid);

      $this->load->view('mypage', array('user_id' => $uid, 'user_info' => $user_info));
      $this->load->view('footer');
    }
}
