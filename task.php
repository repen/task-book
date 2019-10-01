<?php 
$index = (int)$_GET["id"];
include "functions.php";
include "config.php";
$data = load_json("temp.json");
// var_dump($data[$index]);
$task = $data[$index];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>

      <nav style="display: flex; justify-content: flex-end;" class="container navbar navbar-light bg-light">
          <a class="btn btn-outline-primary" href="index.php">Home</a>
      </nav>


	<div class="container">
	        <form action="handler.php" method="POST">
	            <h3 style="text-align: center;">Edit Task</h3>

	          <div class="form-group">
	            <label for="email">Email address</label>
	            <input name="email" type="email"  class="form-control" id="email" placeholder="Enter email" value="<?php echo $task["email"]; ?> " required>
	            <hr>
	            <label class="radio-inline ml-2"><input type="radio" name="status" value="1">complete</label>
				<label class="radio-inline ml-2"><input type="radio" name="status" value="0" checked>not complete</label>
	           </div>

	          <div class="form-group">
	            <label for="name">Name</label>
	            <input name="name" type="text"  class="form-control" id="name" placeholder="Enter name" value="<?php echo $task["name"]; ?> " required>
	          </div>

	          <div class="form-group">
	            <label for="message">Message</label>
	            <textarea name="message" class="form-control" id="message" rows="5" placeholder="Enter message" required><?php echo $task["message"]; ?></textarea>
	          </div>
	            <input type="hidden" id="custId" name="command" value="edit_task">
	            <input type="hidden" id="custId" name="id_task" value="<?php echo $index; ?>">
	          <button type="submit" class="btn btn-primary float-right">Submit</button>
	      </form>
	</div>

 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>