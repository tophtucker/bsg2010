<?php

class Pages extends Controller {

	function Pages()
	{
		parent::Controller();	
	}
	
	function index()
	{
		$data['page_title'] = 'Bowdoin Student Government';
		$data['content'] = $this->load->view('pages/index', $data, TRUE);
		$this->load->view('template', $data);
	}
	
	function bsg()
	{
		redirect('orgs/show/bsg');
	}
	
	function services()
	{
		$data['page_title'] = 'Bowdoin Student Government: Services';
		$data['content'] = $this->load->view('pages/services', $data, TRUE);
		$this->load->view('template', $data);
	}
	
	function about()
	{
		$data['page_title'] = 'Bowdoin Student Government: About';
		$data['content'] = $this->load->view('pages/about', $data, TRUE);
		$this->load->view('template', $data);
	}
	
	function help()
	{
		$data['page_title'] = 'Bowdoin Student Government: Help';
		$data['content'] = $this->load->view('pages/help', $data, TRUE);
		$this->load->view('template', $data);
	}
	
	function feedback()
	{
		$data['page_title'] = 'Bowdoin Student Government: Feedback';
		$data['content'] = $this->load->view('pages/feedback', $data, TRUE);
		$this->load->view('template', $data);
	}
}

/* End of file pages.php */
/* Location: ./system/application/controllers/pages.php */