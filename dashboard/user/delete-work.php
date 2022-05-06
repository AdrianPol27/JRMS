<?php

  include_once("../.././functions.php"); // Include functions.php
  $functions = new Functions(); // Create function object

  $workId = $_GET['work_id'];

  $deleteWork = $functions->deleteWork($workId);

  if ($deleteWork) {
    header("Location: add-new-request.php");
  }

?>