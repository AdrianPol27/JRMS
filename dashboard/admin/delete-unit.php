<?php

  include_once("../.././functions.php"); // Include functions.php
  $functions = new Functions(); // Create function object

  $unitId = $_GET['unit_id'];

  $deleteUnit = $functions->deleteUnit($unitId);

  if ($deleteUnit) {
    header("Location: unit.php");
  }

?>