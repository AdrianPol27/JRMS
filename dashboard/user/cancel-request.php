<?php

  include_once("../.././functions.php"); // Include functions.php
  $functions = new Functions(); // Create function object

  $requestedBy = $_POST['requested_by'];
  $file = $_POST['file'];

  $cancelRequest = $functions->cancelRequest($requestedBy);

  if ($cancelRequest) {
    unlink($file); // DELETE FILE FROM FOLDER
    header("Location: work-request.php");
  }

?>