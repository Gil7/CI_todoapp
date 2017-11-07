<?php

	class Todos extends CI_controller {
		public function __construct()
		{
			parent::__construct();
			$this->load->helper(array('form'));
			$this->load->library('form_validation');
			$this->load->model('todo');
		}
		public function index()
		{
			$data['todos'] = $this->todo->get_todos();
			$this->load->view('templates/master');
			$this->load->view('todos/index',$data);
			$this->load->view('templates/footer');
		}
		public function create()
		{
			$this->load->view('templates/master');
			$this->load->view('todos/create');
			$this->load->view('templates/footer');
		}
		public function store()
		{
			$this->form_validation->set_rules('content','content','required|min_length[5]');
			if ($this->form_validation->run() == FALSE) {
				$this->load->view('templates/master');
				$this->load->view('todos/create');
				$this->load->view('templates/footer');
			}
			else {
				$this->todo->save_todo();
				redirect('todos');
			}
		}
		public function show($id)
		{
			$data['todo'] = $this->todo->find_todo($id);
			if (empty($data['todo'])) {
				show_404();
			}
			else {
				$this->load->view('templates/master');
				$this->load->view('todos/show', $data);
				$this->load->view('templates/footer');
			}
		}
		public function update($id)
		{

			$this->form_validation->set_rules('content','content','required');
			if ($this->form_validation->run() == FALSE) {
				$this->show($id);
			}
			else {
				$this->todo->update_todo($id);
				redirect('todos');
			}
		}
		public function delete($id)
		{
			if ($this->todo->delete_todo($id) == FALSE) {
				$this->show($id);
			}
			else {
				redirect('todos');
			}

		}
	}

 ?>
