<?php

  class Tasks extends CI_controller
  {

    public function test()
    {
      echo date('Y-m-d');
    }
    function __construct()
    {
      parent::__construct();
      $this->load->helper('url');
      $this->load->model('todo');
      $this->load->library('form_validation');
    }
    public function index()
    {
      $data['todos'] = $this->todo->get_todos();
      echo json_encode($data);
    }
    public function create_task()
    {
      $this->form_validation->set_rules('content', 'content','required');
      if ($this->form_validation->run() == FALSE) {
        echo json_encode(array('message' => 'al fields are required'));
      }
      else {
        $data['todo'] = $this->todo->save_todo();
        echo json_encode($data);
      }


    }
    public function show($id)
    {
      $data['todo'] = $this->todo->find_todo($id);
      echo json_encode($data);
    }
    public function update_task($id)
    {
      $data['todo'] = $this->todo->update_todo($id);
      echo json_encode($data);
    }
    public function delete_task($id)
    {
      if ($this->todo->delete_todo($id) == TRUE) {
        echo json_encode(array('success' => true ));
      }
      else {
        echo json_encode(array('success' => false ));
      }
    }
  }

 ?>
