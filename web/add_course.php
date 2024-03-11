<?php
 include "connect.php";
 $new_course = array($_GET['new_course_id'], $_GET['year'], $_GET['semester']);
 array_push($_SESSION['all_data_array'], $new_course);
 header("Location: enroll_select.php?course=course1&semester=".$_SESSION['semester']."&year=".$_SESSION['year']."");
?>