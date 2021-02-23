<?php 

class Student_panel extends CI_Controller
{

    public function __construct()
	{
		parent::__construct();

			

	}

    public function index(){
        $data['countTotalStudent'] = $this->model_student->countTotalStudent();
        $data['countTotalTeacher'] = $this->model_teacher->countTotalTeacher();
        $data['countTotalClasses'] = $this->model_classes->countTotalClass();
        $data['countTotalMarksheet'] = $this->model_marksheet->countTotalMarksheet();

        $data['totalIncome'] = $this->model_accounting->totalIncome();
        $data['totalExpenses'] = $this->model_accounting->totalExpenses();
        $data['totalBudget'] = $this->model_accounting->totalBudget();
        $this->load->view('templates/student/header', $data);
        $this->load->view('student_dashboard', $data);    
        $this->load->view('templates/student/footer', $data);  
    }

}?>