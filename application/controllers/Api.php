<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'/libraries/REST_Controller.php';

class Api extends REST_Controller
{
	public function __construct()
	{
		parent:: __construct();

		$this->load->model('Api_model');
	}


	public function index_get()
	{
		$data = $this->Api_model->get();

		if(! is_null($data))
		{
			$this->response(array('response' => $data),200);
		}
		else
		{
			$this->response(array('error' => 'No Data in the Database!'),404);
		}
	}

	public function find_get($id)
	{
		$data = $this->Api_model->get($id);

		if(! is_null($data))
		{
			$this->response(array('response' => $data),200);
		}
		else
		{
			$this->response(array('error' => 'No Find Result!'),404);
		}
	}

	function index_post()
	{
		if(! $this->post('profile'))
		{
			$this->response(NULL,400);
		}
		$profileId = $this->Api_model->save($this->post('profile'));

		if(! is_null($profileId))
		{
			$this->response(array('response' => $profileId),200);
		}
		else
		{
			$this->response(array('error' => 'No post Result!'),400);
		}
	}

	function index_put($id)
	{
		if(! $this->put('profile') || ! $id)
		{
			$this->response(NULL,400);
		}
		$update = $this->Api_model->update($id,$this->put('profile'));

		if(! is_null($update))
		{
			$this->response(array('response' => "Update Successful"),200);
		}
		else
		{
			$this->response(array('error' => 'No post Result!'),400);
		}
	}

	function index_delete($id)
	{
		if(!$id)
		{
			$this->response(NULL,400);
		}
		$delete = $this->Api_model->delete($id);

		if(! is_null($delete))
		{
			$this->response(array('response' => 'successfully Deleted'),200);
		}
		else
		{
			$this->response(array('error' => 'No post Result!'),400);
		}
	}
}