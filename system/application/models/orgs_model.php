<?php

class Orgs_model extends Model
{
	function Orgs_model()
	{
		// Call the Model constructor
		parent::Model();
	}
	
	function get_org($slug_or_idorgs)
	{
		if(is_numeric($slug_or_idorgs))
		{
			$this->db->where('idorgs', $slug_or_idorgs);
		}
		else
		{
			$this->db->where('slug', $slug_or_idorgs);
		}
		$this->db->limit(1);
		$query = $this->db->get('orgs');
		return $query->row();
	}
	
	function get_org_id($slug)
	{
		$this->db->select('idorgs');
		$this->db->where('slug', $slug);
		$query = $this->db->get('orgs');
		if($query->num_rows() <> 0)
		{
			$result = $query->row();
			return $result->idorgs;
		}
		else
		{
			return FALSE;
		}
	}
	
	function get_org_slug($idorgs)
	{
		$this->db->select('slug');
		$this->db->where('idorgs', $idorgs);
		$query = $this->db->get('orgs');
		if($query->num_rows() <> 0)
		{
			$result = $query->row();
			return $result->slug;
		}
		else
		{
			return FALSE;
		}
	}
	
	function get_orgs()
	{
		$query = $this->db->get('orgs');
		return $query->result();
	}
	
	function get_children($parent_slug)
	{
		$parent_idorgs = $this->get_org_id($parent_slug);
		$this->db->where('parent_idorgs', $parent_idorgs);
		$query = $this->db->get('orgs');
		if($query->num_rows() <> 0)
		{
			return $query->result();
		}
		else
		{
			return FALSE;
		}
	}
	
	function create_org()
	{
		//require user to be logged in
		if(!is_logged_in())
		{
			return FALSE;
		}
		
		//create org entry
		$data = array(
			'name' => $this->input->post('name'),
			'slug' => $this->input->post('slug'),
			'category' => $this->input->post('category'),
			'desc' => $this->input->post('desc'),
			'parent_idorgs' => $this->input->post('parent_idorgs'),
			'membership' => $this->input->post('membership'),
			'twitter' => $this->input->post('twitter'),
			'facebook' => $this->input->post('facebook'),
			'url' => $this->input->post('url'),
			'created_by' => idusers(),
			'created_at' => unix_to_mysql(),
			'approved' => '0'
			);
		$this->db->insert('orgs', $data);
		$idorgs = $this->db->insert_id();
		
		//make creator an administrator
		$this->add_position($idorgs, idusers(), '1');
		
		return TRUE;
	}
	
	function edit_org($org)
	{
		//require user to be logged in
		if(!$this->is_org_admin($org->slug) && !is_admin())
		{
			return FALSE;
		}
		
		$data = array(
			'name' => $this->input->post('name'),
			'category' => $this->input->post('category'),
			'desc' => $this->input->post('desc'),
			'parent_idorgs' => $this->input->post('parent_idorgs'),
			'membership' => $this->input->post('membership'),
			'twitter' => $this->input->post('twitter'),
			'facebook' => $this->input->post('facebook'),
			'url' => $this->input->post('url'),
			'updated_at' => unix_to_mysql()
			);
		
		$this->db->where('idorgs', $org->idorgs);
		$this->db->update('orgs', $data);
	}
	
	function edit_org_members($org, $members)
	{
		//require user to be logged in
		if(!$this->is_org_admin($org->slug) && !is_admin())
		{
			return FALSE;
		}
		
		$current_position_type = $this->input->post('current_position_type');
		$current_remove = $this->input->post('current_remove');
		
		foreach($current_remove as $remove_idusers)
		{
			$data = array('active' => '0');
			$this->db->where('idorgs', $org->idorgs);
			$this->db->where('idusers', $remove_idusers);
			$this->db->update('positions', $data);
		}
		
		foreach($members as $key => $member)
		{
			if(!in_array($member->idusers, $current_remove))
			{
				$data = array('idpositions_types' => $current_position_type[$key]);
				$this->db->where('idorgs', $org->idorgs);
				$this->db->where('idusers', $member->idusers);
				$this->db->update('positions', $data);
			}
		}
	}
	
	function get_org_categories_dropdown()
	{
		$this->db->select('idorgs_categories, name');
		$query = $this->db->get('orgs_categories');
		$result = $query->result();
		
		$options[0] = '';
		foreach($result as $row)
		{
			$options[$row->idorgs_categories] = $row->name;
		}
		
		return $options;
	}
	
	function get_orgs_dropdown()
	{
		$this->db->select('idorgs, name');
		$query = $this->db->get('orgs');
		$result = $query->result();
		
		$options[0] = 'None';
		foreach($result as $row)
		{
			$options[$row->idorgs] = $row->name;
		}
		
		return $options;
	}
	
	function get_positions_types($slug)
	{
		$org = $this->get_org($slug);
		
		//$this->db->where('idorgs', $org->idorgs);
		//$this->db->or_where('idorgs_categories', $org->category);
		//$query = $this->db->get('positions_types');
		
		$query_string = "	SELECT * 
							FROM positions_types 
							WHERE `idorgs`='".$org->idorgs."' 
								OR `idorgs_categories`='".$org->category."' 
								OR (`idorgs` IS null AND `idorgs_categories` IS null)";
		$query = $this->db->query($query_string);
		
		if($query->num_rows() <> 0)
		{
			$result = $query->result();
			return $result;
		}
		else
		{
			return FALSE;
		}
	}
	
	function get_positions_types_dropdown($slug)
	{
		$org = $this->get_org($slug);
		
		//$this->db->select('idpositions_types, name');
		//$this->db->where('idorgs', $org->idorgs);
		//$this->db->or_where('idorgs_categories', $org->category);
		//$query = $this->db->get('positions_types');
		
		
		$query_string = "	SELECT `idpositions_types`, `name` 
							FROM positions_types 
							WHERE `idorgs`='".$org->idorgs."' 
								OR `idorgs_categories`='".$org->category."' 
								OR (`idorgs` IS null AND `idorgs_categories` IS null)";
		$query = $this->db->query($query_string);
		
		if($query->num_rows() <> 0)
		{
			$result = $query->result();
			
			foreach($result as $row)
			{
				//$options[$row->idpositions_types] = $row->name;
				$options[$row->idpositions_types] = $row->name;
			}
			
			return $options;
		}
		else
		{
			return FALSE;
		}
	}
	
	function add_position($idorgs, $idusers, $idpositions_type = '2')
	{
		$position_data = array(
			'idpositions_types' => $idpositions_type,
			'idorgs' => $idorgs,
			'idusers' => $idusers,
			'active' => '1',
			'created_at' => unix_to_mysql()
			);
		$this->db->insert('positions', $position_data);
		return TRUE;
	}
	
	function remove_position($idorgs, $idusers, $idpositions_types = '')
	{
		$data['active'] = '0';
		$this->db->where('idorgs', $idorgs);
		$this->db->where('idusers', $idusers);
		if($idpositions_types != '')
		{
			$this->db->where('idpositions_types', $idpositions_types);
		}
		$this->db->limit(1);
		$this->db->update('positions', $data);
		return TRUE;
	}
	
	function join($slug)
	{
		//require user to be logged in
		if(!is_logged_in())
		{
			return FALSE;
		}
		$idorgs = $this->get_org_id($slug);
		$this->add_position($idorgs, idusers());
		return TRUE;
	}
	
	function leave($slug)
	{
		//require user to be logged in
		if(!is_logged_in())
		{
			return FALSE;
		}
		$idorgs = $this->get_org_id($slug);
		$this->remove_position($idorgs, idusers());
		return TRUE;
	}
	
	function user_is_member($slug)
	{
		//require user to be logged in
		if(!is_logged_in())
		{
			return FALSE;
		}
		
		$idorgs = $this->get_org_id($slug);
		
		$this->db->where('idorgs', $idorgs);
		$this->db->where('idusers', idusers());
		$this->db->where('active', '1');
		$query = $this->db->get('positions');
		if($query->num_rows() <> 0)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
	
	function get_org_members($slug)
	{
		$idorgs = $this->get_org_id($slug);
		
		$this->db->select('users.idusers, alias, nickname, fullname, positions.idpositions_types, name');
		$this->db->where('positions.idorgs', $idorgs);
		$this->db->where('positions.active', '1');
		$this->db->join('users', 'users.idusers = positions.idusers');
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
	
	function is_org_admin($slug)
	{
		//require user to be logged in
		if(!is_logged_in())
		{
			return FALSE;
		}
		
		$idorgs = $this->get_org_id($slug);
		
		$this->db->select('positions_types.privileges as privileges');
		$this->db->where('positions.idusers', idusers());
		$this->db->where('positions.idorgs', $idorgs);
		$this->db->join('users', 'users.idusers = positions.idusers');
		$this->db->join('positions_types', 'positions_types.idpositions_types = positions.idpositions_types');
		$query = $this->db->get('positions');
		//exit($this->db->last_query());
		if($query->num_rows() <> 0)
		{
			$result = $query->row();
			if($result->privileges == 'full')
			{
				return TRUE;
			}
			else
			{
				return FALSE;
			}
		}
		else
		{
			return FALSE;
		}
	}
}