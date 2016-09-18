<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    // On start
    
    class Project extends MY_Model{
        
        public $table = 'project';
        public $view = 'project_view';
        
        function __construct(){
            parent::__construct();
        }
        
        function get_project_by_id($project_id, $result_type='object', $use_view=FALSE){
            // Get project
            $where_assoc = array();
            $where_assoc['project_id'] = $project_id;
            
            // Get project data from view
            $project_arr = $this->Project->get_filter('*', $where_assoc, null, null, null, null, 'object', array('use_view' => $use_view));
            if(count($project_arr) !== 1){
                return NULL;
            }
            return $project_arr[0];
            
        }
        
        function add_project($data_assoc){
            /*
             *  Add project to DB
             *
             *  @param  assoc   project data assoc
             *  
             */
            
            // Get status
            // Add normal status 1 as default
            $data_assoc['project_status_id'] = 1;
            
            // Check data
            //echo var_dump($data_assoc);
            
            // Add project
            $add_result = $this->add($data_assoc);
            
            // Check add result
            if($add_result == FALSE){
                return NULL;
            }
            
            return $this->db->insert_id();
        }
        
        
        function get_project_by_category($filter_assoc, $result_type='object'){
            /*
             *  Get projects by category id
             *
             */
            
            // Get data
            $category_id = $filter_assoc['category_id'];
            $order_by = $filter_assoc['order_by'];
            $offset = $filter_assoc['offset'];
            $limit = $filter_assoc['limit'];
            
            // Build query
            $this->db->select('*');
            $this->db->from($this->view);
            $this->db->where('category_id', $category_id);
            //$this->db->or_where('category_master_id', $category_id);
            $this->db->order_by($order_by);
            $this->db->offset($offset);
            $this->db->limit($limit);
            $query = $this->db->get();
            
            $result = $this->get_result($query, $result_type);
            
            // Build query
            $this->db->select('*');
            $this->db->from($this->view);
            $this->db->where('category_id', $category_id);
            $this->db->or_where('category_master_id', $category_id);
            $this->db->order_by($order_by);
            //$this->db->offset($offset);
            //$this->db->limit($limit);
            $count = $this->db->count_all_results();
            
            // Set return data
            $data['result'] = $result;
            $data['count'] = $count;
            return $data;
            
        }
    
        function get_search_projects($keyword, $filter_assoc, $result_type='object'){
            
            $offset = $filter_assoc['offset'];
            $limit = $filter_assoc['limit'];
            $order_by = $filter_assoc['order_by'];
            
            // Build query
            $this->db->select('*');
            $this->db->from($this->view);
            if(isset($filter_assoc['farm_province'])){
                $this->db->where('farm_province', $filter_assoc['farm_province']);
            }
            if(isset($filter_assoc['farm_district'])){
                $this->db->where('farm_district', $filter_assoc['farm_district']);
            }
            $this->db->group_start();
            $this->db->where('project_name like', '%'.$keyword.'%');
            $this->db->or_where('category_name like', '%'.$keyword.'%');
            $this->db->or_where('breed_name like', '%'.$keyword.'%');
            $this->db->or_where('member_firstname like', '%'.$keyword.'%');
            $this->db->or_where('member_lastname like', '%'.$keyword.'%');
            $this->db->or_where('farm_name like', '%'.$keyword.'%');
            $this->db->or_where('farm_province like', '%'.$keyword.'%');
            $this->db->group_end();
            $this->db->where('project_status_id', $this->Status->status_normal_id);
            $this->db->order_by($order_by);
            
            // Limit amount
            $this->db->offset($offset);
            $this->db->limit($limit);
            $query = $this->db->get();
            
            $result = $this->get_result($query, $result_type);
            //echo $this->db->last_query();
            
            // Count
            $this->db->select('*');
            $this->db->from($this->view);
            if(isset($filter_assoc['farm_province'])){
                $this->db->where('farm_province', $filter_assoc['farm_province']);
            }
            if(isset($filter_assoc['farm_district'])){
                $this->db->where('farm_district', $filter_assoc['farm_district']);
            }
            $this->db->group_start();
            $this->db->where('project_name like', '%'.$keyword.'%');
            $this->db->or_where('category_name like', '%'.$keyword.'%');
            $this->db->or_where('breed_name like', '%'.$keyword.'%');
            $this->db->or_where('member_firstname like', '%'.$keyword.'%');
            $this->db->or_where('member_lastname like', '%'.$keyword.'%');
            $this->db->or_where('farm_name like', '%'.$keyword.'%');
            $this->db->or_where('farm_province like', '%'.$keyword.'%');
            $this->db->group_end();
            $this->db->where('project_status_id', $this->Status->status_normal_id);
            $this->db->order_by($order_by);
            
            $count = $this->db->count_all_results();
            
            // Set data
            $data['result'] = $result;
            $data['count'] = $count;
            
            return $data;
        }
    }