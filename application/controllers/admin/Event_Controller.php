<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Event_Controller extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('admin/Event_Model','em');
    }

    public function events_list($page = 0)
    {
        $per_page = "10";
        if ($page != 0) {
			$page = ($page - 1) * $per_page;
        }
        $total_count = $this->em->get_events($per_page,$page,true);
        $data['pagination'] = $this->pagination('events',$total_count,$per_page);
        $data['events'] = $this->em->get_events($per_page,$page);
        $end = (($data['events'])?count($data['events']):0) + (($page) ? $page : 0);
        $start = (count($data['events']) > 0)?($page + 1):0;
        $data['result_count'] = "Showing " . $start . " - " . $end . " of " . $total_count . " Results";
        $this->load->view('admin/include/header_start');
		$this->load->view('admin/include/header_end');
		$this->load->view('admin/include/body_start');
        $this->load->view('admin/include/sidebar');
		$this->load->view('admin/event_management/event-list',$data);
		$this->load->view('admin/include/body_end');
		$this->load->view('admin/include/admin_js');
    }

    public function add_events()
    {
        $data['events'] = [];
        $data['brands_list'] = $this->em->get_data_array('tbl_brand','brand_id,brand_name');
        if($this->input->post()){
            $this->form_validation->set_rules('event_name','Event Name','required');
            $this->form_validation->set_rules('date_availibility','Date Availibility','required');
            if($this->input->post('date_availibility') == 0){
                $this->form_validation->set_rules('start_date','Start Date','required');
                $this->form_validation->set_rules('end_date','End Date','required');
            }
            if(empty($_FILES['thumbnail_image']['name'])){
                $this->form_validation->set_rules('thumbnail_image','Thumbnail','required');
            }
            $this->form_validation->set_rules('thumbnail_message','Thumbnail Message','required');
            $this->form_validation->set_rules('event_type','Event Type','required');
            $this->form_validation->set_rules('event_location','Event Location','required');
            $this->form_validation->set_rules('event_start_time','Event Start Time','required');
            $this->form_validation->set_rules('event_end_time','Event End Time','required');
            $this->form_validation->set_rules('about_event','About Event','required');
            $this->form_validation->set_rules('event_label','Event Label','required');
            $this->form_validation->set_rules('event_category[]','Event Category','required');
            $this->form_validation->set_rules('event_street','Event Street','required');
            $this->form_validation->set_rules('show_brand','Show Brand Information','required');
            if($this->input->post('show_brand') == "Yes"){
                $this->form_validation->set_rules('brand','Select Brand','required');
            }
            if($this->form_validation->run()){
                $data_array = array(
                    'event_name'            => $this->input->post('event_name'),
                    'date_available'        => $this->input->post('date_availibility'),
                    'start_date'            => $this->input->post('start_date'),
                    'end_date'              => $this->input->post('end_date'),
                    'thumbnail_message'     => $this->input->post('thumbnail_message'),
                    'event_type'            => $this->input->post('event_type'),
                    'event_location'        => $this->input->post('event_location'),
                    'event_start_time'      => $this->input->post('event_start_time'),
                    'event_end_time'        => $this->input->post('event_end_time'),
                    'event_label'           => $this->input->post('event_label'),
                    'about_event'           => $this->input->post('about_event'),
                    'event_street'          => $this->input->post('event_street'),
                    'event_category'        => implode(",",$this->input->post('event_category')),
                    'show_brand'            => $this->input->post('show_brand'),
                    'brands'                => $this->input->post('brand'),
                    'show_reg_btn'          => $this->input->post('show_reg_btn'),
                    'created_by'            => $this->em->admin_id()
                );
                
                if(!empty($_FILES['thumbnail_image']['name'])){
                    $thumbnail_image = $getfilename =  str_replace(' ', '_', $_FILES['thumbnail_image']['name']);
                    $file = pathinfo($thumbnail_image);
                    $new_name = $file['filename']."_".rand(0000,9999).".".strtolower($file['extension']);
                    $data_array['thumbnail_image'] = $new_name;
                    $config['upload_path'] = 'assets/images/admin/event';
                    $config['allowed_types'] = 'jpg|jpeg|png|gif';
                    $config['file_name'] = $new_name;
                    $this->load->library('upload',$config);
                    $this->upload->initialize($config);
                    if(!$this->upload->do_upload('thumbnail_image')){
                        echo json_encode(['message' => 'Something went wrong!.', 'error' => $this->upload->display_errors(), 'status' => 0]);
                        exit;
                    }
                }
                $save = $this->em->insert_data('tbl_event',$data_array);
                if($save){
                    echo json_encode(['message' => 'Data saved successfully.', 'status' => 1]);
                } else {
                    echo json_encode(['message' => 'Something went wrong!.','status' => 0]);
                }
            } else {
                echo json_encode(['message' => 'Something went wrong!.', 'error' => $this->form_validation->error_array(), 'status' => 0]);
            }
            exit;
        }
        $this->load->view('admin/include/header_start');
		$this->load->view('admin/include/header_end');
		$this->load->view('admin/include/body_start');
        $this->load->view('admin/include/sidebar');
		$this->load->view('admin/event_management/add-event',$data);
		$this->load->view('admin/include/body_end');
		$this->load->view('admin/include/admin_js');
    }

    public function edit_events($id){
        $data['events'] = $this->em->get_data_row('tbl_event','*',['event_id' => $id]);
        $data['brands_list'] = $this->em->get_data_array('tbl_brand','brand_id,brand_name');
        // echo "<pre>"; print_r($data); die;
        if($this->input->post()){
            $this->form_validation->set_rules('event_name','Event Name','required');
            $this->form_validation->set_rules('date_availibility','Date Availibility','required');
            if($this->input->post('date_availibility') == 0){
                $this->form_validation->set_rules('start_date','Start Date','required');
                $this->form_validation->set_rules('end_date','End Date','required');
            }
            $this->form_validation->set_rules('thumbnail_message','Thumbnail Message','required');
            $this->form_validation->set_rules('event_type','Event Type','required');
            $this->form_validation->set_rules('event_location','Event Location','required');
            $this->form_validation->set_rules('event_start_time','Event Start Time','required');
            $this->form_validation->set_rules('event_end_time','Event End Time','required');
            $this->form_validation->set_rules('about_event','About Event','required');
            $this->form_validation->set_rules('event_label','Event Label','required');
            $this->form_validation->set_rules('event_category[]','Event Category','required');
            $this->form_validation->set_rules('event_street','Event Street','required');
            $this->form_validation->set_rules('show_brand','Show Brand Information','required');
            if($this->input->post('show_brand') == "Yes"){
                $this->form_validation->set_rules('brand','Select Brand','required');
            }
            if($this->form_validation->run()){
                $data_array = array(
                    'event_name'            => $this->input->post('event_name'),
                    'date_available'        => $this->input->post('date_availibility'),
                    'start_date'            => $this->input->post('start_date'),
                    'end_date'              => $this->input->post('end_date'),
                    'thumbnail_message'     => $this->input->post('thumbnail_message'),
                    'event_type'            => $this->input->post('event_type'),
                    'event_location'        => $this->input->post('event_location'),
                    'event_start_time'      => $this->input->post('event_start_time'),
                    'event_end_time'        => $this->input->post('event_end_time'),
                    'event_label'           => $this->input->post('event_label'),
                    'about_event'           => $this->input->post('about_event'),
                    'event_street'          => $this->input->post('event_street'),
                    'event_category'        => implode(",",$this->input->post('event_category')),
                    'show_brand'            => $this->input->post('show_brand'),
                    'brands'                => $this->input->post('brand'),
                    'show_reg_btn'          => $this->input->post('show_reg_btn'),
                    'created_by'            => $this->em->admin_id()
                );
                
                if(!empty($_FILES['thumbnail_image']['name'])){
                    $thumbnail_image = $getfilename =  str_replace(' ', '_', $_FILES['thumbnail_image']['name']);
                    $file = pathinfo($thumbnail_image);
                    $new_name = $file['filename']."_".rand(0000,9999).".".strtolower($file['extension']);
                    $data_array['thumbnail_image'] = $new_name;
                    $config['upload_path'] = 'assets/images/admin/event';
                    $config['allowed_types'] = 'jpg|jpeg|png|gif';
                    $config['file_name'] = $new_name;
                    $this->load->library('upload',$config);
                    $this->upload->initialize($config);
                    if(!$this->upload->do_upload('thumbnail_image')){
                        echo json_encode(['message' => 'Something went wrong!.', 'error' => $this->upload->display_errors(), 'status' => 0]);
                        exit;
                    }
                }
                $save = $this->em->update_data('tbl_event',$data_array,['event_id' => $id]);
                if($save){
                    echo json_encode(['message' => 'Data saved successfully.', 'status' => 1]);
                } else {
                    echo json_encode(['message' => 'Something went wrong!.','status' => 0]);
                }
            } else {
                echo json_encode(['message' => 'Something went wrong!.', 'error' => $this->form_validation->error_array(), 'status' => 0]);
            }
            exit;
        }
        $this->load->view('admin/include/header_start');
		$this->load->view('admin/include/header_end');
		$this->load->view('admin/include/body_start');
        $this->load->view('admin/include/sidebar');
		$this->load->view('admin/event_management/add-event',$data);
		$this->load->view('admin/include/body_end');
		$this->load->view('admin/include/admin_js');
    }

    public function delete_event()
    {
        $event_id = $this->input->post('event_id');
        $update = $this->em->update_data('tbl_event',['status' => 2],['event_id' => $event_id]);
        if($update){
            echo json_encode(['message' => 'Data deleted successfully.', 'status' => 1]);
        } else {
            echo json_encode(['message' => 'Something went wrong!.','status' => 0]);
        }
    }

    public function change_event_status()
    {
        $event_id = $this->input->post('id');
        $stauts = $this->input->post('status');
        $update = $this->em->update_data('tbl_event',['status' => $stauts],['event_id' => $event_id]);
        if($update){
            echo json_encode(['message' => 'Status changed successfully.', 'status' => 1]);
        } else {
            echo json_encode(['message' => 'Something went wrong!.','status' => 0]);
        }
    }

    public function get_event_details()
    {
        $event_id = $this->input->post('event_id');
        $data = $this->em->get_event_details($event_id);
        echo json_encode($data);
    }
}
?>