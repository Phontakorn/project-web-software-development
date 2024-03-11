<?php
  include "connect.php";
  if(empty($_SESSION["username"])){
    header("Location: index.php");
  }
  $student_id = $_SESSION['id'];
  $sql = "SELECT * FROM enrollment WHERE enrollment_student_id = $student_id";
  $query = mysqli_query($conn, $sql);
  if(mysqli_num_rows($query) > 0)
      {
        header("Location: drop.php");
      }

  if (isset($_POST['logout'])) {
    session_unset();
    session_destroy();
    header("Location: index.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Select</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">
</head>
<body>
<div class="navbar">
        <div class="logo">
          <img src="img/kmitllogo.png" alt="Logo">
        </div>
        <div class="menu"></div>
        <div class="user">
            <span><?php echo $_SESSION['name'];?></span>
        </div>
        <div class="logout">
            <form method="post">
                <button class="logout-button" type="submit" name="logout">Logout</button>
            </form>
        </div>
    </div> 

      <div class="content">
        <form class="course-form" action="enroll_select.php" method="GET">
          <h2>Computer Engineer (Continuing Program)</h2>
          <select id="course" name="course" required>
            <option value="" disabled selected hidden>หลักสูตร</option>
            <option value="course1">วิศวกรรมศาสตรบัณฑิต สาขาวิชาวิศวกรรมคอมพิวเตอร์ (ต่อเนื่อง) ปี 2564</option>
          </select><br>
          
          <select id="semester" name="semester" required>
            <option value="" disabled selected hidden>เทอม</option>
            <option value="1">เทอมที่ 1</option>
            <option value="2">เทอมที่ 2</option>
          </select><br>
          
          <select id="year" name="year" required>
            <option value="" disabled selected hidden>ชั้นปี</option>
            <option value="1">ปี 1</option>
            <option value="2">ปี 2</option>
            <option value="3">ปี 3</option>
          </select><br>          
      
          <input type="submit" value="Comfirm">
        </form>
      </div>
      
</body>
</html>