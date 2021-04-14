<?php
	class Freelancer extends CI_Controller{
    //freelalncer dashboard 
    public function freelancerindex($page = 'index'){
        $userid = $this->session->userdata('userid');
        $data ['title'] = ucfirst($page);
        $data['fbids'] = $this->freelancer_model->get_dashbids();
        $data['fbidsr'] = $this->freelancer_model->get_dashbidsR();
        

        echo $data['fbids'];
 
        $this->load->view('templates/header2');
        $this->load->view('freelancer/'.$page, $data);
        $this->load->view('templates/footer2');
    }
        
        //Freelancer Browse jobs 
        //cw controller functions start
		public function projects($page = 'projects'){

			$data['title'] = ucfirst($page);

			$data['jobs'] = $this->freelancer_model->get_jobs();
			$data['categories'] = $this->post_model->get_categories();
			
			$this->load->view('templates/header2');
			$this->load->view('freelancer/'.$page, $data);
			$this->load->view('templates/footer2');
        }

       //freelancer single project view
    //this view shows student project that has not been assigned yet
    public function singleproject($slug = NULL){
        $data['fjobo'] = $this->freelancer_model->sview($slug);
        if(empty($data['fjobo'])){
            show_404();
        }
        $data['fjobos'] = $data['fjobo']['jid'];

        $this->load->view('templates/header2');
        $this->load->view('freelancer/singleproject', $data);
        $this->load->view('templates/footer2');
    }

        //single-job
        // public function timeline($page = 'timeline'){

		// 	$data['title'] = ucfirst($page);

		// 	$data['jobs'] = $this->post_model->get_jobs();
		// 	$data['categories'] = $this->post_model->get_categories();
			
		// 	$this->load->view('templates/header2');
		// 	$this->load->view('freelancer/'.$page, $data);
		// 	$this->load->view('templates/footer2');
        // }
        public function placebid($jobid){

			$bidposted = $this->freelancer_model->placebid($jobid);

			if($bidposted) {
				redirect('posts/myprojects');
			}else{
				redirect ('http://localhost/startup/projects/');
			}
		}
        
        public function downloadfile($id){
            $this->load->helper('download');
            $fileinfo = $this->freelancermodel->download($id);
            $file = 'assets/image/posts/'.$fileinfo['filename'];
            force_download($file, NULL);
        }
        public function timeline(){	
        $data['title'] = "User Timeline";
        $data['projects'] = $this->freelancer_model->get_proj();
        // $data['projects_review'] = $this->student_model->get_proj_review();
        // $data['projects_paid'] = $this->student_model->get_proj_paid();
        // $data['projects_workshop'] = $this->student_model->get_proj_workshop();
        // $data['projects_completed'] = $this->student_model->get_proj_completed();

        // var_dump ($data);
        
        $this->load->view('freelancer/timeline', $data);
    }

    // public function create(){
    // $userid = $this->session->userdata('userid');

    //     $data['title'] = 'Post Work';

    //     $data['categories'] = $this->post_model->get_categories();
    //     $data['subcategories'] = $this->post_model->get_subcat();
    //     $data['plans'] = $this->post_model->get_plan();
    //     $data['skills'] = $this->post_model->get_skill();

    //     $this->form_validation->set_rules('title', 'Title', 'required');
    //     $this->form_validation->set_rules('editor1', 'Description', 'required');
    //     $this->form_validation->set_rules('category', 'Category', 'required');
    //     $this->form_validation->set_rules('subcat', 'Subcat', 'required');
    //     $this->form_validation->set_rules('skill', 'Skill', 'required');
    //     $this->form_validation->set_rules('plan', 'Plan', 'required');
    //     $this->form_validation->set_rules('currency', 'Currency', 'required');
    //     $this->form_validation->set_rules('price', 'Price', 'required');

    //     if($this->form_validation->run() == FALSE){
    //         $this->load->view('templates/header');
    //         $this->load->view('templates/navbar');
    //         $this->load->view('student/create', $data, $userid);
    //         $this->load->view('templates/footer');
    //     } else {
    //         //file upload
    //         $config ['upload_path'] = 'assets/image/posts';
    //         $config['allowed_types'] = 'gif|jpg|png|pdf';
    //         // $config['max_size'] = 100;
    //         // $config['max_width'] = 1024;
    //         // $config['max_height'] = 768;
                            
    //         $this->load->library('upload', $config);

    //         if(!$this->upload->do_upload()){
    //             $errors = array('error' => $this->upload->display_errors());
    //             $post_image = 'noimage.jpg';
    //         } else {
    //             $data = array('upload_data' => $this->upload->data());
    //             $post_image = $_FILES['userfile']['name'];
    //         }
    //         //var_dump($data);
    //         $this->student_model->create_post($post_image, $userid);

    //         $this->session->set_flashdata('post_created', 'Your post has been created');

    //         $this->load->view('templates/header');
    //         $this->load->view('templates/navbar');
    //         $this->load->view('student/create', $data);
    //         $this->load->view('templates/footer');
    //     }
    // }

    // public function timeline(){	
    //     $data['title'] = "User Timeline";
    //     $data['projects'] = $this->student_model->get_proj();
    //     $data['projects_review'] = $this->student_model->get_proj_review();
    //     $data['projects_paid'] = $this->student_model->get_proj_paid();
    //     $data['projects_workshop'] = $this->student_model->get_proj_workshop();
    //     $data['projects_completed'] = $this->student_model->get_proj_completed();

    //     // var_dump ($data);
        
    //     $this->load->view('templates/header');
    //     $this->load->view('templates/navbar');
    //     $this->load->view('student/timeline', $data);
    //     $this->load->view('templates/footer');
    // }

    // //freelancer single project view
    // //this view shows student project that has not been assigned yet
    // public function singleproject($slug = NULL){
    //     $data['jobo'] = $this->student_model->get_jobs($slug);
    //     if(empty($data['jobo'])){
    //         show_404();
    //     }
    //     $data['jobos'] = $data['jobo']['jid'];

    //     $this->load->view('templates/header');
    //     $this->load->view('templates/navbar');
    //     $this->load->view('student/singleproject', $data);
    //     $this->load->view('templates/footer');
    // }
    // //freelancer project view
    // public function finishedproject($slug = NULL){
                
    //     $data['kill'] = $this->student_model->get_jobs($slug);
    //     $data['jobs'] = $this->student_model->get_jobs();


    //     if(empty($data['kill'])){
    //         show_404();
    //     }

    //     $data['kills'] = $data['kill']['jid'];
        
    //     $this->load->view('templates/header');
    //     $this->load->view('templates/navbar');
    //     $this->load->view('student/finishedproject', $data);
    //     $this->load->view('templates/footer');
    // }	
}
