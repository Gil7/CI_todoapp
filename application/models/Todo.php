<?php

	 class Todo extends CI_model {
	 	public $content;
		public $isDone;
		public $created_at;
		public function __construct()
		{
			$this->load->helper('url');
			$this->load->database();
		}
		public function get_todos()
		{
			return $this->db->get('todos')->result();
		}
		public function api_save_todo($todo)
		{
			$this->db->insert('todos',$todo);
			return $todo;
		}
		public function save_todo()
		{
			$todo = array(
				'content' => $this->input->post('content'),
				'isDone' => false,
				'created_at' => date('Y-m-d'));
			return $this->db->insert('todos',$todo);
		}
		public function find_todo($id)
		{
			return $this->db->get_where('todos',array('id' => $id))->row();
		}
		public function update_todo($id)
		{
			$todo = array(
				'content' => $this->input->post('content'),
				'isDone' => $this->input->post('isDone') != null ? true : false
				);
			return $this->db->update('todos',$todo,array('id' => $id));
		}
		public function delete_todo($id)
		{
			return $this->db->delete('todos',array('id' => $id));
		}
	 }
 ?>
