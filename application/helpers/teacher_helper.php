<?php 
function getTeacherData($teacherId){
    $CI = get_instance();

    // You may need to load the model if it hasn't been pre-loaded
    $CI->load->model('model_teacher');
    //call
    $teacherData = $CI->model_teacher->fetchTeacherData($teacherId);

    return $teacherData;

   
    
}

function getClassData($classId){
    $CI = get_instance();
    $CI->load->model('model_classes');

    $teacherData = $CI->model_classes->fetchClassData($classId);

    return $teacherData;
    
}
function getSectionData($sectionId){
    $CI = get_instance();
    $CI->load->model('model_section');

    $sectionData = $CI->model_section->fetchSectionById($sectionId);
    return $sectionData;
}



?>