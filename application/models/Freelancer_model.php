<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
                        
class Freelancer_model extends CI_Model {
    //freelancer dashboard
    // fetch total bids per freelancer
    public function get_dashbids($id = FALSE, $limit = FALSE, $offset = FALSE){
        $userid = $this->session->userdata('userid');
        if($limit){
                $this->db->limit($limit, $offset);
            }
            if($id === FALSE){
                $this->db->where('fid', $userid); #where clause to filter out data
                $this->db->where('stat', 'Active'); #where clause to filter out data
                $query = $this->db->get('bids');
                return $query->num_rows();
        }
    }

    // fetch total assigned bids per freelancer
    public function get_dashbidsR($id = FALSE, $limit = FALSE, $offset = FALSE){
        $userid = $this->session->userdata('userid');
        if($limit){
                $this->db->limit($limit, $offset);
            }
            if($id === FALSE){
                $this->db->where('fid', $userid); #where clause to filter out data
                $this->db->where('stat', 'Assigned'); #where clause to filter out data
                $query = $this->db->get('bids');
                return $query->num_rows();
        }
    }    

//fetch all jobs
public function get_jobs($id = FALSE, $limit = FALSE, $offset = FALSE){
    if($limit){
        $this->db->limit($limit, $offset);
    }
    if($id === FALSE){ 
        $this->db->order_by('jobs.jid', 'DESC');
        $this->db->join('skills', 'skills.sid = jobs.skill1');
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

public function sview($id = FALSE, $limit = FALSE, $offset = FALSE){
    if($limit){
        $this->db->limit($limit, $offset);
    }
    if($id === FALSE){ 
        $this->db->join('skills', 'skills.sid = jobs.skill1');
        $this->db->join( 'plans', 'plans.pid = jobs.plan');
        // $this->db->join( 'subcategories', 'subcategories.sbcid = jobs.jsubcat');
        $this->db->where('jid', $id); #where clause to filter out data
        $query = $this->db->get('jobs');
        return $query->result_array();
    }
    $this->db->join('skills', 'skills.sid = jobs.skill1');

    $this->db->join('categories', 'categories.cid = jobs.jcategory');
    $this->db->join( 'plans', 'plans.pid = jobs.plan');
    $query = $this->db->get_where('jobs', array('jid' => $id));
    return $query->row_array();
}    

public function download($id){
    $query = $this->db->get_where('jobs',array('flnym'=>$id));
    return $query->row_array();
}
// //fetch single jobs
// public function singleview($id = NULL){
			
//     $data['sview'] = $this->post_model->get_jobs($id);

//     if(empty($data['sview'])){
//         show_404();
//     }

//     $data['sviews'] = $data['sview']['jid'];
    
//     $this->load->view('templates/header');
//     $this->load->view('templates/navbar');
//     $this->load->view('freelancer/singleproject', $data);
//     $this->load->view('templates/footer');
// }  

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
public function placebid($jobid){
    $jobid = $this->input->post('jobid');
    $freelancer = $this->session->userdata('userid');

    //our project data
    $data = array (
        'jid' => $this->input->post('jobid'),
        'fid' => $this->session->userdata('userid'),
        'usrid' => $this->input->post('jowna'),
    );      
}
		//getting projects
		public function get_proj($id = FALSE, $limit = FALSE, $offset = FALSE){
			$freelancer = $this->session->userdata('userid');

			if($limit){
				$this->db->limit($limit, $offset);
			}
			if($id === FALSE){ 
				$this->db->order_by('bids.bid', 'DESC');
				// $this->db->JOIN('completedbids', 'completedbids.bid = jobs.jid');
				$this->db->join( 'users', 'users.userid = bids.fid');
				// $this->db->join( 'subcategories', 'subcategories.sbcid = jobs.jsubcat');
				$this->db->where('stat', 'Active'); #where clause to filter out data
				$this->db->where('fid',$freelancer); #where clause to filter out data

				$query = $this->db->get('bids');
				return $query->result_array();
			}
		}
}                 
/* End of file Freelancer_model.php.php */
    
                        