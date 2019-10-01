<?php
include "functions.php";
include "config.php";
// var_dump($_SESSION);
if (isset($_GET["sorted"])) {
    $_SESSION["sorted"] += 1;
}

if (isset($_GET["page"])){
    $end = $_GET["page"] * 3;
    $start = $end - 3;
} else {
    $end = 3;
    $start = $end-3;
}
$data = load_json("temp.json");
if ($_SESSION["sorted"] % 2 !== 0) {
    usort($data, function ($value01, $value02) {
            // echo $value01["name"] . " : " . $value02["name"] . "<br>";
          return mb_strtolower($value01["name"]) > mb_strtolower($value02["name"]);
    });
    // echo "sorted";
}

$tasks = [];
// echo "Start: " . $start . " End " . $end . "<br>";
for ($i = $start; $i < $end; $i++){
    if (count($data) > $i) {
      $tasks[] = $data[$i];
    }
}
$count_pages = ceil(count($data) / 3);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style/style.css">
    <title>Document</title>
</head>
<body>
    
      <nav style="display: flex; justify-content: flex-end;" class="container navbar navbar-light bg-light">
          <a class="btn btn-outline-primary"  href="/login.php">Login</a>
      </nav>

  
    <div style="" class="container mt-4">


          <?php if (isset($_GET["message"])) : ?>
            <div class="alert alert-success" role="alert">
                <?php echo $_GET["message"]; ?>
            </div>
          <?php endif; ?>

            <div class="box-task">
              <div class="panel">
                    <div class="el-name m-2"><a href="/index.php?sorted=1">sorted</a></div>
              </div>

                <?php for ($i = 0; $i < count($tasks); $i++): ?>
                
                <div class="panel">
                    <div class="el-name m-2"><?php echo $tasks[$i]["name"];?></div>
                    <div class="el-mail m-2"><?php echo $tasks[$i]["email"]; ?></div>
                    <div class="el-task m-2"><?php echo $tasks[$i]["message"]; ?></div>
                    <div class="el-status m-2">
                      <?php if ((int)$tasks[$i]["status"]) {
                            echo "complete";
                      } else {
                            echo "not complete";
                      } ?>
                        
                    </div>
                    <?php if ($_SESSION["access"]) :?>
                    <div class="el-edit m-2"><a href="/task.php?id=<?php echo $tasks[$i]["id_task"];?>">Edit</a></div>
                    <?php endif ?>
                </div>
                <div><hr></div>
                <?php endfor; ?>
                  
                  <nav aria-label="Page navigation example">
                    <ul class="pagination">
                      <?php for ($i = 0; $i < $count_pages ; $i++): ?>
                        <li class="page-item"><a class="page-link" href="?page=<?php echo $i + 1; ?>"><?php echo $i+1; ?></a></li>
                      <?php endfor; ?>
                    </ul>
                  </nav>
           </div>

        <hr>

        <form action="handler.php" method="POST">
            <h3 style="text-align: center;">add task</h3>

          <div class="form-group">
            <label for="email">Email address</label>
            <input name="email" type="email"  class="form-control" id="email" placeholder="Enter email" required>
           </div>

          <div class="form-group">
            <label for="name">Name</label>
            <input name="name" type="text"  class="form-control" id="name" placeholder="Enter name" required>
          </div>

          <div class="form-group">
            <label for="message">Message</label>
            <textarea style="height: 80px;" name="message" class="form-control" id="message" rows="5" placeholder="Enter message" required></textarea>
          </div>
            <input type="hidden" id="status" name="status" value="0">
            <input type="hidden" id="custId" name="command" value="load_data">
          <button type="submit" class="btn btn-primary float-right">Submit</button>
      </form>

    </div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>