<?php

  include_once("../.././functions.php"); // Include functions.php
  $functions = new Functions(); // Create function object

  $requestId = $_POST['request_id'];
  $file = $_POST['file'];

  $cancelRequest = $functions->cancelRequest($requestId);

  if ($cancelRequest) {
    unlink($file); // DELETE FILE FROM FOLDER
    header("Location: work-request.php");
  }

?>