<?php

  include_once("../.././functions.php"); // Include functions.php
  $functions = new Functions(); // Create function object

  $requestId = $_POST['request_id'];

  $cancelRequestAdmin = $functions->cancelRequestAdmin($requestId);

  if ($cancelRequestAdmin) {
    header("Location: index.php");
  }

?>