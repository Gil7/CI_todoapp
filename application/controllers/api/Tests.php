<?php 
	require(APPPATH.'/libraries/REST_Controller.php');
	class Tests extends REST_controller {
		public function __construct()
		{
			parent::__construct();
			$this->load->model('todo');
		}
		public function index_get()
		{
			$todos = $this->todo->get_todos();
			$this->response($todos);
		}
		public function create_put()
		{
			echo 'create_put';
		}
		public function show_get($id)
		{
			$todo = $this->todo->find_todo($id);
			$this->response($todo);
		}
		public function update_put($id)
		{
			echo 'update put '.$id;
		}
		public function destroy_delete($id)
		{
			echo 'destroy_delete '.$id;
		}
	}
 ?>