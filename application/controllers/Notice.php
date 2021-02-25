<?php 

class Notice extends MY_Controller
{

    public function create(){
        $data['title'] = $this->input->post('notice_title');
        $data['description'] = $this->input->post('notice_desc');
        $data['creator_id'] = $this->session->id;
        $data['creator_role'] = $this->session->role;

        $q = $this->model_users->insert_notice($data);
        if($q){
            redirect(base_url('notice'));
        }
    }
    public function delete_notice($id){
        $this->db->where('id',$id);
        $q = $this->db->delete('notice');
        if($q){
            redirect(base_url('notice'));
        }
        else{
            echo 'Have some problem';
        }
    }

}?>