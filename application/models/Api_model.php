<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api_model extends CI_Model
{
	public function __construct()
	{
		parent:: __construct();
	}

	public function get($id = NULL)
	{
		if(! is_null($id))
		{
			$query = $this->db->select('*')->from('profile')->where('id',$id)->get();

			if($query->num_rows() === 1)
			{
				return $query->row_array();
			}
			return NULL;
		}
		else
		{
			$query = $this->db->select('*')->from('profile')->get();

			if($query->num_rows() > 0)
			{
				return $query->result_array();
			}
			return NULL;
		}
	}


	
	public function save($profile)
	{
		$this->db->set(
				$this->_setProfile($profile)
			)
			->insert('profile');

		if($this->db->affected_rows() === 1)
		{
			return $this->db->insert_id();
		}
		return NULL;
	}


	public function delete($id)
	{
		$this->db->where('id',$id)->delete('profile');

		if($this->db->affected_rows() === 1)
		{
			return TRUE;
		}
		return NULL;
	}

	public function update($id,$profile)
	{
		$this->db->set(
				$this->_setProfile($profile)
			)
			->where('id',$id)
			->update('profile');

		if($this->db->affected_rows() === 1)
		{
			return TRUE;
		}
		return NULL;
	}

	public function _setProfile($profile)
	{
		return array(
				'name' => $profile['name'],
				'designation' => $profile['designation'],
				'company' => $profile['company']
			);
	}
}