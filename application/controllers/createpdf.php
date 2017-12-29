<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class createpdf extends CI_Controller {
	function pdf()
	{
    $this->load->helper('pdf_helper');
    /*
        ---- ---- ---- ----
        your code here
        ---- ---- ---- ----
    */
    $this->load->view('pdfreport');
	}
}