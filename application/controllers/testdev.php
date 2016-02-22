<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Testdev extends CI_Controller {

	public function  __construct() {
        parent::__construct();
		$this->load->model("testdev_model");
    }
    
	public function schools(){
		$data['listener'] = base_url().'testdev/schools_listener';
		$data['contents'] = $this->load->view('testdev/schools', $data, TRUE);
		$this->load->view('template', $data);
	}
	
	function schools_listener() {
		// variable initialization
		$start = 10;		$search = "";

		$rows = 0;
		$where = array();
		
		// get search value (if any)
		if ($this->input->post('sSearch') != "" ) 
		{
			$where["LOWER(name) LIKE "] = "'%".strtolower($this->input->post('sSearch'))."%'";
		}
		
		// limit
		$rows = $this->voxteneotestdev_lib->get_start($this->input->post('iDisplayStart'));
		$start = $this->voxteneotestdev_lib->get_rows($this->input->post('iDisplayLength'));

		// sort
		$sort_dir = $this->voxteneotestdev_lib->get_sort_dir($this->input->post('sSortDir_0'));

		// run query to get user listing
		$cols = array("name", "address", "maximum_students_allowed", "courses_yearly_fee", "school_id");
		$sumcols = 5;
		$dataListener = $this->testdev_model->DataListener('school',$start, $rows, $where, $this->voxteneotestdev_lib->get_sort($this->input->post('iSortCol_0'),$cols,$sumcols), $sort_dir);
		$iFilteredTotal = $dataListener->num_rows();

		$iTotal = $this->testdev_model->RowData('school',$where)->num_rows();

			/*
			 * Output
			 */
			 $output = array(
				 "sEcho" => intval($this->input->post('sEcho')),
				 "iTotalRecords" => $iFilteredTotal,
				 "iTotalDisplayRecords" => $iTotal,
				 "aaData" => array()
			 );

			// get result after running query and put it in array
			foreach ($dataListener->result_array() as $row) {
			$record = array();

			$record[] = $row['name'];
			$record[] = $row['address'];
			$record[] = $row['maximum_students_allowed'];
			$record[] = $row['courses_yearly_fee'];
			$record[] = '<a class="btn btn-info" href="'.base_url().'school/'.$row['school_id'].'" > 
								Detail
						</a>';

			$output['aaData'][] = $record;
		}
		// format it to JSON, this output will be displayed in datatable
		echo json_encode($output);
	}
	
    public function schools_detail($id){
		$data['listener'] = base_url().'testdev/students_listener/'.$id;
		$data['schools'] = $this->testdev_model->getDetailData('school',array('school_id' => $id))->row_array();
		$data['contents'] = $this->load->view('testdev/schools_detail', $data, TRUE);
		$this->load->view('template', $data);
	}
	
	function students_listener($id) {
		// variable initialization
		$search = "";
		$start = 10;
		$rows = 0;
		$where = array();
		
		// get search value (if any)
		if ($this->input->post('sSearch') != "" ) 
		{
			$where['"LOWER(first_name) LIKE "'] = "'%".strtolower($this->input->post('sSearch'))."%'";
			$where['"LOWER(last_name) LIKE "'] = "'%".strtolower($this->input->post('sSearch'))."%'";
		}
		$where['school_id'] = $id;
		
		// limit
		$rows = $this->voxteneotestdev_lib->get_start($this->input->post('iDisplayStart'));
		$start = $this->voxteneotestdev_lib->get_rows($this->input->post('iDisplayLength'));

		// sort
		$sort_dir = $this->voxteneotestdev_lib->get_sort_dir($this->input->post('sSortDir_0'));

		// run query to get user listing
		$cols = array("first_name", "last_name", "birthdate", "student_id");
		$sumcols = 5;
		$dataListener = $this->testdev_model->DataListener('student',$start, $rows, $where, $this->voxteneotestdev_lib->get_sort($this->input->post('iSortCol_0'),$cols,$sumcols), $sort_dir);
		$iFilteredTotal = $dataListener->num_rows();

		$iTotal = $this->testdev_model->RowData('student',$where)->num_rows();

			/*
			 * Output
			 */
			 $output = array(
				 "sEcho" => intval($this->input->post('sEcho')),
				 "iTotalRecords" => $iFilteredTotal,
				 "iTotalDisplayRecords" => $iTotal,
				 "aaData" => array()
			 );

			// get result after running query and put it in array
			foreach ($dataListener->result_array() as $row) {
			$record = array();

			$record[] = $row['first_name'];
			$record[] = $row['last_name'];
			$record[] = $row['birthdate'];
			$record[] = '<a class="btn btn-info" href="'.base_url().'student/edit/'.$row['student_id'].'" > 
								Edit
						</a>';

			$output['aaData'][] = $record;
		}
		// format it to JSON, this output will be displayed in datatable
		echo json_encode($output);
	}
	
    public function schools_addedit($id=0){
		$data['id'] = $id;
		$data['act'] = base_url().'testdev/schools_addedit_act';
		$data['schools'] = $this->testdev_model->getDetailData('school',array('school_id' => $id))->row_array();
		$data['contents'] = $this->load->view('testdev/schools_addedit', $data, TRUE);
		$this->load->view('template', $data);
	}
	
    public function schools_addedit_act(){
		
		$this->form_validation->set_rules('name', 'School Name', 'required|xss_clean');
		$this->form_validation->set_rules('address', 'School Address', 'required|xss_clean');
		$this->form_validation->set_rules('maximum_students_allowed', 'Maximum Students Allowed', 'required|xss_clean');
		$this->form_validation->set_rules('courses_yearly_fee', 'Courses Yearly Fee', 'required|xss_clean');

        if ($this->form_validation->run() == true) {

            $school_id = $this->input->post("school_id");
            $fields["name"] = $this->input->post("name");
            $fields["address"] = $this->input->post("address");
            $fields["maximum_students_allowed"] = $this->input->post("maximum_students_allowed");
            $fields["courses_yearly_fee"] = $this->input->post("courses_yearly_fee");
            if($school_id > 0){
				$exec = $this->testdev_model->updateData('school',$fields,array('school_id' => $school_id));
				$this->session->set_flashdata('success', 'New Data Successfully Updated');
            } else {
				$exec = $this->testdev_model->insertData('school',$fields);
				$this->session->set_flashdata('success', 'New Data Successfully Added');
			}
			redirect('schools');
        } else {
			$this->session->set_flashdata('error', 'Something Error!');
        }
	}
	
    public function student_addedit($id){
		$data['id'] = $id;
		$data['schools'] = $this->testdev_model->getAllData('school');
		$data['act'] = base_url().'testdev/student_addedit_act';
		$data['student'] = $this->testdev_model->getDetailData('student',array('student_id' => $id))->row_array();
		$data['contents'] = $this->load->view('testdev/student_addedit', $data, TRUE);
		$this->load->view('template', $data);
	}
	
	public function student_addedit_act(){
		
		$this->form_validation->set_rules('first_name', 'First Name', 'required|xss_clean');
		$this->form_validation->set_rules('last_name', 'Last Name', 'required|xss_clean');
		$this->form_validation->set_rules('birthdate', 'Birth Date', 'required|xss_clean');
		//$this->form_validation->set_rules('picture', 'Picture', 'required|xss_clean');

        if ($this->form_validation->run() == true) {
			$config['upload_path'] = './assets/pictures/';
			$config['allowed_types'] = 'jpg|png|gif';
			$config['max_size'] = '100000';
			$config['overwrite'] = TRUE;
			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('picture')) {
				$picture = '';
				$url_picture = '';
			} else {
				$files = array('upload_data' => $this->upload->data());
				$picture = $files['upload_data']['full_path'];
				$url_picture = base_url().'assets/pictures/'.$files['upload_data']['file_name'];
			}
			
            $student_id = $this->input->post("student_id");
            $fields["school_id"] = $this->input->post("school_id");
            $fields["first_name"] = $this->input->post("first_name");
            $fields["last_name"] = $this->input->post("last_name");
            $fields["birthdate"] = $this->input->post("birthdate");
            $fields["picture"] = $url_picture;
			
            if($fields["student_id"] > 0){
				$exec = $this->testdev_model->updateData('student',$fields,array('student_id' => $student_id));
				$this->session->set_flashdata('success', 'New Data Successfully Updated');
            } else {
				$exec = $this->testdev_model->insertData('student',$fields);
				$this->session->set_flashdata('success', 'New Data Successfully Added');
			}
			redirect('schools');
        } else {
			$this->session->set_flashdata('error', 'Something Error!');
        }
	}
	
    public function student_api($id){
		$response = array(
		  'content' => $this->testdev_model->getDetailData('student',array('student_id' => $id))->result()
		);

		$this->output
		  ->set_status_header(200)
		  ->set_content_type('application/json', 'utf-8')
		  ->set_output(json_encode($response))
		  ->_display();
		  exit;
	}
}
