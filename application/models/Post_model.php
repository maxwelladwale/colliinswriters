<?php
	class Post_model extends CI_Model{
		public function __construct(){
			$this->load->database();
		}

		//fetch all jobs
		public function get_jobs($id = FALSE, $limit = FALSE, $offset = FALSE){
			if($limit){
				$this->db->limit($limit, $offset);
			}
			if($id === FALSE){ 
				$this->db->order_by('jobs.jid', 'DESC');
				$this->db->join('categories', 'categories.cid = jobs.jcategory');
				$this->db->join( 'plans', 'plans.pid = jobs.plan');
				// $this->db->join( 'subcategories', 'subcategories.sbcid = jobs.jsubcat');
				$this->db->where('status', 'Active'); #where clause to filter out data
				$query = $this->db->get('jobs');
				return $query->result_array();
			}

			$this->db->join('categories', 'categories.cid = jobs.jcategory');
			$this->db->join( 'plans', 'plans.pid = jobs.plan');
			$query = $this->db->get_where('jobs', array('jid' => $id));
			return $query->row_array();
		}
		
		public function get_categories(){
			$this->db->order_by('cname');
			$query = $this->db->get('categories');
			return $query->result_array();
		}

		public function get_subcat(){
			$this->db->order_by('sbname');
			$query = $this->db->get('subcategories');
			return $query->result_array();
		}

		public function get_plan(){
			$this->db->order_by('pname');
			$query = $this->db->get('plans');
			return $query->result_array();
		}

		public function get_skill(){
			$this->db->order_by('sid');
			$query = $this->db->get('skills');
			return $query->result_array();
		}

		//Delete uploaded project
		public function delete_post($id){
			$this->db->where('jid', $id);
			$this->db->delete('jobs');
			return true;
		}

		//update uploaded project
		public function update_post(){
			$slug = url_title($this->input->post('title'));

			//edited project data
			$data = array (
				'jtitle' => $this->input->post('title'),
				'jdescription' => $this->input->post('editor1'),
				'jcategory' => $this->input->post('category'),
				'jsubcat' => $this->input->post('subcat'),
				'skill1' => $this->input->post('skill'),
				'plan' => $this->input->post('plan'),
				'currency' => $this->input->post('currency'),
				'price' => $this->input->post('price'),
				'flnym' => $post_image,
				'slug' => $slug
			);

			//post our data
			$this->db->where('jid', $this->input->post('id')); #where clause to filter out data
			return $this->db->update('jobs', $data);
		}
###############################################################################################################################################################		
											#FREELANCER MODEL FUNCTIONS
		
		//getting bids
		public function get_bids($id = FALSE, $limit = FALSE, $offset = FALSE){
			$bidder = $this->session->userdata('userid');

			if($limit){
				$this->db->limit($limit, $offset);
			}
			if($id === FALSE){ 
				$this->db->order_by('bids.bid', 'DESC');
				$this->db->JOIN('jobs', 'jobs.jid = bids.jid');
				$this->db->join( 'users', 'users.userid = bids.usrid');
				// $this->db->join( 'subcategories', 'subcategories.sbcid = jobs.jsubcat');
				$this->db->where('stat', 'active'); #where clause to filter out data
				$this->db->where('fid', $bidder); #where clause to filter out data

				$query = $this->db->get('bids');
				return $query->result_array();
			}
		}

		//getting bids in review
		public function get_reviewbids($id = FALSE, $limit = FALSE, $offset = FALSE){
			
			$bidder = $this->session->userdata('userid');

			if($limit){
				$this->db->limit($limit, $offset);
			}
			if($id === FALSE){ 
				$this->db->order_by('bids.bid', 'DESC');
				$this->db->JOIN('jobs', 'jobs.jid = bids.jid');
				$this->db->join( 'users', 'users.userid = bids.usrid');
				// $this->db->join( 'subcategories', 'subcategories.sbcid = jobs.jsubcat');
				$this->db->where('stat', 'review'); #where clause to filter out data
				$this->db->where('fid', $bidder); #where clause to filter out data

				$query = $this->db->get('bids');
				return $query->result_array();
			}
		}

		//getting pending bids
		public function get_pendingbids($id = FALSE, $limit = FALSE, $offset = FALSE){
			
			$bidder = $this->session->userdata('userid');

			if($limit){
				$this->db->limit($limit, $offset);
			}
			if($id === FALSE){ 
				$this->db->order_by('bids.bid', 'DESC');
				$this->db->JOIN('jobs', 'jobs.jid = bids.jid');
				$this->db->join( 'users', 'users.userid = bids.usrid');
				// $this->db->join( 'subcategories', 'subcategories.sbcid = jobs.jsubcat');
				$this->db->where('stat', 'Assigned'); #where clause to filter out data
				$this->db->where('fid', $bidder); #where clause to filter out data

				$query = $this->db->get('bids');
				return $query->result_array();
			}
		}

		//getting paid bids
		public function get_paidbids($id = FALSE, $limit = FALSE, $offset = FALSE){
			
			$bidder = $this->session->userdata('userid');

			if($limit){
				$this->db->limit($limit, $offset);
			}
			if($id === FALSE){ 
				$this->db->order_by('bids.bid', 'DESC');
				$this->db->JOIN('jobs', 'jobs.jid = bids.jid');
				$this->db->join( 'users', 'users.userid = bids.usrid');
				// $this->db->join( 'subcategories', 'subcategories.sbcid = jobs.jsubcat');
				$this->db->where('stat', 'paid'); #where clause to filter out data
				$this->db->where('fid', $bidder); #where clause to filter out data


				$query = $this->db->get('bids');
				return $query->result_array();
			}
		}

		// public function check_bid_exists($jobid){
		// 	$query = $this->db->get_where('bids', array('jid' => $jobid));
		// 	if(empty($query->row_array())){
		// 		return true;
		// 	} else {
		// 		return false;
		// 	}
		// }

		public function placebid($jobid){
			$jobid = $this->input->post('jobid');
			$freelancer = $this->session->userdata('userid');

			//our project data
			$data = array (
				'jid' => $this->input->post('jobid'),
				'fid' => $this->session->userdata('userid'),
				'usrid' => $this->input->post('jowna'),
			);

			// return $this->db->insert('bids', $data);

			$query = $this->db->get_where('bids', array('jid' => $jobid, 'fid' => $freelancer));
			
			$query2 = $this->db->get_where('bids', array('jid' => $jobid));

			if($query2-> num_rows() < 4){
				//post our data
				return $this->db->insert('bids', $data);
			}else{
				return false;
			}
			
			if(empty($query->row_array())){
				//post our data
				return $this->db->insert('bids', $data);
			}else {
				//post our data
				return false;
			}

		}

		public function upload_finished_project($post_image){
			$id = $this->input->post('jobid');
			$freelancer = $this->session->userdata('userid');

			//our project data
			$data = array (
				'bid' => $this->input->post('jobid'),
				'fid' =>  $this->session->userdata('userid'),
				'flynm' => $post_image,
			);
			$data2 = array(
				'stat' => 'review',
				
			);
		
			$this->db->where('jid', $id);
			$this->db->where('fid', $freelancer);
			$this->db->update('bids', $data2);

			//post our data
			return $this->db->insert('completedbids', $data);
		}
		

		#############################################STUDENT MODEL######################################
		//getting projects
		public function get_proj($id = FALSE, $limit = FALSE, $offset = FALSE){
			$student = $this->session->userdata('userid');

			if($limit){
				$this->db->limit($limit, $offset);
			}
			if($id === FALSE){ 
				$this->db->order_by('jobs.jid', 'DESC');
				// $this->db->JOIN('jobs', 'jobs.jid = bids.jid');
				$this->db->join( 'users', 'users.userid = jobs.jowna');
				// $this->db->join( 'subcategories', 'subcategories.sbcid = jobs.jsubcat');
				$this->db->where('status', 'active'); #where clause to filter out data
				$this->db->where('jowna','1'); #where clause to filter out data

				$query = $this->db->get('jobs');
				return $query->result_array();
			}
		}

		public function get_proj_review($id = FALSE, $limit = FALSE, $offset = FALSE){
			$student = $this->session->userdata('userid');

			if($limit){
				$this->db->limit($limit, $offset);
			}
			if($id === FALSE){ 
				$this->db->order_by('jobs.jid', 'DESC');
				// $this->db->JOIN('jobs', 'jobs.jid = bids.jid');
				$this->db->join( 'users', 'users.userid = jobs.jowna');
				// $this->db->join( 'subcategories', 'subcategories.sbcid = jobs.jsubcat');
				$this->db->where('status', 'review'); #where clause to filter out data
				$this->db->where('jowna', $student); #where clause to filter out data

				$query = $this->db->get('jobs');
				return $query->result_array();
			}
		}
		
		public function get_proj_paid($id = FALSE, $limit = FALSE, $offset = FALSE){
			$student = $this->session->userdata('userid');

			if($limit){
				$this->db->limit($limit, $offset);
			}
			if($id === FALSE){ 
				$this->db->order_by('jobs.jid', 'DESC');
				// $this->db->JOIN('jobs', 'jobs.jid = bids.jid');
				$this->db->join( 'users', 'users.userid = jobs.jowna');
				// $this->db->join( 'subcategories', 'subcategories.sbcid = jobs.jsubcat');
				$this->db->where('status', 'complete'); #where clause to filter out data
				$this->db->where('jowna', $student); #where clause to filter out data

				$query = $this->db->get('jobs');
				return $query->result_array();
			}
		}

	}
?>