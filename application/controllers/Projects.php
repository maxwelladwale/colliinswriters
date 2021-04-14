<?php
	class Projects extends CI_Controller{
		public function index($page = 'projects'){

			$data['title'] = ucfirst($page);

			$data['jobs'] = $this->Post_model->get_jobs();
			print_r($data['jobs']);

			$this->load->view('templates/header');
			$this->load->view('posts/'.$page, $data);
			$this->load->view('templates/footer');
		}
	}