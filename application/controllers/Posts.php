<?php
	class Posts extends CI_Controller{

		public function __construct()
        {
                parent::__construct();
				$this->load->helper(array('form', 'url'));
		}	
		
		//cw controller functions start
		public function projects($page = 'projects'){

			$data['title'] = ucfirst($page);

			$data['jobs'] = $this->post_model->get_jobs();
			$data['categories'] = $this->post_model->get_categories();
			
			$this->load->view('templates/header');
			$this->load->view('templates/navbar');
			$this->load->view('posts/'.$page, $data);
			$this->load->view('templates/footer');
		}

		public function userprojects($page = 'projects'){

			$data['title'] = ucfirst($page);

			$data['jobs'] = $this->post_model->get_jobs();
			$data['categories'] = $this->post_model->get_categories();
			
			$this->load->view('templates/header');
			$this->load->view('templates/navbar');
			$this->load->view('posts/'.$page, $data);
			$this->load->view('templates/footer');
		}
		public function view($id = NULL){
			
			$data['kill'] = $this->post_model->get_jobs($id);

			if(empty($data['kill'])){
				show_404();
			}

			$data['kills'] = $data['kill']['jid'];
			
			$this->load->view('templates/header');
			$this->load->view('templates/navbar');
			$this->load->view('posts/viewjob', $data);
			$this->load->view('templates/footer');
		}
		
		public function myprojects($page = 'myprojects'){

			$data['title'] = ucfirst($page);

			$data['jobs'] = $this->post_model->get_jobs();
			$data['categories'] = $this->post_model->get_categories();
			
			$this->load->view('templates/header');
			$this->load->view('templates/navbar');
			$this->load->view('posts/'.$page, $data);
			$this->load->view('templates/footer');
		}

		
		public function delete($id){
			// echo $id;
			$this->post_model->delete_post($id);
			redirect('posts/myprojects');
		}

		public function edit($id){
			echo $id;
			$data['kill'] = $this->post_model->get_jobs($id);
			
			$data['categories'] = $this->post_model->get_categories();
			$data['subcategories'] = $this->post_model->get_subcat();
			$data['plans'] = $this->post_model->get_plan();
			$data['skills'] = $this->post_model->get_skill();

			if(empty($data['kill'])){
				show_404();
			}
			$data['title'] = "Edit Project";

			// $data['kills'] = $data['kill']['jid'];

			$this->load->view('templates/header');
			// $this->load->view('templates/navbar');
			$this->load->view('posts/edit', $data);
			$this->load->view('templates/footer');
		}

		public function updatepost(){
			$this->post_model->update_post();
			redirect('post/myprojects');

		}

		public function timeline(){	
			$data['title'] = "User Timeline";
			$data['bids'] = $this->post_model->get_bids();
			$data['bidsreviews'] = $this->post_model->get_reviewbids();
			$data['bidspending'] = $this->post_model->get_pendingbids();
			$data['bidspaid'] = $this->post_model->get_paidbids();

			// var_dump ($data);
			
			$this->load->view('templates/header');
			$this->load->view('templates/navbar');
			$this->load->view('posts/timeline', $data);
			$this->load->view('templates/footer');
		}
		//freelancer project view
		public function fview($slug = NULL){
			
			$data['kill'] = $this->post_model->get_jobs($slug);

			if(empty($data['kill'])){
				show_404();
			}

			$data['kills'] = $data['kill']['jid'];
			
			$this->load->view('templates/header');
			$this->load->view('templates/navbar');
			$this->load->view('freelancer/viewjob', $data);
			$this->load->view('templates/footer');
		}

		public function placebid($jobid){

			$bidposted = $this->post_model->placebid($jobid);

			if($bidposted) {
				redirect('posts/myprojects');
			}else{
				redirect ('http://localhost/startup/projects/');
			}
		}

		//freelancer project view
		public function finishedproject($slug = NULL){
			
			$data['kill'] = $this->post_model->get_jobs($slug);
			$data['jobs'] = $this->post_model->get_jobs();


			if(empty($data['kill'])){
				show_404();
			}

			$data['kills'] = $data['kill']['jid'];
			
			$this->load->view('templates/header');
			$this->load->view('templates/navbar');
			$this->load->view('freelancer/finishedproject', $data);
			$this->load->view('templates/footer');
		}

		public function finishedprojectupload()
        {
				$config['upload_path']          = 'assets/image/posts';
                $config['allowed_types']        = 'gif|jpg|png|pdf';

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('userfile'))
                {
                        $error = array('error' => $this->upload->display_errors());

                        $this->load->view('finishedproject', $error);
                }
                else
                {
						$data = array('upload_data' => $this->upload->data());
						$post_image = $_FILES['userfile']['name'];
						$this->post_model->upload_finished_project($post_image);

                        $this->load->view('posts/projects');
                }
		}
		


	}