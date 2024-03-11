<?php
  include "connect.php";
  if(empty($_SESSION["username"])){
    header("Location: index.php");
  }
  if (isset($_POST['logout'])) {
    session_unset();
    session_destroy();
    header("Location: index.php");
  }

  $student_id = $_SESSION['id'];
  $sql = "SELECT * FROM enrollment WHERE enrollment_student_id = $student_id";
  $query = mysqli_query($conn, $sql);
  if(mysqli_num_rows($query) == 0)
      {
        session_unset();
        session_destroy();
        header("Location: course_select.php");
      }

  $student_id = $_SESSION['id'];
  $sql_data_enroll = "SELECT MAX(enrollment_year) FROM enrollment WHERE enrollment_student_id = $student_id";
  $query_enroll = mysqli_query($conn, $sql_data_enroll);
  $result_enroll = mysqli_fetch_array($query_enroll);
  $max_year = $result_enroll['MAX(enrollment_year)'];

  $sql_data_enroll = "SELECT MAX(enrollment_semester) FROM enrollment WHERE enrollment_student_id = $student_id AND enrollment_year = $max_year";
  $query_enroll = mysqli_query($conn, $sql_data_enroll);
  $result_enroll = mysqli_fetch_array($query_enroll);
  $max_semester = $result_enroll['MAX(enrollment_semester)'];

  if(isset($_GET['del'])){
    $del_id = $_GET['del'];
    $sql = "DELETE FROM enrollment WHERE enrollment_student_id = $student_id AND enrollment_course_id = $del_id";
    mysqli_query($conn, $sql);
    header("Location: drop.php");
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drop</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">
</head>
<body>
<div class="navbar">
        <div class="logo">
          <img src="img/kmitllogo.png" alt="Logo">
        </div>
        <div class="menu">
            <ul>
                <li><a href="drop.php" class="active">ลบรายวิชา</a></li>
                <li><a href="registration_plan.php">แผนการลงทะเบียน</a></li>
                <li><a href="course_group.php">สรุปการลงทะเบียนตามหลักสูตร</a></li>
            </ul>
        </div>
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
        <h2>ลบรายวิชาที่ลงทะเบียนเรียน</h2><br><br>
        <form action="" method="get">
        <?php
                for($i = 1; $i<=$max_year; $i++){
                    for($j = 1; $j<=2; $j++){
                        if($i == 1){
                            $sql_data_enroll = "SELECT * FROM enrollment WHERE enrollment_student_id = $student_id AND enrollment_year = $i AND enrollment_semester = $j ORDER BY enrollment_year ASC, enrollment_semester ASC";
                            $query_data_enroll = mysqli_query($conn, $sql_data_enroll);
                            ?>
                            <div class="registration-text">
                                <div class="text-container">
                                    รายวิชาที่ลงทะเบียนในปี <?php echo $i;?> เทอม <?php echo $j;?>
                                </div>
                            </div>
                            <table class="course-table">
                                <thead>
                                    <tr>
                                        <th>รหัสวิชา</th>
                                        <th>ชื่อวิชา</th>
                                        <th>หน่วยกิต</th>
                                        <th>ลบวิชาที่ทะเบียน</th>
                                    </tr>
                                </thead>
                            <?php
                            $total = 0;
                            while($result_enroll = mysqli_fetch_array($query_data_enroll)){
                                $enroll_course_id = $result_enroll['enrollment_course_id'];
                                $sql = "SELECT * FROM course WHERE course_id = $enroll_course_id";
                                $query = mysqli_query($conn, $sql);
                                $result = mysqli_fetch_array($query);
                                ?>
                            <tbody>
                                <tr>
                                    <td><?php echo $result['course_id'];?></td>
                                    <td><?php echo $result['course_name'];?></td>
                                    <td><?php echo $result['course_credit'];?></td>
                                    <td><a href="?del=<?php echo $result['course_id'];?>"class="withdraw-button">ลบ</a>
                                    </td>
                                </tr>
                            </tbody>
                                <?php
                            }
                        ?>
                        </table><br><br>
                        <?php
                        }
                        else if($i < $max_year){
                            $sql_data_enroll = "SELECT * FROM enrollment WHERE enrollment_student_id = $student_id AND enrollment_year = $i AND enrollment_semester = $j ORDER BY enrollment_year ASC, enrollment_semester ASC";
                            $query_data_enroll = mysqli_query($conn, $sql_data_enroll);
                            ?>
                            <div class="registration-text">
                                <div class="text-container">
                                    รายวิชาที่ลงทะเบียนในปี <?php echo $i;?> เทอม <?php echo $j;?>
                                </div>
                            </div>
                            <table class="course-table">
                                <thead>
                                    <tr>
                                        <th>รหัสวิชา</th>
                                        <th>ชื่อวิชา</th>
                                        <th>หน่วยกิต</th>
                                        <th>ลบวิชาที่ทะเบียน</th>
                                    </tr>
                                </thead>
                            <?php
                            $total = 0;
                            while($result_enroll = mysqli_fetch_array($query_data_enroll)){
                                $enroll_course_id = $result_enroll['enrollment_course_id'];
                                $sql = "SELECT * FROM course WHERE course_id = $enroll_course_id";
                                $query = mysqli_query($conn, $sql);
                                $result = mysqli_fetch_array($query);
                                ?>
                            <tbody>
                                <tr>
                                    <td><?php echo $result['course_id'];?></td>
                                    <td><?php echo $result['course_name'];?></td>
                                    <td><?php echo $result['course_credit'];?></td>
                                    <td><a href="?del=<?php echo $result['course_id'];?>"class="withdraw-button">ลบ</a>
                                    </td>
                                </tr>
                            </tbody>
                                <?php
                            }
                        ?>
                        </table><br><br>
                        <?php
                        }
                        else if($i == $max_year && $j <= $max_semester){
                            $sql_data_enroll = "SELECT * FROM enrollment WHERE enrollment_student_id = $student_id AND enrollment_year = $i AND enrollment_semester = $j ORDER BY enrollment_year ASC, enrollment_semester ASC";
                            $query_data_enroll = mysqli_query($conn, $sql_data_enroll);
                            ?>
                            <div class="registration-text">
                                <div class="text-container">
                                    รายวิชาที่ลงทะเบียนในปี <?php echo $i;?> เทอม <?php echo $j;?>
                                </div>
                            </div>
                            <table class="course-table">
                                <thead>
                                    <tr>
                                        <th>รหัสวิชา</th>
                                        <th>ชื่อวิชา</th>
                                        <th>หน่วยกิต</th>
                                        <th>ลบวิชาที่ทะเบียน</th>
                                    </tr>
                                </thead>
                            <?php
                            $total = 0;
                            while($result_enroll = mysqli_fetch_array($query_data_enroll)){
                                $enroll_course_id = $result_enroll['enrollment_course_id'];
                                $sql = "SELECT * FROM course WHERE course_id = $enroll_course_id";
                                $query = mysqli_query($conn, $sql);
                                $result = mysqli_fetch_array($query);
                                ?>
                            <tbody>
                                <tr>
                                    <td><?php echo $result['course_id'];?></td>
                                    <td><?php echo $result['course_name'];?></td>
                                    <td><?php echo $result['course_credit'];?></td>
                                    <td><a href="?del=<?php echo $result['course_id'];?>"class="withdraw-button">ลบ</a>
                                    </td>
                                </tr>
                            </tbody>
                                <?php
                            }
                        ?>
                        </table><br><br>
                        <?php
                        }
                    }
                }
            ?>
            </form>
    </div>
</body>
</html>