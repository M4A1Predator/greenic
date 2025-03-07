<?php
    function display_date($date_text){
        $date = DateTime::createFromFormat('Y-m-d H:i:s', $date_text);
        echo $date->format('d/m/Y');
    }
    
    function display_date_th($date_text){
        $date = DateTime::createFromFormat('Y-m-d H:i:s', $date_text);
        $day = $date->format('d');
        $month = $date->format('m');
        $year = $date->format('Y');
        
        // Set th years
        $year = ((int)$year) + 543;
        
        $dateString = $date->format('d/m/').$year;
        
        echo $dateString;
    }
    
    function display_datetime_th($date_text){
        $date = DateTime::createFromFormat('Y-m-d H:i:s', $date_text);
        $day = $date->format('d');
        $month = $date->format('m');
        $year = $date->format('Y');
        
        // Set th years
        $year = ((int)$year) + 543;
        
        $dateString = $date->format('d/m/').$year.' '.$date->format('H:i:s');
        
        echo $dateString;
    }
    
    function get_project_type_thai_text($project_type_id){
        
        if($project_type_id === 0 || !$project_type_id){
            return 'ทุกชนิด';
        }
        
        if($project_type_id < 1 || $project_type_id > 3){
            return '';
        }
        
        $type_arr = ['ผัก', 'ผลไม้', 'สัตว์'];
        
        return $type_arr[$project_type_id - 1];
        
    }
    
    function get_default_member_image_path(){
        $default_member_img_path = 'files/defaults/member/user.jpg';
        return $default_member_img_path;
    }
    
    function base_url_admin(){
        return base_url().'gnc_admin/';
    }
    