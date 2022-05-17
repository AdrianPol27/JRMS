<?php

  include_once("../.././functions.php"); // Include functions.php
  $functions = new Functions(); // Create function object

  $requestId = $_POST['request_id'];

  $cancelRequest = $functions->cancelRequest($requestId);

  if ($cancelRequest) {
    header("Location: index.php");
  }

?>