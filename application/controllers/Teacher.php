<?php 

class Teacher extends MY_Controller 
{
	public function __construct()
	{
		parent::__construct();

		$this->isNotLoggedIn();

		// loading the teacher model
		$this->load->model('model_teacher');

		// loading the form validation library
		$this->load->library('form_validation');		
	}

	/*
	*------------------------------------
	* inserts the teachers information
	* into the database 
	*------------------------------------
	*/
	public function create()
	{
		$validator = array('success' => false, 'messages' => array());

		$validate_data = array(
			array(
				'field' => 'fname',
				'label' => 'First Name',
				'rules' => 'required'
			),
			array(
				'field' => 'age',
				'label' => 'Age',
				'rules' => 'required'
			),			
			array(
				'field' => 'contact',
				'label' => 'Contact',
				'rules' => 'required'
			),
			array(
				'field' => 'email',
				'label' => 'Email',
				'rules' => 'required'
			),
			array(
				'field' => 'registerDate',
				'label' => 'Register Date',
				'rules' => 'required'
			),
			array(
				'field' => 'jobType',
				'label' => 'Job Type',
				'rules' => 'required'
			),
			array(
				'field' => 'password',
				'label' => 'password',
				'rules' => 'required'
			)
		);

		$this->form_validation->set_rules($validate_data);
		$this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');

		if($this->form_validation->run() === true) {				
			$imgUrl = $this->uploadImage();
			$create = $this->model_teacher->create($imgUrl);					
			if($create == true) {
				$validator['success'] = true;
				$validator['messages'] = "Successfully added";
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
		}
		redirect('teacher');
	}

	/*
	*------------------------------------
	* returns the uploaded image url 
	*------------------------------------
	*/
	public function uploadImage() 
	{
		$config['upload_path'] = './assets/images/';
		$config['allowed_types'] = 'jpg|png|jpeg';
		$config['max_size']     =2024;
		$config['max_width']            = 1024;
		$config['max_height']           = 768;

		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		$this->upload->overwrite = true;
		if ($this->upload->do_upload('photo')){
			$data = $this->upload->data();
			$url = 'assets/images/'.$data['file_name'];
			return $url;
		}
		else{
			return false;
		}
	}

	/*
	*------------------------------------
	* retrieves teacher information 
	*------------------------------------
	*/
	public function fetchTeacherData($teacherId = null)
	{
		if($teacherId) {
			$result = $this->model_teacher->fetchTeacherData($teacherId);	
			
		}		

		echo json_encode($result);
	}


	/*
	*------------------------------------
	* updates teacher information
	*------------------------------------
	*/
	public function updateInfo($teacherId = null)
	{
		if($teacherId) {
			$validator = array('success' => false, 'messages' => array());

			$validate_data = array(
				array(
					'field' => 'editFname',
					'label' => 'First Name',
					'rules' => 'required'
				),
				array(
					'field' => 'editAge',
					'label' => 'Age',
					'rules' => 'required'
				),			
				array(
					'field' => 'editContact',
					'label' => 'Contact',
					'rules' => 'required'
				),
				array(
					'field' => 'editEmail',
					'label' => 'Email',
					'rules' => 'required'
				),
				array(
					'field' => 'editRegisterDate',
					'label' => 'Register Date',
					'rules' => 'required'
				),
				array(
					'field' => 'editJobType',
					'label' => 'Job Type',
					'rules' => 'required'
				)
			);

			$this->form_validation->set_rules($validate_data);
			$this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');

			if($this->form_validation->run() === true) {							
				$updateInfo = $this->model_teacher->updateInfo($teacherId);					
				if($updateInfo == true) {
					$validator['success'] = true;
					$validator['messages'] = "Successfully added";
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
	}

	/*
	*------------------------------------
	* updates teacher photo information
	*------------------------------------
	*/
	public function updatePhoto($teacherId = null)
	{
		if($teacherId) {
			$validator = array('success' => false, 'messages' => array());

			if(empty($_FILES['editPhoto']['tmp_name'])) {
				$validator['success'] = false;	
				$validator['messages'] = "The Photo Field is required";
			} 
			else {
				$imgUrl = $this->editUploadImage();
				$update = $this->model_teacher->updatePhoto($teacherId, $imgUrl);					

				if($update == true) {
					$validator['success'] = true;	
					$validator['messages'] = "Successfully Updated";	
				}
				else {
					$validator['success'] = false;
					$validator['messages'] = "Error while inserting the information into the database";
				}					
			} // /else
			echo json_encode($validator);
		} // /if
	}

	/*
	*------------------------------------
	* returns the edited image url 
	*------------------------------------
	*/
	public function editUploadImage() 
	{
		$config['upload_path'] = './assets/images/';
		$config['allowed_types'] = 'jpg|png|jpeg';
		$config['max_size']     =2024;
		$config['max_width']            = 1024;
		$config['max_height']           = 768;

		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		$this->upload->overwrite = true;
		if ($this->upload->do_upload('editPhoto')){
			$data = $this->upload->data();
			$url = 'assets/images/'.$data['file_name'];
			return $url;
		}
		else{
			return false;
		}
	}


	/*
	*------------------------------------
	* removes teacher information 
	*------------------------------------
	*/
	public function remove($teacherId = null)
	{
		$validator = array('success' => false, 'messages' => array());

		if($teacherId) {
			$remove = $this->model_teacher->remove($teacherId);
			if($remove) {
				$validator['success'] = true;
				$validator['messages'] = "Successfully Removed";
			} 
			else {
				$validator['success'] = false;
				$validator['messages'] = "Error while removing the information";	
			} // /else
		} // /if

		echo json_encode($validator);		
	}



}