<?php

  session_start();

  include_once("../.././functions.php"); // Include functions.php
  $functions = new Functions(); // Create function object

  if (isset($_SESSION['user_id'])) {
    $userId = $_SESSION['user_id'];
  }

	$fetchRequestUserId = $functions->fetchRequestUserId($userId);
  while($row = mysqli_fetch_array($fetchRequestUserId)) {

    $works = $row['all_work'];
    $array = explode("," , $works);

    echo $array['2'];

  }


?>