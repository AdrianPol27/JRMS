<?php

  include_once("../.././functions.php"); // Include functions.php
  $functions = new Functions(); // Create function object

  $userId = $_GET['user_id'];

  $deleteUser = $functions->deleteUser($userId);

  if ($deleteUser) {
    header("Location: user.php");
  }

?>