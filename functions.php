<?php 
function add_todo_item($item) {
    end($_SESSION['todoItem']);
    $key = key($_SESSION['todoItem']);
    $_SESSION['todoItem'][$key + 1]['item'] = $item;
    $_SESSION['todoItem'][$key + 1]['completed'] = '';
}

function delete_todo_item($item) {
    unset($_SESSION['todoItem'][$item]);
}

function edit_todo_item($item) {
    $key = key($_SESSION['todoItem']);
    $_SESSION['todoItem'][$key]['item'] = $item;
    $_SESSION['todoItem'][$key]['completed'] = '';
}

function update_todo_item($item){
    if($_SESSION['todoItem'][$item]['edit'] == '') {
        $_SESSION['todoItem'][$item]['edit'] = 'success';
        return;
    } 
    $_SESSION['todoItem'][$item]['edit'] = '';
}
?>