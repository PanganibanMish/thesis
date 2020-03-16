<?php
class User extends CI_Model
{
	 public function login_model()
	 {
		$user_type = $this->input->post('user_type');
		$username  = $this->input->post('username');
		$password  = md5($this->input->post('password'));
		if ($user_type == 'Faculty') {

			$sql = $this->db->query("SELECT * FROM user_list WHERE username = '$username' AND password = '$password' AND status <> '0' ")->result();
		}
		return $sql;
	}

	public function processchangepassword_model($user_id, $new_password)
	{
		//sinasabi niya na ngaya i-update mo si userlist na table tapos ribayan mo si value sa database kayang nakalaag sa array $data kung sain ang user_id equals sa $user_id na pinasa mo hali sa controller
		$data = array(
						'password' => md5($new_password), //si $new_password nilalaag nya sa 'password'
						'modified_by' => $user_id,
						'login_first' => 0
					); //ini si mga babaguhon sa database
		$this->db->where('user_id', $user_id); //kung nasain ang hinahanap na data
		$this->db->update('user_list', $data); //update data
		if($this->db->affected_rows() > 0) //tgchecheck niya kung pirang rows ang nabago sa database
			return true;
		else
			return false;
	}

	public function get_user_list()
	{
			$sql = $this->db->query("SELECT * FROM user_list")->result(); //kunon mo gabos ning user data sa table na userlist
			return $sql;
	}
	
	public function getFacultyModel()
	{
		$user_id = $this->input->get('id');
		$sql = $this->db->query("SELECT * FROM user_list WHERE user_id = '$user_id'")->result();
		return $sql;
	}
	public function saveChangesFacultyModel()
	{
		$data_array = array(
								'username' => $this->input->post('username'),
								'first_name' =>$this->input->post('first_name'),
								'last_name' =>$this->input->post('last_name'),
								'contact_no' => $this->input->post('contact_no'),
								'birthday'  => $this->input->post('birthday'),
								'user_type'=> $this->input->post('user_type')
							);
		$user_id = $this->input->post('user_id');
		$this->db->where('user_id', $user_id);
		if($this->db->update('user_list', $data_array) == true)
			return 0;
		return 1;
	}
	public function deleteFaculty($user_id)
	{
		 $this->db->where('user_id', $user_id);
		 return $this->db->delete('user_list');
	}
	public function addFacultyModel()
	{
		$data_array = array(
								'username' => $this->input->post('username'),
								'first_name' =>$this->input->post('first_name'),
								'last_name' =>$this->input->post('last_name'),
								'contact_no' => $this->input->post('contact_no'),
								'birthday'  => $this->input->post('birthday'),
								'user_type'=> $this->input->post('user_type'),
								'email' => $this->input->post('email')
							);
		if($this->db->insert('user_list', $data_array) == true)
			return 0;
		return 1;
	}
	public function get_grade_level()
	{
			$sql = $this->db->query("SELECT g.*, u.first_name, u.last_name, CONCAT(u2.first_name,' ',u2.last_name) as created_by, CONCAT(u3.first_name,' ',u3.last_name) as modified_by FROM grade_level g LEFT JOIN user_list u ON g.adviser = u.user_id LEFT JOIN user_list u2 ON g.created_by = u2.user_id LEFT JOIN user_list u3 ON g.modified_by = u3.user_id")->result();
			return $sql;
	}
	public function get_grade_list()
	{
		$grade_level_id = $this->input->get('id');
		$sql = $this->db->query("SELECT * FROM grade_level WHERE grade_level_id = '$grade_level_id'")->result();
		return $sql;
	}
	public function addGradeListModel($user_id)
	{
		$data_array = array(
								'grade_level' => $this->input->post('grade_level'),
								'adviser' =>$this->input->post('adviser'),
								'created_by'=>$user_id
							);
		if($this->db->insert('grade_level', $data_array) == true)
			return 0;
		return 1;
	}
	public function saveChangesGradeListModel($user_id)
	{
		$data_array = array(
								'grade_level' => $this->input->post('grade_level'),
								'adviser' =>$this->input->post('adviser'),
								'modified_by'=>$user_id	
							);
		$grade_level_id = $this->input->post('grade_level_id');
		$this->db->where('grade_level_id', $grade_level_id);
		if($this->db->update('grade_level', $data_array) == true)
			return 0;
		return 1;
	}
	public function deleteGradeList($grade_level_id)
	{
		 $this->db->where('grade_level_id', $grade_level_id);
		 return $this->db->delete('grade_level');
	}
	public function get_subject_list()
	{
		$sql = $this->db->query("SELECT * FROM subject")->result(); //kunon mo gabos ning user data sa table na userlist
			return $sql;
	}
	public function get_subject()
	{
		$subject_id = $this->input->get('id');
		$sql = $this->db->query("SELECT * FROM subject WHERE subject_id = '$subject_id'")->result();
		return $sql;
	}
	public function addSubjectListModel()
	{
		$data_array = array(
								'subject_code' => $this->input->post('subject_code'),
								'subject_name' =>$this->input->post('subject_name')
							);
		if($this->db->insert('subject', $data_array) == true)
			return 0;
		return 1;
	}
	public function saveChangesSubjectListModel()
	{
		$data_array = array(
								'subject_code' => $this->input->post('subject_code'),
								'subject_name' =>$this->input->post('subject_name')	
							);
		$subject_id = $this->input->post('subject_id');
		$this->db->where('subject_id', $subject_id);
		if($this->db->update('subject', $data_array) == true)
			return 0;
		return 1;
	}
	public function deleteSubjectList($subject_id)
	{
		$this->db->where('subject_id', $subject_id);
		 return $this->db->delete('subject');
	}

	public function get_Section_List()
	{
			$sql = $this->db->query("SELECT g.*, u.grade_level, CONCAT(u2.grade_level) as created_by, CONCAT(u3.grade_level) as modified_by FROM section g LEFT JOIN grade_level u ON g.grade_level = u.grade_level_id LEFT JOIN grade_level u2 ON g.created_by = u2.grade_level_id LEFT JOIN grade_level u3 ON g.modified_by = u3.grade_level_id")->result();
			return $sql;
	}
	public function get_Section()
	{
		$section_id = $this->input->get('id');
		$sql = $this->db->query("SELECT * FROM section WHERE section_id = '$section_id'")->result();
		return $sql;
	}
	public function addSectionListModel()
	{
		$data_array = array(
								'section_name' => $this->input->post('section_name'),
								'grade_level' =>$this->input->post('grade_level'),
							
							);
		if($this->db->insert('section', $data_array) == true)
			return 0;
		return 1;
	}
	public function saveChangesSectionListModel()
	{
		$data_array = array(
								'section_name' => $this->input->post('section_name'),
								'grade_level' =>$this->input->post('grade_level')	
							);
		$section_id = $this->input->post('section_id');
		$this->db->where('section_id', $section_id);
		if($this->db->update('section', $data_array) == true)
			return 0;
		return 1;
	}
	public function deleteSectionList($section_id)
	{
		$this->db->where('section_id', $section_id);
		 return $this->db->delete('section');
	}
	public function get_attendance_type()
	{
		$sql = $this->db->query("SELECT * FROM attendance_type")->result(); 
		return $sql;
	}
	public function get_attendance()
	{
		$id = $this->input->get('id');
		$sql = $this->db->query("SELECT * FROM attendance_type WHERE id = '$id'")->result();
		return $sql;
	}
	public function addAttendanceTypeModel()
	{
		$data_array = array(
								'attendance_name' => $this->input->post('attendance_name'),
								'remarks' =>$this->input->post('remarks')
							);
		if($this->db->insert('attendance_type', $data_array) == true)
			return 0;
		return 1;
	}
	public function savechangesAttendanceTypeModel()
	{
		$data_array = array(
								'attendance_name' => $this->input->post('attendance_name'),
								'remarks' =>$this->input->post('remarks')	
							);
		$id = $this->input->post('id');
		$this->db->where('id', $id);
		if($this->db->update('attendance_type', $data_array) == true)
			return 0;
		return 1;
	}
	public function deleteAttendanceType($id)
	{
		$this->db->where('id', $id);
		 return $this->db->delete('attendance_type');
	}
	public function changepasswordModel($user_id, $new_password)
	{
		$data = array(
						'password' => md5($new_password), //si $new_password nilalaag nya sa 'password'
						'modified_by' => $user_id,
					); //ini si mga babaguhon sa database
		$this->db->where('user_id', $user_id); //kung nasain ang hinahanap na data
		$this->db->update('user_list', $data); //update data
		if($this->db->affected_rows() > 0) //tgchecheck niya kung pirang rows ang nabago sa database
			return true;
		else
			return false;
	}
	public function get_Schedule_List()
	{
			$sql = $this->db->query("SELECT g.*, u.grade_level_id, CONCAT(u2.grade_level_id) as created_by, CONCAT(u3.grade_level_id) as modified_by FROM schedule g LEFT JOIN grade_level u ON g.grade_level_id = u.grade_level_id LEFT JOIN schedule u ON g.grade_level_id = u.grade_level_id LEFT JOIN schedule u2 ON g.created_by = u2.grade_level_id LEFT JOIN schedule u3 ON G.modified_by = u3.grade_level_id")->result();
			return $sql;
					//$sql = $this->db->query("SELECT g.*, u.first_name, u.last_name, CONCAT(u2.first_name,' ',u2.last_name) as created_by, CONCAT(u3.first_name,' ',u3.last_name) as modified_by FROM grade_level g LEFT JOIN user_list u ON g.adviser = u.user_id LEFT JOIN user_list u2 ON g.created_by = u2.user_id LEFT JOIN user_list u3 ON g.modified_by = u3.user_id")->result();
			//return $sql;
	}
	public function get_schedule()
	{
		$schedule_id = $this->input->get('id');
		$sql = $this->db->query("SELECT * FROM schedule WHERE schedule_id= '$schedule_id'")->result();
		return $sql;
	}
	public function addScheduleModel()
	{
			$data_array = array(
								'school_year' => $this->input->post('school_year'),
								'schedule_name' =>$this->input->post('schedule_name'),
								'grade_level_id' =>$this->input->post('grade_level_id'),
								'subject_id' =>$this->input->post('subject_id'),
								'section_id' =>$this->input->post('section_id'),
								'day' =>$this->input->post('day'),
								'time_start' =>$this->input->post('time_start'),
								'time_end' =>$this->input->post('time_end'),
								'teacher' =>$this->input->post('teacher')
							);
		if($this->db->insert('schedule', $data_array) == true)
			return 0;
		return 1;
	}
	public function savechangesScheduleListModel()
	{
		$data_array = array(
								'school_year' => $this->input->post('school_year'),
								'schedule_name' =>$this->input->post('schedule_name'),
								'grade_level_id' =>$this->input->post('grade_level_id'),
								'subject_id' =>$this->input->post('subject_id'),
								'section_id' =>$this->input->post('section_id'),
								'day' =>$this->input->post('day'),
								'time_start' =>$this->input->post('time_start'),
								'time_end' =>$this->input->post('time_end'),
								'teacher' =>$this->input->post('teacher')
							
							);
		if($this->db->update('schedule', $data_array) == true)
			return 0;
		return 1;
	}
}
