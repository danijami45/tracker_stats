<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Visitors extends CI_Controller {
	public function index()
	{
		// test visitor vew
		$this->load->view('visitors_view');
	}
}
