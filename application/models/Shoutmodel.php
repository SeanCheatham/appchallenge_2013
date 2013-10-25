<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Shoutmodel extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	
	function get_pins()
	{
		$pins = array();
		$query = $this->db->get('shout_shouts');
		foreach($query->result_array() as $key => $row)
		{
			$pins['pins'][$key]['latitude'] = $row['shout_latitude'];
			$pins['pins'][$key]['longitude'] = $row['shout_longitude'];
			$pins['pins'][$key]['text'] = $row['shout_text'];
		}
		return $pins;
	}
}