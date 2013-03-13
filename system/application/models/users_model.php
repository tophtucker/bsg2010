<?php

class Users_model extends Model
{
	function Users_model()
	{
		// Call the Model constructor
		parent::Model();
	}
	
	function get_user($alias)
	{
		$this->db->where('alias', $alias);
		$query = $this->db->get('users');
		return $query->row();
	}
	
	function get_user_id($alias)
	{
		$this->db->select('idusers');
		$this->db->where('alias', $alias);
		$query = $this->db->get('users');
		if($query->num_rows() <> 0)
		{
			$result = $query->row();
			return $result->idusers;
		}
		else
		{
			return FALSE;
		}
	}
	
	function get_user_alias($idusers)
	{
		$this->db->select('alias');
		$this->db->where('idusers', $idusers);
		$query = $this->db->get('users');
		if($query->num_rows() <> 0)
		{
			$result = $query->row();
			return $result->alias;
		}
		else
		{
			return FALSE;
		}
	}
	
	function create_user($alias, $fullname, $nickname, $classyear, $major, $bio, $facebook, $twitter, $url)
	{
		$data = array(
			'alias' => $alias,
			'status' => 'member',
			'fullname' => $fullname,
			'nickname' => $nickname,
			'classyear' => $classyear,
			'major' => $major,
			'bio' => $bio,
			'facebook' => $facebook,
			'twitter' => $twitter,
			'url' => $url
			);
		$this->db->insert('users', $data);
		$this->login($alias);
		return TRUE;
	}
	
	function edit_user($user)
	{
		//require user to be logged in
		if(!is_logged_in())
		{
			return FALSE;
		}
		//require editor to match editee
		if(idusers() <> $user->idusers)
		{
			redirect('/');
		}
		
		$data['fullname'] = $this->input->post('fullname');
		$data['nickname'] = $this->input->post('nickname');
		$data['classyear'] = $this->input->post('classyear');
		$data['major'] = $this->input->post('major');
		$data['bio'] = $this->input->post('bio');
		$data['facebook'] = $this->input->post('facebook');
		$data['twitter'] = $this->input->post('twitter');
		$data['url'] = $this->input->post('url');
		
		$this->db->where('idusers', $user->idusers);
		$this->db->update('users', $data);
		return TRUE;
	}
	
	function login($alias)
	{
		$idusers = $this->get_user_id($alias);
		$this->session->set_userdata('idusers',  $idusers);
		$this->session->set_userdata('alias',  $alias);
		return TRUE;
	}
	
	function logout($alias)
	{
		$this->session->sess_destroy();
		return TRUE;
	}
	
	function get_user_orgs($alias)
	{
		$idusers = $this->get_user_id($alias);
		
		$this->db->select('positions.idpositions_types, positions_types.name as position_name, orgs.idorgs, orgs.name as org_name, orgs.slug');
		$this->db->where('positions.idusers', $idusers);
		$this->db->join('orgs', 'orgs.idorgs = positions.idorgs');
		$this->db->join('positions_types', 'positions_types.idpositions_types = positions.idpositions_types');
		$query = $this->db->get('positions');
		if($query->num_rows() <> 0)
		{
			return $query->result();
		}
		else
		{
			return FALSE;
		}
	}
}