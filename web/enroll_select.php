<?php
  include "connect.php";
  if(empty($_SESSION["username"])){
    header("Location: index.php");
  }
  $_SESSION['year'] = $_GET['year'];
  $_SESSION['semester'] = $_GET['semester'];

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
    <title>Enroll Select</title>
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
            <h2>กรอกข้อมูลรายวิชาที่ลงทะเบียนแล้ว</h2><br><br>
            <form method="POST">
            <?php
                for($i = 1; $i<=$_SESSION['year']; $i++){
                    for($j = 1; $j<=2; $j++){
                        if($i == 1){
                            $sql = "SELECT * FROM course WHERE course_year = $i AND course_semester = $j ORDER BY course_year ASC, course_semester ASC";
                            $query = mysqli_query($conn, $sql);
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
                                        <th>ลงทะเบียนแล้ว</th>
                                    </tr>
                                </thead>
                            <?php
                            while($result = mysqli_fetch_array($query)){
                                ?>
                            <tbody>
                                <tr>
                                    <td><?php echo $result['course_id'];?></td>
                                    <td><?php echo $result['course_name'];?></td>
                                    <td><?php echo $result['course_credit'];?></td>
                                    <td><input type="checkbox" name="checkbox[]" value=<?php echo $result['course_id'];?>>
                                    </td>
                                </tr>
                                <?php
                            }
                            for($k = 0; $k < count($_SESSION['all_data_array']); $k++){
                                $new_course_id = $_SESSION['all_data_array'][$k][0];
                                $sql_new_course = "SELECT * FROM course WHERE course_id =$new_course_id AND course_year = $i AND course_semester = $j";
                                $query_new_course = mysqli_query($conn, $sql_new_course);
                                while($result_new_course = mysqli_fetch_array($query_new_course)){
                        ?>         
                                <tr>
                                    <td><?php echo $result_new_course['course_id'];?></td>
                                    <td><?php echo $result_new_course['course_name'];?></td>
                                    <td><?php echo $result_new_course['course_credit'];?></td>
                                    <td><input type="checkbox" name="checkbox[]" value=<?php echo $result_new_course['course_id'];?>>
                                </tr>
                            <?php
                            }}
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                    <td colspan="3">
                                    <select id="new_course_id<?php echo $i,$j;?>">
                                        <option value="" disabled selected hidden>วิชาเพิ่มเติม</option>
                                        <?php
                                            $sql_new = "SELECT * FROM course WHERE course_year = $i AND course_semester = $j AND (course_type_code != '006' AND course_type_code != '004') ORDER BY course_year ASC, course_semester ASC";
                                            $query_new = mysqli_query($conn, $sql_new);
                                            while($result_new=mysqli_fetch_array($query_new)){
                                        ?>
                                        <option value="<?php echo $result_new['course_id'];?>"> <?php echo $result_new['course_id']," ",$result_new['course_name'];?> </option>
                                        <?php
                                            }
                                        ?>
                                    </select>
                                    </td>
                                    <td>
                                        <div class="unit">
                                            <span class= "allunit"><a href="add_course.php?year=<?php echo $i;?>&semester=<?php echo $j;?>&new_course_id="id="add_course_link<?php echo $i,$j;?>">เพิ่มวิชา</a></span>
                                        </div>
                                    </td>
                            </tr>
                        </tfoot>
                        </table><br><br>
                        <?php
                        }
                        else if($i < $_SESSION['year']){
                            $sql = "SELECT * FROM course WHERE course_year = $i AND course_semester = $j AND (course_type_code = '006' OR course_type_code = '004') ORDER BY course_year ASC, course_semester ASC";
                            $query = mysqli_query($conn, $sql);
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
                                        <th>ลงทะเบียนแล้ว</th>
                                    </tr>
                                </thead>
                            <?php
                            while($result = mysqli_fetch_array($query)){
                                ?>
                            <tbody>
                                <tr>
                                    <td><?php echo $result['course_id']?></td>
                                    <td><?php echo $result['course_name']?></td>
                                    <td><?php echo $result['course_credit']?></td>
                                    <td><input type="checkbox" name="checkbox[]" value=<?php echo $result['course_id'];?>>
                                    </td>
                                </tr>
                            </tbody>
                                <?php
                            }
                            for($k = 0; $k < count($_SESSION['all_data_array']); $k++){
                                $new_course_id = $_SESSION['all_data_array'][$k][0];
                                $sql_new_course = "SELECT * FROM course WHERE course_id =$new_course_id AND course_year = $i AND course_semester = $j";
                                $query_new_course = mysqli_query($conn, $sql_new_course);
                                while($result_new_course = mysqli_fetch_array($query_new_course)){
                        ?>         
                                <tr>
                                    <td><?php echo $result_new_course['course_id'];?></td>
                                    <td><?php echo $result_new_course['course_name'];?></td>
                                    <td><?php echo $result_new_course['course_credit'];?></td>
                                    <td><input type="checkbox" name="checkbox[]" value=<?php echo $result_new_course['course_id'];?>>
                                </tr>
                            <?php
                            }}
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                    <td colspan="3">
                                    <select id="new_course_id<?php echo $i,$j;?>">
                                        <option value="" disabled selected hidden>วิชาเพิ่มเติม</option>
                                        <?php
                                            $sql_new = "SELECT * FROM course WHERE course_year = $i AND course_semester = $j AND (course_type_code != '006' AND course_type_code != '004') ORDER BY course_year ASC, course_semester ASC";
                                            $query_new = mysqli_query($conn, $sql_new);
                                            while($result_new=mysqli_fetch_array($query_new)){
                                        ?>
                                        <option value="<?php echo $result_new['course_id'];?>"> <?php echo $result_new['course_id']," ",$result_new['course_name'];?> </option>
                                        <?php
                                            }
                                        ?>
                                    </select>
                                    </td>
                                    <td>
                                        <div class="unit">
                                            <span class= "allunit"><a href="add_course.php?year=<?php echo $i;?>&semester=<?php echo $j;?>&new_course_id="id="add_course_link<?php echo $i,$j;?>">เพิ่มวิชา</a></span>
                                        </div>
                                    </td>
                            </tr>
                        </tfoot>
                        </table><br><br>
                        <?php
                        }
                        else if($i == $_SESSION['year'] && $j <= $_SESSION['semester']){
                            $sql = "SELECT * FROM course WHERE course_year = $i AND course_semester = $j AND (course_type_code = '006' OR course_type_code = '004') ORDER BY course_year ASC, course_semester ASC";
                            $query = mysqli_query($conn, $sql);
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
                                        <th>ลงทะเบียนแล้ว</th>
                                    </tr>
                                </thead>
                            <?php
                            while($result = mysqli_fetch_array($query)){
                                ?>
                            <tbody>
                                <tr>
                                    <td><?php echo $result['course_id']?></td>
                                    <td><?php echo $result['course_name']?></td>
                                    <td><?php echo $result['course_credit']?></td>
                                    <td><input type="checkbox" name="checkbox[]" value=<?php echo $result['course_id'];?>>
                                    </td>
                                </tr>
                            </tbody>
                                <?php
                            }
                            for($k = 0; $k < count($_SESSION['all_data_array']); $k++){
                                $new_course_id = $_SESSION['all_data_array'][$k][0];
                                $sql_new_course = "SELECT * FROM course WHERE course_id =$new_course_id AND course_year = $i AND course_semester = $j";
                                $query_new_course = mysqli_query($conn, $sql_new_course);
                                while($result_new_course = mysqli_fetch_array($query_new_course)){
                        ?>         
                                <tr>
                                    <td><?php echo $result_new_course['course_id'];?></td>
                                    <td><?php echo $result_new_course['course_name'];?></td>
                                    <td><?php echo $result_new_course['course_credit'];?></td>
                                    <td><input type="checkbox" name="checkbox[]" value=<?php echo $result_new_course['course_id'];?>>
                                </tr>
                            <?php
                            }}
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                    <td colspan="3">
                                    <select id="new_course_id<?php echo $i,$j;?>">
                                        <option value="" disabled selected hidden>วิชาเพิ่มเติม</option>
                                        <?php
                                            $sql_new = "SELECT * FROM course WHERE course_year = $i AND course_semester = $j AND (course_type_code != '006' AND course_type_code != '004') ORDER BY course_year ASC, course_semester ASC";
                                            $query_new = mysqli_query($conn, $sql_new);
                                            while($result_new=mysqli_fetch_array($query_new)){
                                        ?>
                                        <option value="<?php echo $result_new['course_id'];?>"> <?php echo $result_new['course_id']," ",$result_new['course_name'];?> </option>
                                        <?php
                                            }
                                        ?>
                                    </select>
                                    </td>
                                    <td>
                                        <div class="unit">
                                            <span class= "allunit"><a href="add_course.php?year=<?php echo $i;?>&semester=<?php echo $j;?>&new_course_id="id="add_course_link<?php echo $i,$j;?>">เพิ่มวิชา</a></span>
                                        </div>
                                    </td>
                            </tr>
                        </tfoot>
                        </table><br><br>
                        <?php
                        }
                    }
                }
            ?>
            <input type="submit" class="confirm-button" name="enroll" value="ยืนยัน">
            </form>
        </div>
    </div>
    <?php
        if(isset($_POST['enroll'])){
            if (isset($_POST['checkbox'])) {
                foreach ($_POST['checkbox'] as $value) {
                    $sql = "SELECT * FROM course WHERE course_id = $value";
                    $query = mysqli_query($conn, $sql);
                    $data = mysqli_fetch_array($query);
                    
                    $data_course_id = $data['course_id'];
                    $data_student_id = $_SESSION['id'];
                    $data_year = $data['course_year'];
                    $data_semester = $data['course_semester'];
                    $sql_insert = "INSERT INTO enrollment (enrollment_course_id, enrollment_student_id, enrollment_year, enrollment_semester)
                    VALUE (LPAD($data_course_id, 8, '0'), $data_student_id, $data_year, $data_semester)";
                    $query_insert = mysqli_query($conn, $sql_insert);
                    header("Location: drop.php");
                }
            }else{
                ?>
                <script>
                    alert("กรุณาเลือกรายวิชา!!");
                </script>
                <?php
            }
        }
    ?>
<script>
    const selectElement11 = document.getElementById('new_course_id11');
    const addCourseLink11 = document.getElementById('add_course_link11');
    selectElement11.addEventListener('change', () => {
    const selectedValue11 = selectElement11.value;
    const href = addCourseLink11.href;
    addCourseLink11.href = href.replace('&new_course_id=', `&new_course_id=${selectedValue11}`);
    });

    const selectElement12 = document.getElementById('new_course_id12');
    const addCourseLink12 = document.getElementById('add_course_link12');
    selectElement12.addEventListener('change', () => {
    const selectedValue12 = selectElement12.value;
    const href = addCourseLink12.href;
    addCourseLink12.href = href.replace('&new_course_id=', `&new_course_id=${selectedValue12}`);
    });

    const selectElement21 = document.getElementById('new_course_id21');
    const addCourseLink21 = document.getElementById('add_course_link21');
    selectElement21.addEventListener('change', () => {
    const selectedValue21 = selectElement21.value;
    const href = addCourseLink21.href;
    addCourseLink21.href = href.replace('&new_course_id=', `&new_course_id=${selectedValue21}`);
    });

    const selectElement22 = document.getElementById('new_course_id22');
    const addCourseLink22 = document.getElementById('add_course_link22');
    selectElement22.addEventListener('change', () => {
    const selectedValue22 = selectElement22.value;
    const href = addCourseLink22.href;
    addCourseLink22.href = href.replace('&new_course_id=', `&new_course_id=${selectedValue22}`);
    });

    const selectElement31 = document.getElementById('new_course_id31');
    const addCourseLink31 = document.getElementById('add_course_link31');
    selectElement31.addEventListener('change', () => {
    const selectedValue31 = selectElement31.value;
    const href = addCourseLink31.href;
    addCourseLink31.href = href.replace('&new_course_id=', `&new_course_id=${selectedValue31}`);
    });

    const selectElement32 = document.getElementById('new_course_id32');
    const addCourseLink32 = document.getElementById('add_course_link32');
    selectElement32.addEventListener('change', () => {
    const selectedValue32 = selectElement32.value;
    const href = addCourseLink32.href;
    addCourseLink32.href = href.replace('&new_course_id=', `&new_course_id=${selectedValue32}`);
    });
</script>
</body>
</html>