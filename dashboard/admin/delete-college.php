<?php

  include_once("../.././functions.php"); // Include functions.php
  $functions = new Functions(); // Create function object

  $collegeId = $_GET['college_id'];

  $deleteCollege = $functions->deleteCollege($collegeId);

  if ($deleteCollege) {
    header("Location: college.php");
  }

?>