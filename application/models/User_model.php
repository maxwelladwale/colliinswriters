<?php
	class User_model extends CI_Model{
		public function register($enc_password){
			// User data array
			$data = array(
                'fname' => $this->input->post('fname'),
                'sname' => $this->input->post('sname'),
				'usremail' => $this->input->post('email'),
				'usrtype' => $this->input->post('user_type'),
				'usremail' => $this->input->post('email'),
                'login' => $enc_password,
			);

			// Insert user
			return $this->db->insert('users', $data);
		}

		// Log user in
		public function login($username, $password){
			// Validate
			$this->db->where('usremail', $username);
			$this->db->where('login', $password);

			$result = $this->db->get('users');
			// return $result;
			if($result->num_rows() == 1){
			return $result;
		} else {
				return false;
			}
		}

		// Check username exists
		public function check_username_exists($username){
			$query = $this->db->get_where('users', array('usremail' => $username));
			if(empty($query->row_array())){
				return true;
			} else {
				return false;
			}
		}

		// Check email exists
		public function check_email_exists($email){
			$query = $this->db->get_where('users', array('usremail' => $email));
			if(empty($query->row_array())){
				return true;
			} else {
				return false;
			}
		}

		public function get_usertype($slug = FALSE, $limit = FALSE, $offset = FALSE){

				$this->db->order_by('user_type.id', 'DESC');
				$query = $this->db->get('user_type');
				return $query->result_array();
		}
	}