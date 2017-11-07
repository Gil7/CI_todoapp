$(document).ready(function() {
  //hide the edit form
  $("#with-ajax").hide();
  $("#update-todo").hide();
  //load todos list
  function getTodos(){
    $.ajax({
      url:'http://127.0.0.1/ciapps/todoapp/index.php/api/tasks',
      method: 'GET',
      dataType:'json',
      success: function(data){
        $("#list-todos").empty();
        $.each(data.todos, function(i, item){
          var done = data.todos[i].isDone == 1 ? ':) - ' : ' :( - ';
          var current_item = '<a id='+data.todos[i].id+'>'+data.todos[i].content+'</a>';
          var btn = '<button class="btn btn-xs btn-danger" id="'+data.todos[i].id+'">X</button'
          $("#list-todos").append('<li>'+done+current_item + btn+'</li>')
        })
      },
      error: function(error) {
        console.log(error)
      }
    })
    $("#btnWithAjax").click(function(){
      $("#without-ajax").hide();
      $("#with-ajax").show();
    })
    $("#btnWithoutAjax").click(function(){
      window.location.href = "todos"
    })
  }
  //create a new todo
  $("#btnCreateTodo").on('click', function(){
    var new_todo = $("#txtTodo").val();
    $.ajax({
      url: 'http://127.0.0.1/ciapps/todoapp/index.php/api/tasks/create_task',
      method: 'POST',
      data: {content: new_todo},
      success: function(data){
        getTodos()
      },
      error: function(error){
        console.log(error)
      }
    })
  })
  //delete todo
  $("#list-todos").on('click','button',function(){
    var item = $(this);
    var current_id = item.prop('id');
    $.ajax({
      method:'GET',
      url:'http://127.0.0.1/ciapps/todoapp/index.php/api/tasks/delete_task/' + current_id,
      success: function(data){
        item.parent().empty().remove();
      },
      error: function(error){
        console.log(error)
      }
    })
  })
  //event to hanlde the event when the user wants to update a todo
  $("#list-todos").on('click', 'li a', function(){
    $("#id-edit").val($(this).prop('id'));
    $("#list-todos").hide();
    $("#content-edit").val($(this).text());
    $("#update-todo").show();
  })
  $("#btnCancelEdit").click(function(){
    $("#update-todo").hide();
    $("#list-todos").show();
  })
  //update todo
  $("#editTodo").submit(function(e){
    e.preventDefault();
    console.log('catched')
    var current_id = $("#id-edit").val();
    var isDone = ($("#isDone-edit").prop('checked')) ? 'on' : null;
    var content = $("#content-edit").val();
    $.ajax({
      url: 'http://127.0.0.1/ciapps/todoapp/index.php/api/tasks/update_task/' + current_id,
      method: 'POST',
      data: {content : content, isDone : isDone},
      success : function(data){
        console.log(data)
        getTodos()
        $("#list-todos").show();
        $("#update-todo").hide();
      },
      error: function(error){
        console.log(error)
      }
    })
  })
  getTodos()
})
