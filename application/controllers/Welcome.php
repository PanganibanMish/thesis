<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{

        $this->load->library('form_validation');

		if($session_data = $this->session->userdata('set_session'))
		{
			redirect('Welcome/home','refresh');
		}
		else
		{
			$this->load->view('login');
		}
	}
	public function login()
	{
		if($session_data = $this->session->userdata('set_session'))
		{
			redirect('Welcome/home','refresh'); //nag reredirect paduman sa welcome/home page
		}
		else
		{
			$data = $this->User->login_model(); //ini ang nag aapod ning function sa model tapos tglalaag nya si value sa $data
			if (sizeof($data) > 0) //tgchecheck nya kung pira ang row na nakua sa database or kung pira ang size kang data.
			{
				$session_array = array(); //declaration lang ni ning array
				foreach ($data as $row) //for loop kang data per row. Tapos si $row siya ang nag popoint kang kada column sa database. Example user_id column.
				{
					$session_array = array(
											'user_id' 		=> $row->user_id, //'user_id' => gibo mo lang yan. Declaration. Dawa ano yan. // $row->user_id, pointer siya. Tgpopoint niya tong column sa database
											'fullname'	=> $row->first_name." ".$row->last_name,
											'user_type'		=> $row->user_type
										);
					$session_data = $this->session->set_userdata('set_session', $session_array); //$session_array tglalaag mo na sa session.
					//Ang session siya tong nagsisave ning data sa browser
					//$session_data - declaration na laganan kang session
					if ($row->login_first == 1) {
						redirect('Welcome/changepassword', 'refresh');
					}
					else
					{
						redirect('Welcome/home', 'refresh');
					}
				}
			}
			else
			{
				redirect('Welcome', 'refresh');
			}
		}

	}
	public function changepassword()
	{
		if($session_data = $this->session->userdata('set_session')) //check if nakalog in na or may nakasave na ning session sa browser. 
		{
			$this->load->view('changepassword'); //load view
		}
		else
        {
        	redirect('Welcome','refresh'); //kung mayong session, mabalik siya sa login
        }
	}
	public function processchangepassword() //process kang pag change password
	{
		if($session_data = $this->session->userdata('set_session'))
		{
			$new_password = $this->input->post('new_password'); //pang kua ning input data sa view
			$confirm_password = $this->input->post('confirm_password');
			$user_id = $session_data['user_id']; //get user_id from session
			if($new_password == $confirm_password)
			{
				$data = $this->User->processchangepassword_model($user_id, $new_password);//maduman ka sa model na user tapos hahanapon mo si function na processchangepassword_model($user_id, $new_password)
				redirect('Welcome/home','refresh'); //redirect sa home
			}
			else
			{
				$this->session->set_flashdata('message', 'Password does not match'); //pag ma flash ning message sa view
				redirect('Welcome/changepassword','refresh');
			}
		}
		else
		{
			redirect('Welcome','refresh');
		}
				//redirect('Welcome/changepassword','refresh');
	}

	public function home()
	{
		if($session_data = $this->session->userdata('set_session')) 
		{
			$data['user_session'] = $session_data;
        	$this->load->view('header', $data);
        	$this->load->view('home'); //loads view php files
        	$this->load->view('footer');
        }
        else
        {
        	redirect('Welcome','refresh');
        }
	}

	//Faculty
	public function Faculty()
	{
		if($session_data = $this->session->userdata('set_session')) 
		{
			$data['user_session'] = $session_data;
			$data['getUser'] = $this->User->get_user_list(); //hali sa model function na kinukua nya si userlist. Read ni.
        	$this->load->view('header', $data); //nagviview ning data (userlist, session data) paduman view.
        	$this->load->view('administration/faculty'); //loads view php files
        	$this->load->view('footer');
        }
        else
        {
        	redirect('Welcome','refresh');
        }
	}
	public function UpdateFaculty()
	{
		if($session_data = $this->session->userdata('set_session'))
		{
			$data['user_session'] = $session_data;
			$data['getUser'] = $this->User->getFacultyModel();
        	$this->load->view('header', $data); //nagviview ning data (userlist, session data) paduman view.
        	$this->load->view('administration/UpdateFaculty'); //loads view php files
        	$this->load->view('footer');
        }
        else
        {
        	redirect('Welcome','refresh');
        } 
	}
	public function savechangesFaculty()
	{
		if($session_data = $this->session->userdata('set_session'))
		{
			$data['session'] = $session_data;
			$result = $this->User->saveChangesFacultyModel();
			$user_id = $this->input->post('user_id');
			if($result == 0)
			{
				$this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible text-center">
            												<h4><i class="icon fa fa-check"></i> Yey!</h4>
											            		User was successfully updated.      	
											            </div>');
				redirect('Welcome/UpdateFaculty?id='.$user_id,'refresh');
			}
			else
			{
				$this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible text-center">
        									<h4><i class="icon fa fa-ban"></i> Alert!</h4>
							            		Failed in updating user.      	
							            </div>');
				redirect('Welcome/UpdateFaculty?id='.$user_id,'refresh');
			}
	    }
	    else
        {
        	redirect('Welcome','refresh');
        }
	}
	public function deleteFaculty()
	{
		$user_id = $this->input->get('id');
		$id = $this->User->deleteFaculty($user_id);

		redirect('Welcome/faculty','refresh');
	} 
	public function createFaculty()
	{
		if($session_data = $this->session->userdata('set_session'))
		{
			$data['user_session'] = $session_data;
        	$this->load->view('header', $data); //nagviview ning data (userlist, session data) paduman view.
        	$this->load->view('administration/addFaculty'); //loads view php files
        	$this->load->view('footer');
        }
        else
        {
        	redirect('Welcome','refresh');
        } 
	}
	public function addFaculty()
	{
		if($session_data = $this->session->userdata('set_session'))
		{
			$data['session'] = $session_data;
			$result = $this->User->addFacultyModel();
			if($result == 0)
			{
				$this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible text-center">
            												<h4><i class="icon fa fa-check"></i> Yey!</h4>
											            		Faculty was successfully added.      	
											            </div>');
				redirect('Welcome/Faculty', 'refresh');
			}
			else
			{
				$this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible text-center">
        									<h4><i class="icon fa fa-ban"></i> Alert!</h4>
							            		Failed in Adding faculty.      	
							            </div>');
				redirect('Welcome/Faculty', 'refresh');
			}
	    }
	    else
        {
        	redirect('Welcome','refresh');
        }
	} 

	//Grade Level
	public function GradeList()
	{
		if($session_data = $this->session->userdata('set_session')) 
		{
			$data['user_session'] = $session_data;
			$data['getGradeList'] = $this->User->get_grade_level(); //hali sa model function na kinukua nya si userlist. Read ni.
        	$this->load->view('header', $data); //nagviview ning data (userlist, session data) paduman view.
        	$this->load->view('administration/GradeList'); //loads view php files
        	$this->load->view('footer');
        }
        else
        {
        	redirect('Welcome','refresh');
        }
	}
	public function createGradeList()
	{
		if($session_data = $this->session->userdata('set_session'))
		{
			$data['userlist'] = $this->User->get_user_list();
			$data['user_session'] = $session_data;
        	$this->load->view('header', $data); //nagviview ning data (userlist, session data) paduman view.
        	$this->load->view('administration/addGradeList'); //loads view php files
        	$this->load->view('footer');
        }
        else
        {
        	redirect('Welcome','refresh');
        } 
	}
	public function addGradeList()
	{
		if($session_data = $this->session->userdata('set_session'))
		{
			$data['session'] = $session_data;
			$result = $this->User->addGradeListModel($data['session']['user_id']);
			if($result == 0)
			{
				$this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible text-center">
            												<h4><i class="icon fa fa-check"></i> Yey!</h4>
											            		Grade Level was successfully added.      	
											            </div>');
				redirect('Welcome/GradeList', 'refresh');
			}
			else
			{
				$this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible text-center">
        									<h4><i class="icon fa fa-ban"></i> Alert!</h4>
							            		Failed in adding grade level.      	
							            </div>');
				redirect('Welcome/GradeList', 'refresh');
			}
	    }
	    else
        {
        	redirect('Welcome','refresh');
        }
	}
	public function updateGradeList()
	{
		if($session_data = $this->session->userdata('set_session'))
		{
			$data['user_session'] = $session_data;
			$data['getGradeList'] = $this->User->get_grade_list();
			$data['userlist'] = $this->User->get_user_list();
        	$this->load->view('header', $data); //nagviview ning data (userlist, session data) paduman view.
        	$this->load->view('administration/UpdateGradeList'); //loads view php files
        	$this->load->view('footer');
        }
        else
        {
        	redirect('Welcome','refresh');
        } 
	}
	public function savechangesGradeList()
	{
		if($session_data = $this->session->userdata('set_session'))
		{
			$data['session'] = $session_data;
			$result = $this->User->saveChangesGradeListModel($data['session']['user_id']);
			$grade_level_id = $this->input->post('grade_level_id');
			if($result == 0)
			{
				$this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible text-center">
            												<h4><i class="icon fa fa-check"></i> Yey!</h4>
											            		Grade List was successfully updated.      	
											            </div>');
				redirect('Welcome/updateGradeList?id='.$grade_level_id,'refresh');
			}
			else
			{
				$this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible text-center">
        									<h4><i class="icon fa fa-ban"></i> Alert!</h4>
							            		Failed in updating Grade List.      	
							            </div>');
				redirect('Welcome/updateGradeList?id='.$grade_level_id,'refresh');
			}
	    }
	    else
        {
        	redirect('Welcome','refresh');
        }
	}
	public function deleteGradeList()
	{
		$grade_level_id = $this->input->get('id');
		$id = $this->User->deleteGradeList($grade_level_id);

		redirect('Welcome/GradeList','refresh');
	}
	//Subject List
	public function SubjectList()
	{
		if($session_data = $this->session->userdata('set_session')) 
		{
			$data['user_session'] = $session_data;
			$data['getSubjectList'] = $this->User->get_subject_list(); //hali sa model function na kinukua nya si userlist. Read ni.
        	$this->load->view('header', $data); //nagviview ning data (userlist, session data) paduman view.
        	$this->load->view('administration/Subject'); //loads view php files
        	$this->load->view('footer');
        }
        else
        {
        	redirect('Welcome','refresh');
        }
	}
	public function createSubjectList()
	{
		if($session_data = $this->session->userdata('set_session'))
		{
			$data['user_session'] = $session_data;
        	$this->load->view('header', $data); //nagviview ning data (userlist, session data) paduman view.
        	$this->load->view('administration/addSubjectList'); //loads view php files
        	$this->load->view('footer');
        }
        else
        {
        	redirect('Welcome','refresh');
        } 
	}
	public function addSubjectList()
	{
		if($session_data = $this->session->userdata('set_session'))
		{
			$data['session'] = $session_data;
			$result = $this->User->addSubjectListModel();
			if($result == 0)
			{
				$this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible text-center">
            												<h4><i class="icon fa fa-check"></i> Yey!</h4>
											            		Subject was successfully added.      	
											            </div>');
				redirect('Welcome/SubjectList', 'refresh');
			}
			else
			{
				$this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible text-center">
        									<h4><i class="icon fa fa-ban"></i> Alert!</h4>
							            		Failed in adding Subject.      	
							            </div>');
				redirect('Welcome/SubjectList', 'refresh');
			}
	    }
	    else
        {
        	redirect('Welcome','refresh');
        }
	}
	public function updateSubjectList()
	{
		if($session_data = $this->session->userdata('set_session'))
		{
			$data['user_session'] = $session_data;
			$data['getSubjectList'] = $this->User->get_subject_list();
        	$this->load->view('header', $data); //nagviview ning data (userlist, session data) paduman view.
        	$this->load->view('administration/updateSubject'); //loads view php files
        	$this->load->view('footer');
        }
        else
        {
        	redirect('Welcome','refresh');
        } 
	}
	public function savechangesSubject()
	{
		if($session_data = $this->session->userdata('set_session'))
		{
			$data['session'] = $session_data;
			$result = $this->User->saveChangesSubjectListModel();
			$subject_id = $this->input->post('subject_id');
			if($result == 0)
			{
				$this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible text-center">
            												<h4><i class="icon fa fa-check"></i> Yey!</h4>
											            		Subject was successfully updated.      	
											            </div>');
				redirect('Welcome/updateSubjectList?id='.$subject_id,'refresh');
			}
			else
			{
				$this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible text-center">
        									<h4><i class="icon fa fa-ban"></i> Alert!</h4>
							            		Failed in updating Subject.      	
							            </div>');
				redirect('Welcome/updateSubjectList?id='.$subject_id,'refresh');
			}
	    }
	    else
        {
        	redirect('Welcome','refresh');
        }
	}
	public function deleteSubjectList()
	{
		$subject_id = $this->input->get('id');
		$id = $this->User->deleteSubjectList($subject_id);

		redirect('Welcome/SubjectList','refresh');
	}
	//Section List
	public function SectionList()
	{
		if($session_data = $this->session->userdata('set_session')) 
		{
			$data['user_session'] = $session_data;
			$data['getSectionList'] = $this->User->get_Section_List(); //hali sa model function na kinukua nya si userlist. Read ni.
        	$this->load->view('header', $data); //nagviview ning data (userlist, session data) paduman view.
        	$this->load->view('administration/Section'); //loads view php files
        	$this->load->view('footer');
        }
        else
        {
        	redirect('Welcome','refresh');
        }
    }
    public function createSectionList()
    {
        if($session_data = $this->session->userdata('set_session'))
		{
			$data['user_session'] = $session_data;
			$data['getGradeList'] = $this->User->get_grade_level();
        	$this->load->view('header', $data); //nagviview ning data (userlist, session data) paduman view.
        	$this->load->view('administration/addSection'); //loads view php files
        	$this->load->view('footer');
        }
        else
        {
        	redirect('Welcome','refresh');
        }
    }
    public function addSection()
    {
        if($session_data = $this->session->userdata('set_session'))
		{
			$data['session'] = $session_data;
			$result = $this->User->addSectionListModel($data['session']['user_id']);
			if($result == 0)
			{
				$this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible text-center">
            												<h4><i class="icon fa fa-check"></i> Yey!</h4>
											            		Section was successfully added.      	
											            </div>');
				redirect('Welcome/SectionList', 'refresh');
			}
			else
			{
				$this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible text-center">
        									<h4><i class="icon fa fa-ban"></i> Alert!</h4>
							            		Failed in adding Section.      	
							            </div>');
				redirect('Welcome/SectionList', 'refresh');
			}
	    }
	    else
        {
        	redirect('Welcome','refresh');
        }
	}
	public function updateSectionList()
	{
		if($session_data = $this->session->userdata('set_session'))
		{
			$data['user_session'] = $session_data;
			$data['getSectionList'] = $this->User->get_Section();
			$data['getGradeList'] = $this->User->get_grade_level();
        	$this->load->view('header', $data); //nagviview ning data (userlist, session data) paduman view.
        	$this->load->view('administration/UpdateSection'); //loads view php files
        	$this->load->view('footer');
        }
        else
        {
        	redirect('Welcome','refresh');
        } 
	}
	public function savechangesSection()
	{
		if($session_data = $this->session->userdata('set_session'))
		{
			$data['session'] = $session_data;
			$result = $this->User->saveChangesSectionListModel($data['session']['user_id']);
			$section_id = $this->input->post('section_id');
			if($result == 0)
			{
				$this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible text-center">
            												<h4><i class="icon fa fa-check"></i> Yey!</h4>
											            		Section was successfully updated.      	
											            </div>');
				redirect('Welcome/updateSectionList?id='.$section_id,'refresh');
			}
			else
			{
				$this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible text-center">
        									<h4><i class="icon fa fa-ban"></i> Alert!</h4>
							            		Failed in updating Section.      	
							            </div>');
				redirect('Welcome/updateSectionList?id='.$section_id,'refresh');
			}
	    }
	    else
        {
        	redirect('Welcome','refresh');
        }
	}
	public function deleteSectionList()
	{
		$section_id = $this->input->get('id');
		$id = $this->User->deleteSectionList($section_id);

		redirect('Welcome/SectionList','refresh');
	}

	public function AttendanceType()
	{
		if($session_data = $this->session->userdata('set_session')) 
		{
			$data['user_session'] = $session_data;
			$data['getAttendanceType'] = $this->User->get_attendance_type(); //hali sa model function na kinukua nya si userlist. Read ni.
        	$this->load->view('header', $data); //nagviview ning data (userlist, session data) paduman view.
        	$this->load->view('administration/AttendanceType'); //loads view php files
        	$this->load->view('footer');
        }
        else
        {
        	redirect('Welcome','refresh');
        }
	}
	public function createAttendanceType()
	{
		if($session_data = $this->session->userdata('set_session'))
		{
			$data['user_session'] = $session_data;
        	$this->load->view('header', $data); //nagviview ning data (userlist, session data) paduman view.
        	$this->load->view('administration/addAttendanceType'); //loads view php files
        	$this->load->view('footer');
        }
        else
        {
        	redirect('Welcome','refresh');
        } 
	}
	public function addAttendanceType()
	{
		if($session_data = $this->session->userdata('set_session'))
		{
			$data['session'] = $session_data;
			$result = $this->User->addAttendanceTypeModel();
			if($result == 0)
			{
				$this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible text-center">
            												<h4><i class="icon fa fa-check"></i> Yey!</h4>
											            		Attendance Type was successfully added.      	
											            </div>');
				redirect('Welcome/AttendanceType', 'refresh');
			}
			else
			{
				$this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible text-center">
        									<h4><i class="icon fa fa-ban"></i> Alert!</h4>
							            		Failed in adding Attendance Type.      	
							            </div>');
				redirect('Welcome/AttendanceType', 'refresh');
			}
	    }
	    else
        {
        	redirect('Welcome','refresh');
        }
	}
	public function updateAttendanceType()
	{
		if($session_data = $this->session->userdata('set_session'))
		{
			$data['user_session'] = $session_data;
			$data['getAttendanceType'] = $this->User->get_attendance();
        	$this->load->view('header', $data); //nagviview ning data (userlist, session data) paduman view.
        	$this->load->view('administration/updateAttendanceType'); //loads view php files
        	$this->load->view('footer');
        }
        else
        {
        	redirect('Welcome','refresh');
        } 
	}
	public function savechangesAttendanceType()
	{
		if($session_data = $this->session->userdata('set_session'))
		{
			$data['session'] = $session_data;
			$result = $this->User->savechangesAttendanceTypeModel();
			$id = $this->input->post('id');
			if($result == 0)
			{
				$this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible text-center">
            												<h4><i class="icon fa fa-check"></i> Yey!</h4>
											            		Subject was successfully updated.      	
											            </div>');
				redirect('Welcome/updateAttendanceType?id='.$id,'refresh');
			}
			else
			{
				$this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible text-center">
        									<h4><i class="icon fa fa-ban"></i> Alert!</h4>
							            		Failed in updating Subject.      	
							            </div>');
				redirect('Welcome/updateAttendanceType?id='.$id,'refresh');
			}
	    }
	    else
        {
        	redirect('Welcome','refresh');
        }
	}
	public function deleteAttendanceType()
	{
			$id = $this->input->get('id');
			$id = $this->User->deleteAttendanceType($id);

		redirect('Welcome/AttendanceType','refresh');
	}
	public function password()
	{
		if($session_data = $this->session->userdata('set_session')) 
		{
			$data['user_session'] = $session_data;
        	$this->load->view('header', $data); //nagviview ning data (userlist, session data) paduman view.
        	$this->load->view('administration/password'); //loads view php files
        	$this->load->view('footer');
        }
        else
        {
        	redirect('Welcome','refresh');
        }
	}
	public function changepasswords()
	{
		if($session_data = $this->session->userdata('set_session'))
		{
			$new_password = $this->input->post('new_password'); //pang kua ning input data sa view
			$confirm_password = $this->input->post('confirm_password');
			$user_id = $session_data['user_id']; //get user_id from session
			if($new_password == $confirm_password)
			{
				$data = $this->User->changepasswordModel($user_id, $new_password);//maduman ka sa model na user tapos hahanapon mo si function na processchangepassword_model($user_id, $new_password)
				$this->session->set_flashdata('message', 'Password successfully changed'); //pag ma flash ning message sa view
				redirect('Welcome/password','refresh'); //redirect sa home
			}
			else
			{
				$this->session->set_flashdata('message', 'Password does not match'); //pag ma flash ning message sa view
				redirect('Welcome/password','refresh');
			}
		}
		else
		{
			redirect('Welcome','refresh');
		}
				//redirect('Welcome/changepassword','refresh');
	}
	public function ScheduleList()
	{
		if($session_data = $this->session->userdata('set_session')) 
		{
			$data['user_session'] = $session_data;
			$data['getScheduleList'] = $this->User->get_Schedule_List(); //hali sa model function na kinukua nya si userlist. Read ni.
        	$this->load->view('header', $data); //nagviview ning data (userlist, session data) paduman view.
        	$this->load->view('administration/Schedule'); //loads view php files
        	$this->load->view('footer');
        }
        else
        {
        	redirect('Welcome','refresh');
        }
	}
	public function createScheduleList()
	{
		if($session_data = $this->session->userdata('set_session'))
		{
			$data['user_session'] = $session_data;
        	$this->load->view('header', $data); //nagviview ning data (userlist, session data) paduman view.
        	$this->load->view('administration/addScheduleList'); //loads view php files
        	$this->load->view('footer');
        }
        else
        {
        	redirect('Welcome','refresh');
        } 
	}
	public function addSchedule()
	{
		if($session_data = $this->session->userdata('set_session'))
		{
			$data['session'] = $session_data;
			$result = $this->User->addScheduleModel();
			if($result == 0)
			{
				$this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible text-center">
            												<h4><i class="icon fa fa-check"></i> Yey!</h4>
											            		Schedule was successfully added.      	
											            </div>');
				redirect('Welcome/ScheduleList', 'refresh');
			}
			else
			{
				$this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible text-center">
        									<h4><i class="icon fa fa-ban"></i> Alert!</h4>
							            		Failed in adding Attendance Type.      	
							            </div>');
				redirect('Welcome/ScheduleList', 'refresh');
			}
	    }
	    else
        {
        	redirect('Welcome','refresh');
        }
	}
	public function updateScheduleList()
	{
		if($session_data = $this->session->userdata('set_session'))
		{
			$data['user_session'] = $session_data;
			$data['getScheduleList'] = $this->User->get_schedule();
        	$this->load->view('header', $data); //nagviview ning data (userlist, session data) paduman view.
        	$this->load->view('administration/updateScheduleList'); //loads view php files
        	$this->load->view('footer');
        }
        else
        {
        	redirect('Welcome','refresh');
        } 
	}
	public function savechangesScheduleList()
	{
		if($session_data = $this->session->userdata('set_session'))
		{
			$data['session'] = $session_data;
			$result = $this->User->savechangesScheduleListModel();
			$id = $this->input->post('id');
			if($result == 0)
			{
				$this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible text-center">
            												<h4><i class="icon fa fa-check"></i> Yey!</h4>
											            		Schedule was successfully updated.      	
											            </div>');
				redirect('Welcome/updateScheduleList?id='.$id,'refresh');
			}
			else
			{
				$this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible text-center">
        									<h4><i class="icon fa fa-ban"></i> Alert!</h4>
							            		Failed in updating Schedule.      	
							            </div>');
				redirect('Welcome/updateScheduleList?id='.$id,'refresh');
			}
	    }
	    else
        {
        	redirect('Welcome','refresh');
        }
	}
	public function logout()
	{
		session_destroy();
		redirect('Welcome','refresh');
	}
}
