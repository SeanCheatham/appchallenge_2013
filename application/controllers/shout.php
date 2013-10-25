<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Shout extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Shoutmodel');
	}
	
	public function index()
	{
		$data = $this->Shoutmodel->get_pins();
		$this->load->view('map',$data);
	}
	
	public function addShout($latitude, $longitude, $text)
	{
		$data = array(
			'shout_latitude' => $latitude,
			'shout_longitude' => $longitude,
			'shout_text' => $text
		);
		
		
		$query = $this->db->insert('shout2', $data);
		$this->load->view('map');
	}
	
}
