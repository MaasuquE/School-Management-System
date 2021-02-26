<?php 

class Model_Users extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function validate_username($username = null)
	{
		if($username) {			
			// die($username);
			$sql = "SELECT * FROM users WHERE username = ?";
			$query = $this->db->query($sql, array($username));
			$result = $query->row_array();
			
			return ($query->num_rows() === 1 ? true : false);			
		}	
		else {
			return false;
		}
	} // /validate username function

	
	public function validate_current_password($password = null, $userId = null)
	{
		if($password && $userId) {			
			$password = md5($this->input->post('currentPassword'));									

			$sql = "SELECT * FROM users WHERE password = ? AND user_id = ?";
			$query = $this->db->query($sql, array($password, $userId));
			$result = $query->row_array();
			
			return ($query->num_rows() === 1 ? true : false);			
		}	
		else {
			return false;
		}
	} // /validate username function

	public function login($username = null, $password = null) 
	{
		if($username && $password) {
			$sql = "SELECT * FROM users WHERE username = ? AND password = ?";
			$query = $this->db->query($sql, array($username, $password));
			$result = $query->row_array();

			return ($query->num_rows() === 1 ? $result['user_id'] : false);
		}
		else {
			return false;
		}
	}

	public function fetchUserData($userId,$userRole) 
	{
		if($userRole=='admin'){
			$userTable = 'users';
			$id='id';
		}
		else{
			$userTable = $userRole;
			$id= $userRole.'_id';
		}
		$sql = "SELECT * FROM $userTable WHERE $id = ?";
		$query = $this->db->query($sql, array($userId));
		return $query->row_array();
	}

	// public function updateProfile($userId = null)
	// {
	// 	if($userId) {
	// 		$update_data = array(
	// 			'username' => $this->input->post('username'),
	// 			'fname' => $this->input->post('fname'),
	// 			'lname' => $this->input->post('lname'),
	// 			'email' => $this->input->post('email')
	// 		);

	// 		$this->db->where('user_id', $userId);
	// 		$status = $this->db->update('users', $update_data);
	// 		return ($status == true ? true : false);
	// 	}
	// }

	public function changePassword($userId = null)
	{
		if($userId) {
			$password = md5($this->input->post('newPassword'));
			$update_data = array(
				'password' => $password
			);

			$this->db->where('user_id', $userId);
			$status = $this->db->update('users', $update_data);
			return ($status == true ? true : false);
		}
	}

	public function student_login($student_id,$password){
		$this->db->where('student_id',$student_id);
		$this->db->where('password',$password);
		$query = $this->db->get('student');
		if($query->num_rows() > 0){
			return true;
		}
		else{
			return false;
		}

	}

	public function teacher_login($teacher_id,$password){
		$this->db->where('teacher_id',$teacher_id);
		$this->db->where('password',$password);
		$query =$this->db->get('teacher');
		if($query->num_rows() > 0){
			return true;
		}
		else{
			return false;
		}

	}

		public function insert_notice($data){

			return $this->db->insert('notice',$data);
		}

		public function display_notice($id=null){
			if($id){
				$this->db->where('id',$id);
				$this->db->join('teacher','notice.creator_id=teacher.teacher_id','LEFT');
				return $this->db->get('notice');
			}
			$this->db->join('teacher','notice.creator_id=teacher.teacher_id','LEFT');
			return $this->db->get('notice');
		}

		public function updateProfile($userId = null)
	{
		if($userId) {
			$update_data = array(
				'username' => $this->input->post('username'),
				'fname' => $this->input->post('fname'),
				'lname' => $this->input->post('lname'),
				'email' => $this->input->post('email')
			);

			$this->db->where('user_id', $userId);
			$status = $this->db->update('users', $update_data);
			return ($status == true ? true : false);
		}
	}
	public function updateProfileTeacher($teacherId = null)
	{
		if($teacherId) {
			$update_data = array(
				
				'fname' => $this->input->post('fname'),
				'lname' => $this->input->post('lname'),
				'email' => $this->input->post('email')
			);

			$this->db->where('teacher_id', $teacherId);
			$status = $this->db->update('teacher', $update_data);
			return ($status == true ? true : false);
		}
	}
	public function updateProfileStudent($studentId = null)
	{
		if($studentId) {
			$update_data = array(
				
				'fname' => $this->input->post('fname'),
				'lname' => $this->input->post('lname'),
				'email' => $this->input->post('email')
			);

			$this->db->where('student_id', $studentId);
			$status = $this->db->update('student', $update_data);
			return ($status == true ? true : false);
		}
	}
}?>