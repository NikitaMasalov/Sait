<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
        $_SESSION['msg'] = "You must log in first";
        header('location: login.php');
  }
  if (isset($_GET['logout'])) {
        session_destroy();
        unset($_SESSION['username']);
        header("location: login.php");
  }
 


  include('server.php')
  
?>
<!DOCTYPE html>
<html>
<head>
        <title>Home</title>
        <link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>

<div class="header">
        <h2>Добро пожаловать</h2>
        <?php  if (isset($_SESSION['username'])) : ?>
        <p>пользователь <strong><?php echo $_SESSION['username']; ?></strong></p>
        <?php endif ?>
</div>
<div class="content">
        <!-- notification message -->
        <?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
        <h3>
          <?php 
                echo $_SESSION['success']; 
                unset($_SESSION['success']);
          ?>
        </h3>
      </div>
        <?php endif ?>

    <!-- logged in user information -->
    <?php  if (isset($_SESSION['username'])) : ?>

        <p> <a href="index.php?logout='1'" style="color: red;">Выйти</a> </p>
    <?php endif ?>

      



        <form method="post" action="index.php">
        <?php include('errors.php'); ?>
        <div class="input-group">
          <label>Сумма</label>
          <input type="text" name="mone" value="<?php echo $mone; ?>">
        </div>
        <div class="input-group">
         
        <label>Выберете категорию:</label>
        <select name="kategory" value="<?php echo $kategory; ?>">
            <option>Еда</option>
            <option>Одежда</option>
            <option >Банковское обслуживание</option>
            <option>Досуг и отдых</option>
            <option>Медицина</option>
            <option>Налоги</option>
        </select>
        
      </div>
      <div class="input-group">
          <label>Выберете Операцию:</label>
        <select name="operati" value="<?php echo $operati; ?>">
            <option>Расход</option>
            <option>Доход</option>
            </select>
          
            </div>
        <div class="input-group">
          <button type="submit" class="btn" name="mone_y">Register</button>
        </div>

    
<?php
$conn = new mysqli("localhost", "root", "", "registration");
if($conn->connect_error){
    die("Ошибка: " . $conn->connect_error);
}
$sql = "SELECT sum(mone)'123' FROM money group by operati order by money.operati desc limit 1";
if($result = $conn->query($sql)){

    echo "<table><tr><th>расходы</th></tr>";
    foreach($result as $row){
        echo "<tr>";
            echo "<td>" . $row["123"] . "</td>";
           
        echo "</tr>";
    }
  
  
    $sql = "SELECT sum(mone)'321' FROM money group by operati order by money.operati asc limit 1";
if($result = $conn->query($sql))

    echo "<table><tr><th>Доходы</th></tr>";
    foreach($result as $row){
        echo "<tr>";
            echo "<td>" . $row["321"] . "</td>";
           
        echo "</tr>";
    }
  
    echo "</table>";
    $result->free();
} else{
    echo "Ошибка: " . $conn->error;
}
$conn->close();
?> 
<div class = qwert>
<?php
/*$conn = new mysqli("localhost", "root", "", "registration");
if($conn->connect_error){
    die("Ошибка: " . $conn->connect_error);
}
$sql = "SELECT * FROM money";
if($result = $conn->query($sql)){
    echo "<table><tr><th>Id</th><th>Имя</th><th>Возраст</th></tr>";
    foreach($result as $row){
        echo "<tr>";
            echo "<td>" . $row["mone"] . "</td>";
            echo "<td>" . $row["kategory"] . "</td>";
            echo "<td>" . $row["operati"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
    $result->free();
} else{
    echo "Ошибка: " . $conn->error;
}
$conn->close();*/
?></div> 
</html>