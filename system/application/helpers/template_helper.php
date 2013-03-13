<?php

function is_logged_in()
{
	$CI =& get_instance();
	if($CI->session->userdata('idusers') <> '')
	{
		return TRUE;
	}
	else
	{
		return FALSE;
	}
}

function is_admin()
{
	$CI =& get_instance();
	$CI->load->model('users_model');
	if(!is_logged_in())
	{
		return FALSE;
	}
	$user = $CI->users_model->get_user($CI->session->userdata('alias'));
	if($user->status == 'admin') 
	{
		return TRUE;
	}
	else
	{
		return FALSE;
	}
}

function idusers()
{
	$CI =& get_instance();
	if($CI->session->userdata('idusers'))
	{
		return $CI->session->userdata('idusers');
	}
	else
	{
		return FALSE;
	}
}

function alias()
{
	$CI =& get_instance();
	if($CI->session->userdata('alias'))
	{
		return $CI->session->userdata('alias');
	}
	else
	{
		return FALSE;
	}
}

function nickname()
{
	$CI =& get_instance();
	if($CI->session->userdata('alias'))
	{
		$CI->load->model('users_model');
		$user = $CI->users_model->get_user($CI->session->userdata('alias'));
		return $user->nickname;
	}
	else
	{
		return FALSE;
	}
}

function unix_to_mysql($unix_timestamp = '')
{
	if($unix_timestamp === '')
	{
		$unix_timestamp = time();
	}
	return date('Y-m-d H:i:s', $unix_timestamp); 
}