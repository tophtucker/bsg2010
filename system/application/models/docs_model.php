<?php

class Docs_model extends Model
{
	function Docs_model()
	{
		// Call the Model constructor
		parent::Model();
	}
	
	function get_doc($iddocs)
	{
		$this->db->where('iddocs', $iddocs);
		$query = $this->db->get('docs');
		return $query->row();
	}
	
	function get_org_docs($idorgs)
	{
		$this->db->where('idorgs', $idorgs);
		$query = $this->db->get('docs');
		return $query->result();
	}
	
	function create_doc()
	{
		$data = array(
			'idorgs' => $this->input->post('idorgs'),
			'type' => $this->input->post('type'),
			'title' => $this->input->post('title'),
			'desc' => $this->input->post('desc'),
			'text' => $this->input->post('text'),
			'filename' => $this->input->post('filename'),
			'status' => $this->input->post('status'),
			'created_at' => unix_to_mysql(),
			'created_by' => idusers(),
			);
		$this->db->insert('docs', $data);
		return TRUE;
	}
}