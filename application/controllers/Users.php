<?php 

class Users extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();

		// loading the users model
		$this->load->model('model_users');

		// loading the form validation library
		$this->load->library('form_validation');	
			$data['countTotalStudent'] = $this->model_student->countTotalStudent();
            $data['countTotalTeacher'] = $this->model_teacher->countTotalTeacher();
            $data['countTotalClasses'] = $this->model_classes->countTotalClass();
            $data['countTotalMarksheet'] = $this->model_marksheet->countTotalMarksheet();

            $data['totalIncome'] = $this->model_accounting->totalIncome();
            $data['totalExpenses'] = $this->model_accounting->totalExpenses();
            $data['totalBudget'] = $this->model_accounting->totalBudget();

	}

	public function login($user)
	{
		$data['auth_type']=$user;
		if($user=='admin'){
			$validator = array('success' => false, 'messages' => array());

			$validate_data = array(
				array(
					'field' => 'username',
					'label' => 'Username',
					'rules' => 'required|callback_validate_username'
				),
				array(
					'field' => 'password',
					'label' => 'Password',
					'rules' => 'required'
				)
			);

			$this->form_validation->set_rules($validate_data);

			if($this->form_validation->run() === true) {			
				$username = $this->input->post('username');
				$password = md5($this->input->post('password'));

				$login = $this->model_users->login($username, $password);

				if($login) {
					$this->load->library('session');

					$user_data = array(
						'id' => $login,
						'role'=> $user,
						'logged_in' => true
					);

					$this->session->set_userdata($user_data);

					$validator['success'] = true;
					$validator['messages'] = "index.php/dashboard";		
					redirect('dashboard');		
				}	
				else {
					$validator['success'] = false;
					$data['messages'] = "Incorrect username/password combination";
				} // /else

			} 	
			else {
				$validator['success'] = false;
				foreach ($_POST as $key => $value) {
					$validator['messages'][$key] = form_error($key);
				}			
			} // /else
			$this->load->view('login',$data);
		}

		if($user=='student'){
			$validator = array('success' => false, 'messages' => array());

			$this->form_validation->set_rules('student_id', 'student_id', 'trim|required');
			$this->form_validation->set_rules('email', 'email', 'trim|required');

			if($this->form_validation->run() === true) {			
				$student_id = $this->input->post('student_id');
				$email = $this->input->post('email');
				$student_login = $this->model_users->student_login($student_id,$email);
				if($student_login) {
					$this->load->library('session');

					$user_data = array(
						'id' => $student_login,
						'role'=> $user,
						'logged_in' => true
					);

					$this->session->set_userdata($user_data);

					$validator['success'] = true;
					$validator['messages'] = "index.php/dashboard";		
					redirect('dashboard');		
				}	
				else {
					$validator['success'] = false;
					$data['messages'] = "Incorrect Student id/Email combination";
				} // /else

			} 	
			else {
				$validator['success'] = false;
				foreach ($_POST as $key => $value) {
					$validator['messages'][$key] = form_error($key);
				}			
			} // /else
			$this->load->view('login',$data);
		}

		if($user=='teacher'){
			$validator = array('success' => false, 'messages' => array());

			$this->form_validation->set_rules('teacher_id', 'teacher_id', 'trim|required');
			$this->form_validation->set_rules('email', 'email', 'trim|required');

			if($this->form_validation->run() === true) {			
				$teacher_id = $this->input->post('teacher_id');
				$email = $this->input->post('email');
				$teacher_login = $this->model_users->teacher_login($teacher_id,$email);
				if($teacher_login) {
					$this->load->library('session');

					$user_data = array(
						'id' => $teacher_id,
						'role'=> $user,
						'logged_in' => true
					);

					$this->session->set_userdata($user_data);

					$validator['success'] = true;
					$validator['messages'] = "index.php/dashboard";		
					redirect('dashboard');		
				}	
				else {
					$validator['success'] = false;
					$data['messages'] = "Incorrect teacher id/Email combination";
				} // /else

			} 	
			else {
				$validator['success'] = false;
				foreach ($_POST as $key => $value) {
					$validator['messages'][$key] = form_error($key);
				}			
			} // /else
			$this->load->view('login',$data);
		}
		
	} // /lgoin function

	public function validate_username()
	{
		$validate = $this->model_users->validate_username($this->input->post('username'));

		if($validate === true) {
			return true;
		} 
		else {
			$this->form_validation->set_message('validate_username', 'The {field} does not exists');
			return false;			
		} // /else
	} // /validate username function

	public function logout()
	{
		$this->load->library('session');
		$this->session->sess_destroy();
		redirect('login', 'refresh');
	}


	public function updateProfile()
	{
		$this->load->library('session');
		$userId = $this->session->userdata('id');

		$validator = array('success' => false, 'messages' => array());

		$validate_data = array(
			array(
				'field' => 'username',
				'label' => 'Username',
				'rules' => 'required'
			),
			array(
				'field' => 'fname',
				'label' => 'First Name',
				'rules' => 'required'
			)
		);

		$this->form_validation->set_rules($validate_data);
		$this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');

		if($this->form_validation->run() === true) {	
			$update = $this->model_users->updateProfile($userId);					
			if($update === true) {
				$validator['success'] = true;
				$validator['messages'] = "Successfully Update";
			}
			else {
				$validator['success'] = false;
				$validator['messages'] = "Error while inserting the information into the database";
			}			
		} 	
		else {
			$validator['success'] = false;
			foreach ($_POST as $key => $value) {
				$validator['messages'][$key] = form_error($key);
			}			
		} // /else

		echo json_encode($validator);
	}

	public function changePassword()
	{
		$this->load->library('session');
		$userId = $this->session->userdata('id');

		$validator = array('success' => false, 'messages' => array());

		$validate_data = array(
			array(
				'field' => 'currentPassword',
				'label' => 'Current Password',
				'rules' => 'required|callback_validate_current_password'
			),
			array(
				'field' => 'newPassword',
				'label' => 'Password',
				'rules' => 'required|matches[confirmPassword]'
			),
			array(
				'field' => 'confirmPassword',
				'label' => 'Confirm Password',
				'rules' => 'required'
			)
		);

		$this->form_validation->set_rules($validate_data);
		$this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');		

		if($this->form_validation->run() === true) {	
			$update = $this->model_users->changePassword($userId);					
			if($update === true) {
				$validator['success'] = true;
				$validator['messages'] = "Successfully Update";
			}
			else {
				$validator['success'] = false;
				$validator['messages'] = "Error while inserting the information into the database";
			}			
		} 	
		else {
			$validator['success'] = false;
			foreach ($_POST as $key => $value) {
				$validator['messages'][$key] = form_error($key);
			}			
		} // /else

		echo json_encode($validator);
	}

	public function validate_current_password()
	{
		$this->load->library('session');
		$userId = $this->session->userdata('id');
		$validate = $this->model_users->validate_current_password($this->input->post('currentPassword'), $userId);

		if($validate === true) {
			return true;
		} 
		else {
			$this->form_validation->set_message('validate_current_password', 'The {field} is incorrect');
			return false;			
		} // /else	
	}
	public function register($user){
		if($user=='student'){
			$data['user'] = $user;
			$this->load->view('register',$data);
		}
		elseif($user=='teacher'){
			$data['user'] = $user;
			$this->load->view('register',$data);
		}
		else{
			redirect(base_url());
		}

		
	}


	

}