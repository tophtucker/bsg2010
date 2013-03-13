<?php

class Users extends Controller {

	function Users()
	{
		parent::Controller();
		$this->load->model('users_model', 'users');
	}
	
	function index()
	{
		$this->create();
	}
	
	function create()
	{
		if(!$this->input->post('alias'))
		{
			$data['page_title'] = 'Create User';
			$data['content'] = $this->load->view('users/create', $data, TRUE);
			$this->load->view('template', $data);
		}
		else
		{
			$alias = $this->input->post('alias');
			$fullname = $this->input->post('fullname');
			$nickname = $this->input->post('nickname');
			$classyear = $this->input->post('classyear');
			$major = $this->input->post('major');
			$bio = $this->input->post('bio');
			$facebook = $this->input->post('facebook');
			$twitter = $this->input->post('twitter');
			$url = $this->input->post('url');
			
			$this->users->create_user($alias, $fullname, $nickname, $classyear, $major, $bio, $facebook, $twitter, $url);
			
			redirect('users/show/'.$alias);
		}
	}
	
	function edit($alias)
	{
		if(!is_logged_in())
		{
			redirect('users/login');
		}
		
		$user = $this->users->get_user($alias);
		
		if(idusers() <> $user->idusers)
		{
			redirect('/');
		}
		
		if(!$this->input->post('fullname'))
		{
			$data['user'] = $user;
			$data['page_title'] = $user->fullname;
			$data['content'] = $this->load->view('users/edit', $data, TRUE);
			$this->load->view('template', $data);
		}
		else
		{	
			$this->users->edit_user($user);
			
			redirect('users/show/'.$alias);
		}
	}
	
	function show($alias)
	{
		if(!is_logged_in())
		{
			redirect('users/login');
		}
		
		$data['user'] = $this->users->get_user($alias);
		$data['orgs'] = $this->users->get_user_orgs($alias);
		
		$data['page_title'] = $data['user']->fullname;
		$data['content'] = $this->load->view('users/show', $data, TRUE);
		$this->load->view('template', $data);
	}
	
	function login()
	{
		if(!$this->input->post('alias'))
		{
			$data['page_title'] = 'Login';
			$data['content'] = $this->load->view('users/login', $data, TRUE);
			$this->load->view('template', $data);
		}
		else
		{
			$alias = $this->input->post('alias');
			$this->users->login($alias);
			redirect('users/show/'.$alias);
		}
	}
	
	function logout()
	{
		$this->users->logout();
		redirect('/');
	}
	
}

/* End of file users.php */
/* Location: ./system/application/controllers/users.php */