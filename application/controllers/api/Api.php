<?php 
  defined('BASEPATH') OR exit('No direct script access allowed');
 
require(APPPATH.'/libraries/REST_Controller.php');
class Api extends REST_Controller
{
       public function __construct() {
         parent::__construct();
         $this->load->model('todo');
 
       }    
       public function index_get()
       {
          $todos = $this->todo->get_todos();
          $this->response($todos);
       }
       public function index_post()
       {
         $todo = array(
            'todo' => $this->post('todo'),
            'user_id' => $this->post('user_id')
          ); 
         $new_todo = $this->todo->api_save_todo($todo);
         $this->response($new_todo);
       }
       /*
       public function user_get(){
           $r = $this->user_model->read();
           $this->response($r); 
       }
       public function user_put(){
           $id = $this->uri->segment(3);
 
           $data = array('name' => $this->input->get('name'),
           'pass' => $this->input->get('pass'),
           'type' => $this->input->get('type')
           );
 
            $r = $this->user_model->update($id,$data);
               $this->response($r); 
       }
 
       public function user_post(){
           $data = array('name' => $this->input->post('name'),
           'pass' => $this->input->post('pass'),
           'type' => $this->input->post('type')
           );
           $r = $this->user_model->insert($data);
           $this->response($r); 
       }
       public function user_delete(){
           $id = $this->uri->segment(3);
           $r = $this->user_model->delete($id);
           $this->response($r); 
       }
    
      */
}


 ?>