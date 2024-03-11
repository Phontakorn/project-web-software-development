<?php
  include "connect.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <link rel="stylesheet" href="styles.css">
  <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">
</head>
<body>
  <div class="container">
    <div class="column1">
      <form class="login-form" action="" method="POST">
        <img src="img/kmitllogo.png" alt="Login Image">
        <h2>LOGIN</h2>
        <input type="text" id="username" name="username" placeholder="Username" required>
        <input type="password" id="password" name="password" placeholder="Password" required>
        <input type="submit" name="login" value="Login">
      </form>
    </div>
    <div class="column2">
        <img src="img/imglogin.png" alt="Image in Column 2">
    </div>
  </div>
</body>
<?php
  if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM user WHERE user_name = '$username' AND user_password = '$password'";
    $result = mysqli_query($conn ,$sql);
    $data = mysqli_fetch_array($result);
    if(mysqli_num_rows($result) > 0){
      $_SESSION['username'] = $username;
      $_SESSION['id'] = $data['user_student_id'];
      $_SESSION['name'] = $data['user_student_name'];
      $_SESSION['all_data_array'] = array();
      $student_id = $_SESSION['id'];
      $sql = "SELECT * FROM enrollment WHERE enrollment_student_id = $student_id";
      $query = mysqli_query($conn, $sql);
      if(mysqli_num_rows($query) > 0)
      {
        header("Location: drop.php");
      }else{
        header("Location: course_select.php");
      }
    }else{
      ?>
        <script>
          alert("Username หรือ Password ไม่ถูกต้อง!!");
        </script>
      <?php
    }
  }
?>
</html>
