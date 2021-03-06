<?php

function is_admin(){
	$CI = &get_instance();
	if($CI->session->userdata('logged_in')){
		return true;
	}
	return false;
}

function init_head($aside = true)
{
    $CI = &get_instance();
    $CI->load->view('admin/includes/head');
    if ($aside == true) {
        $CI->load->view('admin/includes/aside');
    }
    $CI->load->view('admin/includes/header');    
}

function init_tail()
{
    $CI = &get_instance();
    $CI->load->view('admin/includes/scripts');
}
function admin_url($url = '')
{
    $adminURI = get_admin_uri();

    if ($url == '' || $url == '/') {
        if ($url == '/') {
            $url = '';
        }

        return site_url($adminURI) . '/';
    }

    return site_url($adminURI . '/' . $url);
}
function get_admin_uri()
{
    return ADMIN_URI;
}

function user(){
    $CI = &get_instance();
    return $CI->ion_auth->user()->row();
}