<?php

  class TodoController extends CI_controller
  {

    function __construct()
    {
      parent::__construct();
      $this->load->helper('url');
      $this->load->model('todo');
    }
    public function index()
    {
      $data['todos'] = $this->todo->get_todos();
      echo json_encode($data);
    }
  }

 ?>
