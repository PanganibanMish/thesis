<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends CI_Controller {
	public function students()
	{
		if($session_data = $this->session->userdata('set_session')) 
		{
    		if(true)
            {

            }
            else
            {
                $data['user_session'] = $session_data;
            	$this->load->view('header', $data);
            	$this->load->view('student/student_list'); //loads view php files
            	$this->load->view('footer');
            }
        }
        else
        {
        	redirect('Welcome','refresh');
        }
	}

    public function addStudents()
    {
        if($session_data = $this->session->userdata('set_session')) 
        {
            if(!empty($this->input->post('submit')))
            {
                
                if($this->StudentModel->addStudentModel($session_data['user_id']) == 1)
                {
                    $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible text-center">
                                                            <h4><i class="icon fa fa-check"></i> Yey!</h4>
                                                                Student was successfully updated.          
                                                        </div>');
                }
                else
                {
                    $this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible text-center">
                                                        <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                                                        Failed in adding student.        
                                                    </div>');
                }
                redirect('Student/addStudents','refresh');
            }
            else
            {
                $data['user_session'] = $session_data;
                $this->load->view('header', $data);
                $this->load->view('student/addStudent'); //loads view php files
                $this->load->view('footer');
            }
        }
        else
        {
            redirect('Welcome','refresh');
        }
    }


}