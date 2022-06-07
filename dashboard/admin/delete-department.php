<?php

  include_once("../.././functions.php"); // Include functions.php
  $functions = new Functions(); // Create function object

  $departmentId = $_GET['department_id'];

  $deleteDepartment = $functions->deleteDepartment($departmentId);

  if ($deleteDepartment) {
    header("Location: department.php");
  }

?>