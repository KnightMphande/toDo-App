<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>To do App</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
    <?php require('functions.php'); ?>
    <?php// require('main.css'); ?>

    <?php 
        // Add todo 
        if(isset($_POST['submit'])) {
            add_todo_item($_POST['todoItem']);
        }
        // Delete todo
        if(isset($_POST['delete'])) {
            delete_todo_item($_POST['delete']);
        }

        // Edit todo
         if(isset($_POST['edit'])) {
             edit_todo_item($_POST['edit']);
         }
    ?>

    <div class="container">
        <h1 class="text-center" style="font-family:courier;">To do List.</h1>
        <form action="" method="post">
            <!-- To Do Items -->
            <?php if(!empty($_SESSION['todoItem'])) : ?>
                <ul class="list-group">
                    <?php foreach($_SESSION['todoItem'] as $key => $item) : ?>
                        <li class="list-group-item list-group-item-<?php echo $item['completed']; ?>">
                            <span><?php echo $item['item']; ?></span>
                            
                            <button type="submit" class="btn btn-danger float-right" value="<?php echo $key; ?>" name="delete">Delete</button>
                            <button type="submit" class="btn btn-modify float-right" value="<?php echo $key; ?>" name="edit">Edit</button>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>

            <input type="text" class="form-control" name="todoItem" placeholder="Type a new item here + date">
            <input type="date" name="date" class="date">
            <?php if(isset($_POST["edit"]) ) { ?>
                <input type="submit" name="update" class="first-click" value="Update">
            <?php } else { ?>
                <input type="submit" name="submit" class="first-click" value="Submit">
                <?php }?>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>