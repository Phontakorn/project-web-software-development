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
                <li><a href="drop.php">ลบรายวิชา</a></li>
                <li><a href="registration_plan.php" class="active">แผนการลงทะเบียน</a></li>
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
        <h2>แผนการลงทะเบียนตามหลักสูตร</h2><br><br>
        <div class="registration-text">
            <div class="text-container">
                รายวิชาตามหลักสูตรในปี 1 เทอม 1
            </div>
        </div>
        <table class="course-table">
            <thead>
                <tr>
                    <th>รหัสวิชา</th>
                    <th>ชื่อวิชา</th>
                    <th>หน่วยกิต</th>
                    <th>สถานะการลงทะเบียน</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>01076031</td>
                    <td>CALCULUS</td>
                    <td>3(3-0-6)</td>
                    <td>
                        <?php 
                        $sql = "SELECT * FROM enrollment WHERE enrollment_course_id = '01076031' AND enrollment_student_id = $student_id";
                        $query = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($query) > 0) {
                            ?><input type="checkbox" id="myCheckbox" disabled checked><?php
                          } else {
                            ?><input type="checkbox" id="myCheckbox" disabled><?php
                          }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>01076103</td>
                    <td>PROGRAMMING FUNDAMENTAL</td>
                    <td>2(2-0-4)</td>
                    <td>
                        <?php 
                        $sql = "SELECT * FROM enrollment WHERE enrollment_course_id = '01076103'AND enrollment_student_id = $student_id";
                        $query = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($query) > 0) {
                            ?><input type="checkbox" id="myCheckbox" disabled checked><?php
                          } else {
                            ?><input type="checkbox" id="myCheckbox" disabled><?php
                          }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>01076104</td>
                    <td>PROGRAMMING PROJECT</td>
                    <td>1(0-3-2)</td>
                    <td>
                        <?php 
                        $sql = "SELECT * FROM enrollment WHERE enrollment_course_id = '01076104'AND enrollment_student_id = $student_id";
                        $query = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($query) > 0) {
                            ?><input type="checkbox" id="myCheckbox" disabled checked><?php
                          } else {
                            ?><input type="checkbox" id="myCheckbox" disabled><?php
                          }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>01076112</td>
                    <td>DIGITAL SYSTEM FUNDAMENTALS</td>
                    <td>3(3-0-6)</td>
                    <td>
                        <?php 
                        $sql = "SELECT * FROM enrollment WHERE enrollment_course_id = '01076112'AND enrollment_student_id = $student_id";
                        $query = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($query) > 0) {
                            ?><input type="checkbox" id="myCheckbox" disabled checked><?php
                          } else {
                            ?><input type="checkbox" id="myCheckbox" disabled><?php
                          }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>01076113</td>
                    <td>DIGITAL SYSTEM FUNDAMENTALS IN PRACTICE</td>
                    <td>1(0-3-2)</td>
                    <td>
                        <?php 
                        $sql = "SELECT * FROM enrollment WHERE enrollment_course_id = '01076113'AND enrollment_student_id = $student_id";
                        $query = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($query) > 0) {
                            ?><input type="checkbox" id="myCheckbox" disabled checked><?php
                          } else {
                            ?><input type="checkbox" id="myCheckbox" disabled><?php
                          }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>01076118</td>
                    <td>SYSTEM PLATFORM ADMINISTRATION</td>
                    <td>3(3-0-6)</td>
                    <td>
                        <?php 
                        $sql = "SELECT * FROM enrollment WHERE enrollment_course_id = '01076118'AND enrollment_student_id = $student_id";
                        $query = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($query) > 0) {
                            ?><input type="checkbox" id="myCheckbox" disabled checked><?php
                          } else {
                            ?><input type="checkbox" id="myCheckbox" disabled><?php
                          }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>90641001</td>
                    <td>CHARM SCHOOL</td>
                    <td>2(1-2-3)</td>
                    <td>
                        <?php 
                        $sql = "SELECT * FROM enrollment WHERE enrollment_course_id = '90641001'AND enrollment_student_id = $student_id";
                        $query = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($query) > 0) {
                            ?><input type="checkbox" id="myCheckbox" disabled checked><?php
                          } else {
                            ?><input type="checkbox" id="myCheckbox" disabled><?php
                          }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>90641003</td>
                    <td>SPORTS AND RECREATIONAL ACTIVITIES</td>
                    <td>1(0-3-2)</td>
                    <td>
                        <?php 
                        $sql = "SELECT * FROM enrollment WHERE enrollment_course_id = '90641003'AND enrollment_student_id = $student_id";
                        $query = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($query) > 0) {
                            ?><input type="checkbox" id="myCheckbox" disabled checked><?php
                          } else {
                            ?><input type="checkbox" id="myCheckbox" disabled><?php
                          }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>90644007</td>
                    <td>FOUNDATION ENGLISH 1</td>
                    <td>3(3-0-6)</td>
                    <td>
                        <?php 
                        $sql = "SELECT * FROM enrollment WHERE enrollment_course_id = '90644007'AND enrollment_student_id = $student_id";
                        $query = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($query) > 0) {
                            ?><input type="checkbox" id="myCheckbox" disabled checked><?php
                          } else {
                            ?><input type="checkbox" id="myCheckbox" disabled><?php
                          }
                        ?>
                    </td>
                </tr>
            </tbody>
        </table><br><br>
        <div class="registration-text">
            <div class="text-container">
                รายวิชาตามหลักสูตรในปี 1 เทอม 2
            </div>
        </div>
        <table class="course-table">
            <thead>
                <tr>
                    <th>รหัสวิชา</th>
                    <th>ชื่อวิชา</th>
                    <th>หน่วยกิต</th>
                    <th>สถานะการลงทะเบียน</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>01076105</td>
                    <td>OBJECT ORIENTED PROGRAMMING</td>
                    <td>2(2-0-4)</td>
                    <td>
                        <?php 
                        $sql = "SELECT * FROM enrollment WHERE enrollment_course_id = '01076105'AND enrollment_student_id = $student_id";
                        $query = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($query) > 0) {
                            ?><input type="checkbox" id="myCheckbox" disabled checked><?php
                          } else {
                            ?><input type="checkbox" id="myCheckbox" disabled><?php
                          }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>01076106</td>
                    <td>OBJECT ORIENTED PROGRAMMING PROJECT</td>
                    <td>1(0-3-2)</td>
                    <td>
                        <?php 
                        $sql = "SELECT * FROM enrollment WHERE enrollment_course_id = '01076106'AND enrollment_student_id = $student_id";
                        $query = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($query) > 0) {
                            ?><input type="checkbox" id="myCheckbox" disabled checked><?php
                          } else {
                            ?><input type="checkbox" id="myCheckbox" disabled><?php
                          }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>01076114</td>
                    <td>COMPUTER ORGANIZATION AND ARCHITECTURE</td>
                    <td>3(3-0-6)</td>
                    <td>
                        <?php 
                        $sql = "SELECT * FROM enrollment WHERE enrollment_course_id = '01076114'AND enrollment_student_id = $student_id";
                        $query = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($query) > 0) {
                            ?><input type="checkbox" id="myCheckbox" disabled checked><?php
                          } else {
                            ?><input type="checkbox" id="myCheckbox" disabled><?php
                          }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>01076115</td>
                    <td>COMPUTER ORGANIZATION IN PRACTICE</td>
                    <td>1(0-3-2)</td>
                    <td>
                        <?php 
                        $sql = "SELECT * FROM enrollment WHERE enrollment_course_id = '01076115'AND enrollment_student_id = $student_id";
                        $query = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($query) > 0) {
                            ?><input type="checkbox" id="myCheckbox" disabled checked><?php
                          } else {
                            ?><input type="checkbox" id="myCheckbox" disabled><?php
                          }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>01076116</td>
                    <td>COMPUTER NETWORKS</td>
                    <td>3(3-0-6)</td>
                    <td>
                        <?php 
                        $sql = "SELECT * FROM enrollment WHERE enrollment_course_id = '01076116'AND enrollment_student_id = $student_id";
                        $query = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($query) > 0) {
                            ?><input type="checkbox" id="myCheckbox" disabled checked><?php
                          } else {
                            ?><input type="checkbox" id="myCheckbox" disabled><?php
                          }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>01076117</td>
                    <td>COMPUTER NETWORKS IN PRACTICE</td>
                    <td>1(0-3-2)</td>
                    <td>
                        <?php 
                        $sql = "SELECT * FROM enrollment WHERE enrollment_course_id = '01076117'AND enrollment_student_id = $student_id";
                        $query = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($query) > 0) {
                            ?><input type="checkbox" id="myCheckbox" disabled checked><?php
                          } else {
                            ?><input type="checkbox" id="myCheckbox" disabled><?php
                          }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>01076043</td>
                    <td>INTRODUCTION TO CLOUD ARCHITECTURE</td>
                    <td>2(2-0-4)</td>
                    <td>
                        <?php 
                        $sql = "SELECT * FROM enrollment WHERE enrollment_course_id = '01076043'AND enrollment_student_id = $student_id";
                        $query = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($query) > 0) {
                            ?><input type="checkbox" id="myCheckbox" disabled checked><?php
                          } else {
                            ?><input type="checkbox" id="myCheckbox" disabled><?php
                          }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>01076044</td>
                    <td>INTRODUCTION TO CLOUD ARCHITECTURE IN PRACTICE</td>
                    <td>1(0-3-2)</td>
                    <td>
                        <?php 
                        $sql = "SELECT * FROM enrollment WHERE enrollment_course_id = '01076044'AND enrollment_student_id = $student_id";
                        $query = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($query) > 0) {
                            ?><input type="checkbox" id="myCheckbox" disabled checked><?php
                          } else {
                            ?><input type="checkbox" id="myCheckbox" disabled><?php
                          }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>90644008</td>
                    <td>FOUNDATION ENGLISH 2</td>
                    <td>3(3-0-6)</td>
                    <td>
                        <?php 
                        $sql = "SELECT * FROM enrollment WHERE enrollment_course_id = '90644008'AND enrollment_student_id = $student_id";
                        $query = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($query) > 0) {
                            ?><input type="checkbox" id="myCheckbox" disabled checked><?php
                          } else {
                            ?><input type="checkbox" id="myCheckbox" disabled><?php
                          }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>90641002</td>
                    <td>DIGITAL INTELLIGENCE QUOTIENT</td>
                    <td>3(3-0-6)</td>
                    <td>
                        <?php 
                        $sql = "SELECT * FROM enrollment WHERE enrollment_course_id = '90641002'AND enrollment_student_id = $student_id";
                        $query = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($query) > 0) {
                            ?><input type="checkbox" id="myCheckbox" disabled checked><?php
                          } else {
                            ?><input type="checkbox" id="myCheckbox" disabled><?php
                          }
                        ?>
                    </td>
                </tr>
            </tbody>
        </table><br><br>
        <div class="registration-text">
            <div class="text-container">
                รรายวิชาตามหลักสูตรในปี 2 เทอม 1
            </div>
        </div>
        <table class="course-table">
            <thead>
                <tr>
                    <th>รหัสวิชา</th>
                    <th>ชื่อวิชา</th>
                    <th>หน่วยกิต</th>
                    <th>สถานะการลงทะเบียน</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>01076109</td>
                    <td>OBJECT ORIENTED DATA STRUCTURES</td>
                    <td>3(3-0-6)</td>
                    <td>
                        <?php 
                        $sql = "SELECT * FROM enrollment WHERE enrollment_course_id = '01076109'AND enrollment_student_id = $student_id";
                        $query = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($query) > 0) {
                            ?><input type="checkbox" id="myCheckbox" disabled checked><?php
                          } else {
                            ?><input type="checkbox" id="myCheckbox" disabled><?php
                          }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>01076110</td>
                    <td>OBJECT ORIENTED DATA STRUCTURES PROJECT</td>
                    <td>1(0-3-2)</td>
                    <td>
                        <?php 
                        $sql = "SELECT * FROM enrollment WHERE enrollment_course_id = '01076110'AND enrollment_student_id = $student_id";
                        $query = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($query) > 0) {
                            ?><input type="checkbox" id="myCheckbox" disabled checked><?php
                          } else {
                            ?><input type="checkbox" id="myCheckbox" disabled><?php
                          }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>01076011</td>
                    <td>OPERATING SYSTEMS</td>
                    <td>3(3-0-6)</td>
                    <td>
                        <?php 
                        $sql = "SELECT * FROM enrollment WHERE enrollment_course_id = '01076011'AND enrollment_student_id = $student_id";
                        $query = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($query) > 0) {
                            ?><input type="checkbox" id="myCheckbox" disabled checked><?php
                          } else {
                            ?><input type="checkbox" id="myCheckbox" disabled><?php
                          }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>01076119</td>
                    <td>WEB APPLICATION DEVELOPMENT</td>
                    <td>3(3-0-6)</td>
                    <td>
                        <?php 
                        $sql = "SELECT * FROM enrollment WHERE enrollment_course_id = '01076119'AND enrollment_student_id = $student_id";
                        $query = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($query) > 0) {
                            ?><input type="checkbox" id="myCheckbox" disabled checked><?php
                          } else {
                            ?><input type="checkbox" id="myCheckbox" disabled><?php
                          }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>01076120</td>
                    <td>WEB APPLICATION DEVELOPMENT PROJECT</td>
                    <td>1(0-3-2)</td>
                    <td>
                        <?php 
                        $sql = "SELECT * FROM enrollment WHERE enrollment_course_id = '01076120'AND enrollment_student_id = $student_id";
                        $query = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($query) > 0) {
                            ?><input type="checkbox" id="myCheckbox" disabled checked><?php
                          } else {
                            ?><input type="checkbox" id="myCheckbox" disabled><?php
                          }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>01076040</td>
                    <td>INTERNETWORKING STANDARDS AND TECHNOLOGIES</td>
                    <td>3(3-0-6)</td>
                    <td>
                        <?php 
                        $sql = "SELECT * FROM enrollment WHERE enrollment_course_id = '01076040'AND enrollment_student_id = $student_id";
                        $query = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($query) > 0) {
                            ?><input type="checkbox" id="myCheckbox" disabled checked><?php
                          } else {
                            ?><input type="checkbox" id="myCheckbox" disabled><?php
                          }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>01076041</td>
                    <td>INTERNETWORKING STANDARDS AND TECHNOLOGIES IN 
                        PRACTICE</td>
                    <td>1(0-3-2)</td>
                    <td>
                        <?php 
                        $sql = "SELECT * FROM enrollment WHERE enrollment_course_id = '01076041'AND enrollment_student_id = $student_id";
                        $query = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($query) > 0) {
                            ?><input type="checkbox" id="myCheckbox" disabled checked><?php
                          } else {
                            ?><input type="checkbox" id="myCheckbox" disabled><?php
                          }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>9064XXXX</td>
                    <td>GENERAL EDUCATION ELECTIVE</td>
                    <td>3(3-0-6)</td>
                    <td>
                        <?php 
                        $sql = "SELECT * FROM enrollment WHERE enrollment_course_id LIKE '9064%' AND enrollment_student_id = $student_id AND enrollment_year = 2 AND enrollment_semester = 1";
                        $query = mysqli_query($conn, $sql);
                        if ($result = mysqli_fetch_array($query)){
                            $_SESSION['gen-1'] = $result['enrollment_course_id'];
                        }else{
                            $_SESSION['gen-1'] = 0;
                        }
                        if (mysqli_num_rows($query) > 0) {
                            ?><input type="checkbox" id="myCheckbox" disabled checked><?php
                          } else {
                            ?><input type="checkbox" id="myCheckbox" disabled><?php
                          }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>9064XXXX</td>
                    <td>GENERAL EDUCATION ELECTIVE</td>
                    <td>3(3-0-6)</td>
                    <td>
                        <?php
                        $gen1 = $_SESSION['gen-1'];
                        $sql = "SELECT * FROM enrollment WHERE enrollment_course_id LIKE '9064%' AND enrollment_student_id = $student_id AND enrollment_year = 2 AND enrollment_semester = 1 AND enrollment_course_id != $gen1";
                        $query = mysqli_query($conn, $sql);
                        if ($result = mysqli_fetch_array($query)){
                            $_SESSION['gen-2'] = $result['enrollment_course_id'];
                        }else{
                            $_SESSION['gen-2'] = 0;
                        }
                        if (mysqli_num_rows($query) > 0) {
                            ?><input type="checkbox" id="myCheckbox" disabled checked><?php
                          } else {
                            ?><input type="checkbox" id="myCheckbox" disabled><?php
                          }
                        ?>
                    </td>
                </tr>
            </tbody>
        </table><br><br>
        <div class="registration-text">
            <div class="text-container">
                รายวิชาตามหลักสูตรในปี 2 เทอม 2
            </div>
        </div>
        <table class="course-table">
            <thead>
                <tr>
                    <th>รหัสวิชา</th>
                    <th>ชื่อวิชา</th>
                    <th>หน่วยกิต</th>
                    <th>สถานะการลงทะเบียน</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>01076013</td>
                    <td>THEORY OF COMPUTATION</td>
                    <td>3(3-0-6)</td>
                    <td>
                        <?php 
                        $sql = "SELECT * FROM enrollment WHERE enrollment_course_id = '01076013'AND enrollment_student_id = $student_id";
                        $query = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($query) > 0) {
                            ?><input type="checkbox" id="myCheckbox" disabled checked><?php
                          } else {
                            ?><input type="checkbox" id="myCheckbox" disabled><?php
                          }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>01076263</td>
                    <td>DATABASE SYSTEMS</td>
                    <td>3(3-0-6)</td>
                    <td>
                        <?php 
                        $sql = "SELECT * FROM enrollment WHERE enrollment_course_id = '01076263'AND enrollment_student_id = $student_id";
                        $query = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($query) > 0) {
                            ?><input type="checkbox" id="myCheckbox" disabled checked><?php
                          } else {
                            ?><input type="checkbox" id="myCheckbox" disabled><?php
                          }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>01076034</td>
                    <td>PRINCIPLES OF SOFTWARE DEVELOPMENT PROCESS</td>
                    <td>3(3-0-6)</td>
                    <td>
                        <?php 
                        $sql = "SELECT * FROM enrollment WHERE enrollment_course_id = '01076034'AND enrollment_student_id = $student_id";
                        $query = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($query) > 0) {
                            ?><input type="checkbox" id="myCheckbox" disabled checked><?php
                          } else {
                            ?><input type="checkbox" id="myCheckbox" disabled><?php
                          }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>01076050</td>
                    <td>MICROCONTROLLER APPLICATION AND DEVELOPMENT</td>
                    <td>3(3-0-6)</td>
                    <td>
                        <?php 
                        $sql = "SELECT * FROM enrollment WHERE enrollment_course_id = '01076050'AND enrollment_student_id = $student_id";
                        $query = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($query) > 0) {
                            ?><input type="checkbox" id="myCheckbox" disabled checked><?php
                          } else {
                            ?><input type="checkbox" id="myCheckbox" disabled><?php
                          }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>01076051</td>
                    <td>MICROCONTROLLER PROJECT</td>
                    <td>1(0-3-2)</td>
                    <td>
                        <?php 
                        $sql = "SELECT * FROM enrollment WHERE enrollment_course_id = '01076051' AND enrollment_student_id = $student_id";
                        $query = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($query) > 0) {
                            ?><input type="checkbox" id="myCheckbox" disabled checked><?php
                          } else {
                            ?><input type="checkbox" id="myCheckbox" disabled><?php
                          }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>01076016</td>
                    <td>COMPUTER ENGINEERING PROJECT PREPARATION</td>
                    <td>2(1-2-3)</td>
                    <td>
                        <?php 
                        $sql = "SELECT * FROM enrollment WHERE enrollment_course_id = '01076016' AND enrollment_student_id = $student_id";
                        $query = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($query) > 0) {
                            ?><input type="checkbox" id="myCheckbox" disabled checked><?php
                          } else {
                            ?><input type="checkbox" id="myCheckbox" disabled><?php
                          }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>9064XXXX</td>
                    <td>GENERAL EDUCATION ELECTIVE</td>
                    <td>3(3-0-6)</td>
                    <td>
                    <?php 
                        $sql = "SELECT * FROM enrollment WHERE enrollment_course_id LIKE '9064%' AND enrollment_student_id = $student_id AND enrollment_year = 2 AND enrollment_semester = 2";
                        $query = mysqli_query($conn, $sql);
                        if ($result = mysqli_fetch_array($query)){
                            $_SESSION['gen-3'] = $result['enrollment_course_id'];
                        }
                        if (mysqli_num_rows($query) > 0) {
                            ?><input type="checkbox" id="myCheckbox" disabled checked><?php
                          } else {
                            ?><input type="checkbox" id="myCheckbox" disabled><?php
                          }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>9064XXXX</td>
                    <td>GENERAL EDUCATION ELECTIVE</td>
                    <td>3(3-0-6)</td>
                    <td>
                    <?php
                        $gen3 = $_SESSION['gen-3'];
                        $sql = "SELECT * FROM enrollment WHERE enrollment_course_id LIKE '9064%' AND enrollment_student_id = $student_id AND enrollment_year = 2 AND enrollment_semester = 2 AND enrollment_course_id != $gen3";
                        $query = mysqli_query($conn, $sql);
                        if ($result = mysqli_fetch_array($query)){
                            $_SESSION['gen-4'] = $result['enrollment_course_id'];
                        }else{
                            $_SESSION['gen-4'] = 0;
                        }
                        if (mysqli_num_rows($query) > 0) {
                            ?><input type="checkbox" id="myCheckbox" disabled checked><?php
                          } else {
                            ?><input type="checkbox" id="myCheckbox" disabled><?php
                          }
                        ?>
                    </td>
                </tr>
            </tbody>
        </table><br><br>
        <div class="registration-text">
            <div class="text-container">
                รายวิชาตามหลักสูตรในปี 3 เทอม 1
            </div>
        </div>
        <table class="course-table">
            <thead>
                <tr>
                    <th>รหัสวิชา</th>
                    <th>ชื่อวิชา</th>
                    <th>หน่วยกิต</th>
                    <th>สถานะการลงทะเบียน</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>01076311</td>
                    <td>PROJECT 1</td>
                    <td>3(0-9-0)</td>
                    <td>
                        <?php 
                        $sql = "SELECT * FROM enrollment WHERE enrollment_course_id = '01076311'AND enrollment_student_id = $student_id";
                        $query = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($query) > 0) {
                            ?><input type="checkbox" id="myCheckbox" disabled checked><?php
                          } else {
                            ?><input type="checkbox" id="myCheckbox" disabled><?php
                          }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>01076035</td>
                    <td>SOFTWARE DEVELOPMENT PROCESS IN PRACTICE</td>
                    <td>3(3-0-6)</td>
                    <td>
                        <?php 
                        $sql = "SELECT * FROM enrollment WHERE enrollment_course_id = '01076035'AND enrollment_student_id = $student_id";
                        $query = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($query) > 0) {
                            ?><input type="checkbox" id="myCheckbox" disabled checked><?php
                          } else {
                            ?><input type="checkbox" id="myCheckbox" disabled><?php
                          }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>0107XXXX</td>
                    <td>ELECTIVE IN COMPUTER ENGINEERING</td>
                    <td>3(3-0-6)</td>
                    <td>
                    <?php 
                        $sql = "SELECT * FROM enrollment WHERE enrollment_course_id LIKE '0107%' AND enrollment_student_id = $student_id AND enrollment_year = 3 AND enrollment_semester = 1";
                        $query = mysqli_query($conn, $sql);
                        if ($result = mysqli_fetch_array($query)){
                            $_SESSION['gen-5'] = $result['enrollment_course_id'];
                        }else{
                            $_SESSION['gen-5'] = 0;
                        }
                        if (mysqli_num_rows($query) > 0) {
                            ?><input type="checkbox" id="myCheckbox" disabled checked><?php
                          } else {
                            ?><input type="checkbox" id="myCheckbox" disabled><?php
                          }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>0107XXXX</td>
                    <td>ELECTIVE IN COMPUTER ENGINEERING</td>
                    <td>3(3-0-6)</td>
                    <td>
                        <?php
                        $gen5 = $_SESSION['gen-5'];
                        $sql = "SELECT * FROM enrollment WHERE enrollment_course_id LIKE '0107%' AND enrollment_student_id = $student_id AND enrollment_year = 3 AND enrollment_semester = 1 AND enrollment_course_id = $gen5";
                        $query = mysqli_query($conn, $sql);
                        if ($result = mysqli_fetch_array($query)){
                            $_SESSION['gen-6'] = $result['enrollment_course_id'];
                        }else{
                            $_SESSION['gen-6'] = 0; 
                        }
                        if (mysqli_num_rows($query) > 0) {
                            ?><input type="checkbox" id="myCheckbox" disabled checked><?php
                          } else {
                            ?><input type="checkbox" id="myCheckbox" disabled><?php
                          }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>9064XXXX</td>
                    <td>GENERAL EDUCATION ELECTIVE</td>
                    <td>3(3-0-6)</td>
                    <td>
                    <?php 
                        $sql = "SELECT * FROM enrollment WHERE enrollment_course_id LIKE '9064%' AND enrollment_student_id = $student_id AND enrollment_year = 3 AND enrollment_semester = 1";
                        $query = mysqli_query($conn, $sql);
                        if ($result = mysqli_fetch_array($query)){
                            $_SESSION['gen-7'] = $result['enrollment_course_id'];
                        }else{
                            $_SESSION['gen-7'] = 0;
                        }
                        if (mysqli_num_rows($query) > 0) {
                            ?><input type="checkbox" id="myCheckbox" disabled checked><?php
                          } else {
                            ?><input type="checkbox" id="myCheckbox" disabled><?php
                          }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>XXXXXXXX</td>
                    <td>FREE ELECTIVE</td>
                    <td>3(X-X-X)</td>
                    <td>
                    <?php
                        $sql = "SELECT * FROM enrollment WHERE enrollment_course_id NOT LIKE '0107%' AND enrollment_course_id NOT LIKE '9064%' AND enrollment_student_id = $student_id AND enrollment_year = 3 AND enrollment_semester = 1";
                        $query = mysqli_query($conn, $sql);
                        if ($result = mysqli_fetch_array($query)){
                            $_SESSION['gen-8'] = $result['enrollment_course_id'];
                        }else{
                            $_SESSION['gen-8'] = 0;
                        }
                        if (mysqli_num_rows($query) > 0) {
                            ?><input type="checkbox" id="myCheckbox" disabled checked><?php
                          } else {
                            ?><input type="checkbox" id="myCheckbox" disabled><?php
                          }
                        ?>
                    </td>
                </tr>
            </tbody>
        </table><br><br>
        <div class="registration-text">
            <div class="text-container">
                รายวิชาตามหลักสูตรในปี 3 เทอม 2
            </div>
        </div>
        <table class="course-table">
            <thead>
                <tr>
                    <th>รหัสวิชา</th>
                    <th>ชื่อวิชา</th>
                    <th>หน่วยกิต</th>
                    <th>สถานะการลงทะเบียน</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>01076312</td>
                    <td>PROJECT 2</td>
                    <td>3(0-9-0)</td>
                    <td>
                        <?php 
                        $sql = "SELECT * FROM enrollment WHERE enrollment_course_id = '01076312'AND enrollment_student_id = $student_id";
                        $query = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($query) > 0) {
                            ?><input type="checkbox" id="myCheckbox" disabled checked><?php
                          } else {
                            ?><input type="checkbox" id="myCheckbox" disabled><?php
                          }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>0107XXXX</td>
                    <td>ELECTIVE IN COMPUTER ENGINEERING</td>
                    <td>3(3-0-6)</td>
                    <td>
                    <?php 
                        $sql = "SELECT * FROM enrollment WHERE enrollment_course_id LIKE '0107%' AND enrollment_student_id = $student_id AND enrollment_year = 3 AND enrollment_semester = 2";
                        $query = mysqli_query($conn, $sql);
                        if ($result = mysqli_fetch_array($query)){
                            $_SESSION['gen-9'] = $result['enrollment_course_id'];
                        }else{
                            $_SESSION['gen-9'] = 0;
                        }
                        if (mysqli_num_rows($query) > 0) {
                            ?><input type="checkbox" id="myCheckbox" disabled checked><?php
                          } else {
                            ?><input type="checkbox" id="myCheckbox" disabled><?php
                          }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>0107XXXX</td>
                    <td>ELECTIVE IN COMPUTER ENGINEERING</td>
                    <td>3(3-0-6)</td>
                    <td>
                    <?php 
                        $gen9 = $_SESSION['gen-9'];
                        $sql = "SELECT * FROM enrollment WHERE enrollment_course_id LIKE '0107%' AND enrollment_student_id = $student_id AND enrollment_year = 3 AND enrollment_semester = 2 AND enrollment_course_id != $gen9";
                        $query = mysqli_query($conn, $sql);
                        if ($result = mysqli_fetch_array($query)){
                            $_SESSION['gen-10'] = $result['enrollment_course_id'];
                        }else{
                            $_SESSION['gen-10'] = 0;
                        }
                        if (mysqli_num_rows($query) > 0) {
                            ?><input type="checkbox" id="myCheckbox" disabled checked><?php
                          } else {
                            ?><input type="checkbox" id="myCheckbox" disabled><?php
                          }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>9064XXXX</td>
                    <td>GENERAL EDUCATION ELECTIVE</td>
                    <td>3(3-0-6)</td>
                    <td>
                    <?php 
                        $sql = "SELECT * FROM enrollment WHERE enrollment_course_id LIKE '9064%' AND enrollment_student_id = $student_id AND enrollment_year = 3 AND enrollment_semester = 2";
                        $query = mysqli_query($conn, $sql);
                        if ($result = mysqli_fetch_array($query)){
                            $_SESSION['gen-11'] = $result['enrollment_course_id'];
                        }else{
                            $_SESSION['gen-11'] = 0;
                        }
                        if (mysqli_num_rows($query) > 0) {
                            ?><input type="checkbox" id="myCheckbox" disabled checked><?php
                          } else {
                            ?><input type="checkbox" id="myCheckbox" disabled><?php
                          }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>XXXXXXXX</td>
                    <td>FREE ELECTIVE</td>
                    <td>3(X-X-X)</td>
                    <td>
                    <?php
                        $sql = "SELECT * FROM enrollment WHERE enrollment_course_id NOT LIKE '0107%' AND enrollment_course_id NOT LIKE '9064%' AND enrollment_student_id = $student_id AND enrollment_year = 3 AND enrollment_semester = 2";
                        $query = mysqli_query($conn, $sql);
                        if ($result = mysqli_fetch_array($query)){
                            $_SESSION['gen-12'] = $result['enrollment_course_id'];
                        }else{
                            $_SESSION['gen-12'] = 0;
                        }
                        if (mysqli_num_rows($query) > 0) {
                            ?><input type="checkbox" id="myCheckbox" disabled checked><?php
                          } else {
                            ?><input type="checkbox" id="myCheckbox" disabled><?php
                          }
                        ?>
                    </td>
                </tr>
            </tbody>
        </table><br>
        <button class="confirm-button" onclick="window.open('https://www.reg.kmitl.ac.th/curriculum/', '_blank');">เว็บไซต์สำนักทะเบียน</button>
    </div>
</body>
</html>