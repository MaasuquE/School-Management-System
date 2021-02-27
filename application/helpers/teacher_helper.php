<?php 
function getTeacherData($teacherId){
    $CI = get_instance();

    // You may need to load the model if it hasn't been pre-loaded
    $CI->load->model('model_teacher');
    //call
    $teacherData = $CI->model_teacher->fetchTeacherData($teacherId);

    return $teacherData;

   

}

?>