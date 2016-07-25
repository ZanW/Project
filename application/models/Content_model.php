<?php

/**
 * Created by PhpStorm.
 * User: layheng
 * Date: 7/10/2016
 * Time: 4:25 PM
 */
class Content_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    public  function get_contents()
    {
       $querie = $this->db->get('content');
        return $querie->result_array();
    }

    public function get_content_by_id($id = 0)
	{
		$query = $this->db->get_where('content', array('id' => $id));
		return $query->result_array();
	}

	public function set_content()
	{
		$data = array(
			'post_message' => $this->input->post('post_message'));

		return $this->db->insert('content', $data);
	}

	public function update_content()
	{
		$data = array(
			'post_message' => $this->input->post('post_message'),);

		$this->db->where('id', $this->input->post('id'));
		
		return $this->db->update('content', $data);
	}

	public function delete_content()
	{
		$data = array( 'id' => $this->input->post('id') );

		return $this->db->delete('content', $data);
	}
}