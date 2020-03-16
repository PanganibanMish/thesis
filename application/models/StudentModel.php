<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StudentModel extends CI_Model {
	public function addStudentModel($user_id)
	{
		$this->db->trans_begin();
			$last_name = str_split($this->input->post('last_name'));
                $student_info = array(
                    'student_id' => strtoupper($last_name[0])."-".date('Ymd'),
                    'first_name' => $this->input->post('first_name'),
                    'last_name' => $this->input->post('last_name'),
                    'middle_name' => $this->input->post('middle_name'),
                    'birthday' => date_format(date_create($this->input->post('birthday')), 'Y-m-d'),
                    'contact_no' => $this->input->post('contact_no'),
                    'religion' => $this->input->post('religion'),
                    'gender' => $this->input->post('gender'),
                    'email_address  ' => $this->input->post('email_address'),
                    'home_address' => $this->input->post('home_address'),
                    'zip_code' => $this->input->post('zip_code'),
                    'nationality' => $this->input->post('nationality'),
                    'mother_tongue' => $this->input->post('mother_tongue'),
                    'parent_status' => $this->input->post('parent_status'),
                    'student_living_with' => $this->input->post('student_living_with'),
                    'other_relative' => $this->input->post('other_relative'),
                    'number_of_siblings_in_institution' => $this->input->post('number_of_siblings_in_institution'),
                    'created_by' => 1,
            );
			$this->db->insert('student_profile', $student_info);
		if($this->db->trans_status() === FALSE)
		{
		    $this->db->trans_rollback();
			return 0;
		}
		else
		{
		    $this->db->trans_commit();
		    return 1;
		}
	}
}