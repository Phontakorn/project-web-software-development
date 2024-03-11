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

  $sql = "SELECT * FROM enrollment WHERE enrollment_student_id = $student_id";
  $query = mysqli_query($conn, $sql);
  $credit_sum = 0;
  while($result = mysqli_fetch_array($query)){
      $course_id = $result['enrollment_course_id'];
      $sql_data = "SELECT * FROM course WHERE course_id = $course_id";
      $query_data = mysqli_query($conn, $sql_data);
      $result_data = mysqli_fetch_array($query_data);
      $credit_sum += $result_data['course_credit'];
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Plan</title>
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
                <li><a href="drop.php" >ลบรายวิชา</a></li>
                <li><a href="registration_plan.php">แผนการลงทะเบียน</a></li>
                <li><a href="course_group.php" class="active">สรุปการลงทะเบียนตามหลักสูตร</a></li>
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
        <h2>หมวดหมู่รายวิชา</h2><br><br>
        <div class="unit">
            <span class="allunit">หน่วยกิตตามหลักสูตร 114 หน่วยกิต</span>
            <span class="unitnow">หน่วยกิตที่ลงทะเบียนแล้ว <?php echo $credit_sum;?> หน่วยกิต</span>
            <span class="balanceunit">หน่วยกิตคงเหลือ <?php echo 114 - $credit_sum;?> หน่วยกิต</span>
        </div><br><br>
        <div class="registration-text">
            <div class="text-container">
                กลุ่มวิชาภาษา จำนวน 9 หน่วยกิต
            </div>
        </div>
        <table class="course-table">
            <thead>
                <tr>
                    <th>รหัสวิชา</th>
                    <th>ชื่อวิชา</th>
                    <th>หน่วยกิต</th>
                    <th>ชั้นปี</th>
                    <th>เทอม</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $total = 0;
                    $sql = "SELECT * FROM enrollment WHERE enrollment_student_id = $student_id";
                    $query = mysqli_query($conn, $sql);
                    while($result = mysqli_fetch_array($query)){
                        $course_id = $result['enrollment_course_id'];
                        $sql_data = "SELECT * FROM course WHERE course_id = $course_id AND course_type_code = '001'";
                        $query_data = mysqli_query($conn, $sql_data);
                        $result_data = mysqli_fetch_array($query_data);
                        if(mysqli_num_rows($query_data) > 0){
                            $total += $result_data['course_credit'];
                ?>
                    <tr>
                        <td><?php echo $result_data['course_id'];?></td>
                        <td><?php echo $result_data['course_name'];?></td>
                        <td><?php echo $result_data['course_credit'];?></td>
                        <td><?php echo $result_data['course_year'];?></td>
                        <td><?php echo $result_data['course_semester'];?></td>
                    </tr>
                <?php
                    }
                }
            ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3">หน่วยกิตรวม</td>
                    <td><?php echo $total;?></td>
                    <td>
                        <?php 
                            if($total < 9){
                                ?><div class="unit"><span class="balanceunit">หน่วยกิตยังไม่สมบูรณ์</span></div><?php
                            }else{
                                ?><div class="unit"><span class="unitnow">หน่วยกิตครบสมบูรณ์</span></div><?php
                            }
                        ?>
                    </td>
                </tr>
            </tfoot>
        </table><br><br>
        <div class="registration-text">
            <div class="text-container">
                กลุ่มวิชา Gen-Ed พื้นฐาน จำนวน 6 หน่วยกิต
            </div>
        </div>
        <table class="course-table">
            <thead>
                <tr>
                    <th>รหัสวิชา</th>
                    <th>ชื่อวิชา</th>
                    <th>หน่วยกิต</th>
                    <th>ชั้นปี</th>
                    <th>เทอม</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $total = 0;
                    $sql = "SELECT * FROM enrollment WHERE enrollment_student_id = $student_id";
                    $query = mysqli_query($conn, $sql);
                    while($result = mysqli_fetch_array($query)){
                        $course_id = $result['enrollment_course_id'];
                        $sql_data = "SELECT * FROM course WHERE course_id = $course_id AND course_type_code = '002'";
                        $query_data = mysqli_query($conn, $sql_data);
                        $result_data = mysqli_fetch_array($query_data);
                        if(mysqli_num_rows($query_data) > 0){
                            $total += $result_data['course_credit'];
                ?>
                    <tr>
                        <td><?php echo $result_data['course_id'];?></td>
                        <td><?php echo $result_data['course_name'];?></td>
                        <td><?php echo $result_data['course_credit'];?></td>
                        <td><?php echo $result_data['course_year'];?></td>
                        <td><?php echo $result_data['course_semester'];?></td>
                    </tr>
                <?php
                    }
                }
            ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3">หน่วยกิตรวม</td>
                    <td><?php echo $total;?></td>
                    <td>
                        <?php 
                            if($total < 6){
                                ?><div class="unit"><span class="balanceunit">หน่วยกิตยังไม่สมบูรณ์</span></div><?php
                            }else{
                                ?><div class="unit"><span class="unitnow">หน่วยกิตครบสมบูรณ์</span></div><?php
                            }
                        ?>
                    </td>
                </tr>
            </tfoot>
        </table><br><br>
        <div class="registration-text">
            <div class="text-container">
                กลุ่มวิชา Gen-Ed เลือกทั่วไป จำนวน 15 หน่วยกิต
            </div>
        </div>
        <table class="course-table">
            <thead>
                <tr>
                    <th>รหัสวิชา</th>
                    <th>ชื่อวิชา</th>
                    <th>หน่วยกิต</th>
                    <th>ชั้นปี</th>
                    <th>เทอม</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $total = 0;
                    $sql = "SELECT * FROM enrollment WHERE enrollment_student_id = $student_id";
                    $query = mysqli_query($conn, $sql);
                    while($result = mysqli_fetch_array($query)){
                        $course_id = $result['enrollment_course_id'];
                        $sql_data = "SELECT * FROM course WHERE course_id = $course_id AND course_type_code = '003'";
                        $query_data = mysqli_query($conn, $sql_data);
                        $result_data = mysqli_fetch_array($query_data);
                        if(mysqli_num_rows($query_data) > 0){
                            $total += $result_data['course_credit'];
                ?>
                    <tr>
                        <td><?php echo $result_data['course_id'];?></td>
                        <td><?php echo $result_data['course_name'];?></td>
                        <td><?php echo $result_data['course_credit'];?></td>
                        <td><?php echo $result_data['course_year'];?></td>
                        <td><?php echo $result_data['course_semester'];?></td>
                    </tr>
                <?php
                    }
                }
            ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3">หน่วยกิตรวม</td>
                    <td><?php echo $total;?></td>
                    <td>
                        <?php 
                            if($total < 15){
                                ?><div class="unit"><span class="balanceunit">หน่วยกิตยังไม่สมบูรณ์</span></div><?php
                            }else{
                                ?><div class="unit"><span class="unitnow">หน่วยกิตครบสมบูรณ์</span></div><?php
                            }
                        ?>
                    </td>
                </tr>
            </tfoot>
        </table><br><br>
        <div class="registration-text">
            <div class="text-container">
                กลุ่มวิชาวิศวกรรมพื้นฐาน จำนวน 8 หน่วยกิต
            </div>
        </div>
        <table class="course-table">
            <thead>
                <tr>
                    <th>รหัสวิชา</th>
                    <th>ชื่อวิชา</th>
                    <th>หน่วยกิต</th>
                    <th>ชั้นปี</th>
                    <th>เทอม</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $total = 0;
                    $sql = "SELECT * FROM enrollment WHERE enrollment_student_id = $student_id";
                    $query = mysqli_query($conn, $sql);
                    while($result = mysqli_fetch_array($query)){
                        $course_id = $result['enrollment_course_id'];
                        $sql_data = "SELECT * FROM course WHERE course_id = $course_id AND course_type_code = '004'";
                        $query_data = mysqli_query($conn, $sql_data);
                        $result_data = mysqli_fetch_array($query_data);
                        if(mysqli_num_rows($query_data) > 0){
                            $total += $result_data['course_credit'];
                ?>
                    <tr>
                        <td><?php echo $result_data['course_id'];?></td>
                        <td><?php echo $result_data['course_name'];?></td>
                        <td><?php echo $result_data['course_credit'];?></td>
                        <td><?php echo $result_data['course_year'];?></td>
                        <td><?php echo $result_data['course_semester'];?></td>
                    </tr>
                <?php
                    }
                }
            ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3">หน่วยกิตรวม</td>
                    <td><?php echo $total;?></td>
                    <td>
                        <?php 
                            if($total < 8){
                                ?><div class="unit"><span class="balanceunit">หน่วยกิตยังไม่สมบูรณ์</span></div><?php
                            }else{
                                ?><div class="unit"><span class="unitnow">หน่วยกิตครบสมบูรณ์</span></div><?php
                            }
                        ?>
                    </td>
                </tr>
            </tfoot>
        </table><br><br>
        <div class="registration-text">
            <div class="text-container">
                กลุ่มวิชาเสรี จำนวน 6 หน่วยกิต
            </div>
        </div>
        <table class="course-table">
            <thead>
                <tr>
                    <th>รหัสวิชา</th>
                    <th>ชื่อวิชา</th>
                    <th>หน่วยกิต</th>
                    <th>ชั้นปี</th>
                    <th>เทอม</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $total = 0;
                    $sql = "SELECT * FROM enrollment WHERE enrollment_student_id = $student_id";
                    $query = mysqli_query($conn, $sql);
                    while($result = mysqli_fetch_array($query)){
                        $course_id = $result['enrollment_course_id'];
                        $sql_data = "SELECT * FROM course WHERE course_id = $course_id AND course_type_code = '005'";
                        $query_data = mysqli_query($conn, $sql_data);
                        $result_data = mysqli_fetch_array($query_data);
                        if(mysqli_num_rows($query_data) > 0){
                            $total += $result_data['course_credit'];
                ?>
                    <tr>
                        <td><?php echo $result_data['course_id'];?></td>
                        <td><?php echo $result_data['course_name'];?></td>
                        <td><?php echo $result_data['course_credit'];?></td>
                        <td><?php echo $result_data['course_year'];?></td>
                        <td><?php echo $result_data['course_semester'];?></td>
                    </tr>
                <?php
                    }
                }
            ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3">หน่วยกิตรวม</td>
                    <td><?php echo $total;?></td>
                    <td>
                        <?php 
                            if($total < 6){
                                ?><div class="unit"><span class="balanceunit">หน่วยกิตยังไม่สมบูรณ์</span></div><?php
                            }else{
                                ?><div class="unit"><span class="unitnow">หน่วยกิตครบสมบูรณ์</span></div><?php
                            }
                        ?>
                    </td>
                </tr>
            </tfoot>
        </table><br><br>
        <div class="registration-text">
            <div class="text-container">
                กลุ่มวิชาวิศวกรรมคอมพิวเตอร์พื้นฐาน จำนวน 58 หน่วยกิต
            </div>
        </div>
        <table class="course-table">
            <thead>
                <tr>
                    <th>รหัสวิชา</th>
                    <th>ชื่อวิชา</th>
                    <th>หน่วยกิต</th>
                    <th>ชั้นปี</th>
                    <th>เทอม</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $total = 0;
                    $sql = "SELECT * FROM enrollment WHERE enrollment_student_id = $student_id";
                    $query = mysqli_query($conn, $sql);
                    while($result = mysqli_fetch_array($query)){
                        $course_id = $result['enrollment_course_id'];
                        $sql_data = "SELECT * FROM course WHERE course_id = $course_id AND course_type_code = '006'";
                        $query_data = mysqli_query($conn, $sql_data);
                        $result_data = mysqli_fetch_array($query_data);
                        if(mysqli_num_rows($query_data) > 0){
                            $total += $result_data['course_credit'];
                ?>
                    <tr>
                        <td><?php echo $result_data['course_id'];?></td>
                        <td><?php echo $result_data['course_name'];?></td>
                        <td><?php echo $result_data['course_credit'];?></td>
                        <td><?php echo $result_data['course_year'];?></td>
                        <td><?php echo $result_data['course_semester'];?></td>
                    </tr>
                <?php
                    }
                }
            ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3">หน่วยกิตรวม</td>
                    <td><?php echo $total;?></td>
                    <td>
                        <?php 
                            if($total < 58){
                                ?><div class="unit"><span class="balanceunit">หน่วยกิตยังไม่สมบูรณ์</span></div><?php
                            }else{
                                ?><div class="unit"><span class="unitnow">หน่วยกิตครบสมบูรณ์</span></div><?php
                            }
                        ?>
                    </td>
                </tr>
            </tfoot>
        </table><br><br>
        <div class="registration-text">
            <div class="text-container">
                กลุ่มวิชาเลือกเฉพาะสาขา จำนวน 12 หน่วยกิต
            </div>
        </div>
        <table class="course-table">
            <thead>
                <tr>
                    <th>รหัสวิชา</th>
                    <th>ชื่อวิชา</th>
                    <th>หน่วยกิต</th>
                    <th>ชั้นปี</th>
                    <th>เทอม</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $total = 0;
                    $sql = "SELECT * FROM enrollment WHERE enrollment_student_id = $student_id";
                    $query = mysqli_query($conn, $sql);
                    while($result = mysqli_fetch_array($query)){
                        $course_id = $result['enrollment_course_id'];
                        $sql_data = "SELECT * FROM course WHERE course_id = $course_id AND course_type_code = '007'";
                        $query_data = mysqli_query($conn, $sql_data);
                        $result_data = mysqli_fetch_array($query_data);
                        if(mysqli_num_rows($query_data) > 0){
                            $total += $result_data['course_credit'];
                ?>
                    <tr>
                        <td><?php echo $result_data['course_id'];?></td>
                        <td><?php echo $result_data['course_name'];?></td>
                        <td><?php echo $result_data['course_credit'];?></td>
                        <td><?php echo $result_data['course_year'];?></td>
                        <td><?php echo $result_data['course_semester'];?></td>
                    </tr>
                <?php
                    }
                }
            ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3">หน่วยกิตรวม</td>
                    <td><?php echo $total;?></td>
                    <td>
                        <?php 
                            if($total < 12){
                                ?><div class="unit"><span class="balanceunit">หน่วยกิตยังไม่สมบูรณ์</span></div><?php
                            }else{
                                ?><div class="unit"><span class="unitnow">หน่วยกิตครบสมบูรณ์</span></div><?php
                            }
                        ?>
                    </td>
                </tr>
            </tfoot>
        </table><br>
    </div>   
</body>
</html>