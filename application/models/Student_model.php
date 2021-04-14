<?php
	class Student_model extends CI_Model{
		public function __construct(){
			$this->load->database();
        }
        
#############################################STUDENT MODEL######################################
		//Dashboard
		public function get_projects_count($userid){
			$student = $this->session->userdata('userid');
			$this->db->where('jowna', $student); #where clause to filter out data
			$query = $this->db->get('jobs');
			return $query->num_rows();
		}
		public function get_projects_pending_count($userid){
			$student = $this->session->userdata('userid');
			$this->db->where('jowna', $student); #where clause to filter out data
			$this->db->where('status','Assigned'); #where clause to filter out data
			$query = $this->db->get('jobs');
			return $query->num_rows();
		}
		public function get_projects_paid_count($userid){
			$student = $this->session->userdata('userid');
			$this->db->where('jowna', $student); #where clause to filter out data
			$this->db->where('status','Paid'); #where clause to filter out data
			$query = $this->db->get('jobs');
			return $query->num_rows();
		}
		public function get_projects_review_count($userid){
			$student = $this->session->userdata('userid');
			$this->db->where('jowna', $student); #where clause to filter out data
			$this->db->where('status','Review'); #where clause to filter out data
			$query = $this->db->get('jobs');
			return $query->num_rows();
		}
		//Dashboard End

		//post new project
		public function create_post($post_image, $userid){
			$slug = url_title($this->input->post('title'));
			// $userid = $this->session->userdata('userid');

			//our project data
			$data = array (
				'jowna' => $userid,
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
			return $this->db->insert('jobs', $data);
		}		

		//getting projects
		public function get_proj($id = FALSE, $limit = FALSE, $offset = FALSE){
			$student = $this->session->userdata('userid');

			if($limit){
				$this->db->limit($limit, $offset);
			}
			if($id === FALSE){ 
				$this->db->order_by('jobs.jid', 'DESC');
				// $this->db->JOIN('completedbids', 'completedbids.bid = jobs.jid');
				$this->db->join( 'users', 'users.userid = jobs.jowna');
				// $this->db->join( 'subcategories', 'subcategories.sbcid = jobs.jsubcat');
				$this->db->where('status', 'Active'); #where clause to filter out data
				$this->db->where('jowna',$student); #where clause to filter out data

				$query = $this->db->get('jobs');
				return $query->result_array();
			}
		}
		
		//fetch all jobs
		public function get_jobs($id = FALSE, $limit = FALSE, $offset = FALSE){
			if($limit){
				$this->db->limit($limit, $offset);
			}
			if($id === FALSE){ 
				$this->db->order_by('jobs.jid', 'DESC');
				$this->db->join('categories', 'categories.cid = jobs.jcategory');
				$this->db->JOIN('completedbids', 'completedbids.bid = jobs.jid');
				$this->db->join( 'plans', 'plans.pid = jobs.plan');
				// $this->db->join( 'subcategories', 'subcategories.sbcid = jobs.jsubcat');
				$query = $this->db->get('jobs');
				return $query->result_array();
			}

			$this->db->join('categories', 'categories.cid = jobs.jcategory');
			$this->db->join( 'plans', 'plans.pid = jobs.plan');
			$this->db->JOIN('completedbids', 'completedbids.bid = jobs.jid');

			$query = $this->db->get_where('jobs', array('jid' => $id));
			return $query->row_array();
			}

		//projects assigned to freelancers (in workshop)
		public function get_proj_workshop($id = FALSE, $limit = FALSE, $offset = FALSE){
			$student = $this->session->userdata('userid');

			if($limit){
				$this->db->limit($limit, $offset);
			}
			if($id === FALSE){ 
				$this->db->order_by('jobs.jid', 'DESC');
				$this->db->join( 'users', 'users.userid = jobs.jowna');
				$this->db->join( 'subcategories', 'subcategories.sbcid = jobs.jsubcat');
				$this->db->where('status', 'Assigned'); #where clause to filter out data
				$this->db->where('jowna', $student); #where clause to filter out data

				$query = $this->db->get('jobs');
				return $query->result_array();
			}
		}
		//projects Completed by freelancers (completed)
		public function get_proj_review($id = FALSE, $limit = FALSE, $offset = FALSE){
			$student = $this->session->userdata('userid');

			if($limit){
				$this->db->limit($limit, $offset);
			}
			if($id === FALSE){ 
				$this->db->order_by('jobs.jid', 'DESC');
				$this->db->join( 'users', 'users.userid = jobs.jowna');
				$this->db->join( 'subcategories', 'subcategories.sbcid = jobs.jsubcat');
				$this->db->where('status', 'Review'); #where clause to filter out data
				$this->db->where('jowna', $student); #where clause to filter out data

				$query = $this->db->get('jobs');
				return $query->result_array();
			}
		}

		//projects paid for (Paid)
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
				$this->db->where('status', 'Paid'); #where clause to filter out data
				$this->db->where('jowna', $student); #where clause to filter out data

				$query = $this->db->get('jobs');
				return $query->result_array();
			}
		}
		//jobs completed by freelancers ready for your review
		public function get_proj_completed($id = FALSE, $limit = FALSE, $offset = FALSE){
			$student = $this->session->userdata('userid');

			if($limit){
				$this->db->limit($limit, $offset);
			}
			if($id === FALSE){ 
				$this->db->order_by('jobs.jid', 'DESC');
				// $this->db->JOIN('jobs', 'jobs.jid = bids.jid');
				$this->db->join( 'users', 'users.userid = jobs.jowna');
				// $this->db->join( 'subcategories', 'subcategories.sbcid = jobs.jsubcat');
				$this->db->where('status', 'Review'); #where clause to filter out data
				$this->db->where('jowna', $student); #where clause to filter out data

				$query = $this->db->get('jobs');
				return $query->result_array();
			}
		}

	}
?>