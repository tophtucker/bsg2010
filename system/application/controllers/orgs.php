<?php

class Orgs extends Controller {

	function Orgs()
	{
		parent::Controller();
		$this->load->model('orgs_model', 'orgs');
		$this->load->model('orgs_model', 'docs');
	}
	
	function index()
	{
		$this->browse();
	}
	
	function browse()
	{
		$data['orgs'] = $this->orgs->get_orgs();
		$data['page_title'] = 'Student Organizations';
		$data['content'] = $this->load->view('orgs/browse', $data, TRUE);
		$this->load->view('template', $data);
	}
	
	function create($parent_idorgs = '0')
	{
		if(!is_logged_in())
		{
			redirect('users/login');
		}
		if(!$this->input->post('name'))
		{
			$data['page_title'] = 'Propose Student Organization';
			$data['parent_idorgs'] = $parent_idorgs;
			$data['category_options'] = $this->orgs->get_org_categories_dropdown();
			$data['parent_options'] = $this->orgs->get_orgs_dropdown();
			$data['content'] = $this->load->view('orgs/create', $data, TRUE);
			$this->load->view('template', $data);
		}
		else
		{
			$this->orgs->create_org();
			redirect('orgs/show/'.$this->input->post('slug'));
		}
	}
	
	function edit($slug)
	{
		if(!$this->orgs->is_org_admin($slug) && !is_admin())
		{
			redirect('users/login');
		}
		
		$org = $this->orgs->get_org($slug);
		
		if(!$this->input->post('name'))
		{
			$data['org'] = $org;
			$data['category_options'] = $this->orgs->get_org_categories_dropdown();
			$data['parent_options'] = $this->orgs->get_orgs_dropdown();
			
			$data['page_title'] = $org->name;
			$data['content'] = $this->load->view('orgs/edit', $data, TRUE);
			$this->load->view('template', $data);
		}
		else
		{	
			$this->orgs->edit_org($org);
			redirect('orgs/show/'.$slug);
		}
	}
	
	function editmembers($slug)
	{
		if(!$this->orgs->is_org_admin($slug) && !is_admin())
		{
			redirect('users/login');
		}
		
		$org = $this->orgs->get_org($slug);
		$members = $this->orgs->get_org_members($slug);
		
		if(!$this->input->post('current_position_type'))
		{
			$data['org'] = $org;
			$data['members'] = $members;
			$data['position_types'] = $this->orgs->get_positions_types($slug);
			$data['position_options'] = $this->orgs->get_positions_types_dropdown($slug);
			
			$data['page_title'] = $org->name;
			$data['content'] = $this->load->view('orgs/editmembers', $data, TRUE);
			$this->load->view('template', $data);
		}
		else
		{	
			$this->orgs->edit_org_members($org, $members);
			redirect('orgs/show/'.$slug);
		}
	}
	
	function show($slug)
	{
		$data['org'] = $this->orgs->get_org($slug);
		
		if($data['org']->parent_idorgs)
		{
			$data['parent'] = $this->orgs->get_org($data['org']->parent_idorgs);
		}
		else
		{
			$data['parent'] = FALSE;
		}
		
		if($this->orgs->is_org_admin($slug) || is_admin())
		{
			$data['is_org_admin'] = TRUE;
		}
		else
		{
			$data['is_org_admin'] = FALSE;
		}
		
		$data['children'] = $this->orgs->get_children($slug);
		$data['members'] = $this->orgs->get_org_members($slug);
		$data['is_member'] = $this->orgs->user_is_member($slug);
		
		$data['page_title'] = $data['org']->name;
		$data['content'] = $this->load->view('orgs/show', $data, TRUE);
		$this->load->view('template', $data);
	}
	
	function join($slug)
	{
		if(!is_logged_in())
		{
			redirect('users/login');
		}
		$this->orgs->join($slug);
		redirect('orgs/show/'.$slug);
	}
	
	function leave($slug)
	{
		if(!is_logged_in())
		{
			redirect('users/login');
		}
		$this->orgs->leave($slug);
		redirect('orgs/show/'.$slug);
	}
	
	function add_doc($slug)
	{
		//
	}
}

/* End of file users.php */
/* Location: ./system/application/controllers/users.php */