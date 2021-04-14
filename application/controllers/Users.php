<?php
	class Users extends CI_Controller{
		// Register user
		public function register(){
			$data['title'] = 'Sign Up';
			$data['usertypes'] = $this->user_model->get_usertype();

			$this->form_validation->set_rules('fname', 'First Name', 'required');
			$this->form_validation->set_rules('sname', 'Second Name', 'required');
			$this->form_validation->set_rules('user_type', 'User Type', 'required');
			$this->form_validation->set_rules('email', 'Email', 'required|callback_check_email_exists');
			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_rules('password2', 'Confirm Password', 'matches[password]');

			if($this->form_validation->run() === FALSE){
				$this->load->view('templates/header');
				$this->load->view('templates/navbar');
				$this->load->view('users/register', $data);
				$this->load->view('templates/footer');
			} else {
				// Encrypt password
				$enc_password = md5($this->input->post('password'));

				$this->user_model->register($enc_password);

				// Set message
				$this->session->set_flashdata('user_registered', 'You are now registered and can log in');

				redirect('projects');
			}
		}

		// function auth(){
		// 	$email    = $this->input->post('email',TRUE);
		// 	$password = md5($this->input->post('password',TRUE));
		// 	$validate = $this->login_model->validate($email,$password);
		// 	if($validate->num_rows() > 0){
		// 		$data  = $validate->row_array();
		// 		$name  = $data['user_name'];
		// 		$email = $data['user_email'];
		// 		$level = $data['user_level'];
		// 		$sesdata = array(
		// 			'username'  => $name,
		// 			'email'     => $email,
		// 			'level'     => $level,
		// 			'logged_in' => TRUE
		// 		);
		// 		$this->session->set_userdata($sesdata);
		// 		// access login for admin
		// 		if($level === '1'){
		// 			redirect('page');
		
		// 		// access login for staff
		// 		}elseif($level === '2'){
		// 			redirect('page/staff');
		
		// 		// access login for author
		// 		}else{
		// 			redirect('page/author');
		// 		}
		// 	}else{
		// 		echo $this->session->set_flashdata('msg','Username or Password is Wrong');
		// 		redirect('login');
		// 	}
		//   }
		  
		// Log in user
		public function login(){
			$data['title'] = 'LogIn';

			$this->form_validation->set_rules('first_auth', 'Username | Email', 'required');
			$this->form_validation->set_rules('sec_auth', 'Password', 'required');

			if($this->form_validation->run() === FALSE){
				$this->load->view('templates/header');
				$this->load->view('templates/navbar');
				$this->load->view('users/login', $data);
				$this->load->view('templates/footer');
			} else {
				
				// Get username
				$username = $this->input->post('first_auth');
				// Get and encrypt the password
				$password = md5($this->input->post('sec_auth'));

				// Login user
				$result = $this->user_model->login($username, $password);

				if($result){
					// $user_type = 1;
					// Create session
					$data  = $result->row_array();
					$user_type = $data['usrtype'];
					$user_id = $data['userid'];
					
					$user_data = array(
						'usrtype' => $user_type,
						'userid' => $user_id,
						'usremail' => $username,
						'fname' => $username2,
						
						'logged_in' => true
					);

					$this->session->set_userdata($user_data);
					$usrtype = $this->session->userdata('usrtype');
					$userid = $this->session->userdata('userid');
					$username2 = $this->session->userdata('fname');

					if ($user_type === '1'){
						// Set message
						$this->session->set_flashdata('user_loggedin', 'You are now logged in');
						redirect('projects');
					}elseif ($user_type === '2') {
						// Set message
						$this->session->set_flashdata('user_loggedin', 'You are now logged in');
						redirect('freelancer/index');
					} else {
						redirect('student/index');
					}
				} else {
					// Set message
					$this->session->set_flashdata('login_failed', 'Login is invalid');
					redirect('users/login');
				}		
			}
		}

		// Log user out
		public function logout(){
			// Unset user data
			$this->session->unset_userdata('logged_in');
			$this->session->unset_userdata('user_id');
			$this->session->unset_userdata('usremail');

			// Set message
			$this->session->set_flashdata('user_loggedout', 'You are now logged out');

			redirect('users/login');
		}

		// Check if username exists
		public function check_username_exists($username){
			$this->form_validation->set_message('check_username_exists', 'That username is taken. Please choose a different one');
			if($this->user_model->check_username_exists($username)){
				return true;
			} else {
				return false;
			}
		}

		// Check if email exists
		public function check_email_exists($email){
			$this->form_validation->set_message('check_email_exists', 'That email is taken. Please choose a different one');
			if($this->user_model->check_email_exists($email)){
				return true;
			} else {
				return false;
			}
		}

		public function timeline($page = 'timeline'){

			$data['title'] = ucfirst($page);
			
			$this->load->view('templates/header');
			$this->load->view('templates/navbar');
			$this->load->view('posts/'.$page, $data);
			$this->load->view('templates/footer');
		}
		//usertypes
		public function fview($slug = NULL){
			

			if(empty($data['kill'])){
				show_404();
			}

			$data['kills'] = $data['kill']['jid'];
			
			$this->load->view('templates/header');
			$this->load->view('templates/navbar');
			$this->load->view('freelancer/viewjob', $data);
			$this->load->view('templates/footer');
		}

	}