<?php

  define('DB_SERVER','localhost');
  define('DB_USERNAME','root');
  define('DB_PASSWORD','');
  define('DB_NAME','jrms');

  $errors = array();
  $errorSuccess = array();
  $errorInfo = array();

  class Functions {

    // DATABASE CONNECTION
    function __construct() {
      $conn = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_NAME);
      $this->dbh = $conn;
      if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }
      $_SESSION['conn'] = $conn;
    }

    function signIn($username, $password) {
      $result = mysqli_query($this->dbh, "SELECT * FROM users WHERE username = '$username' AND password = '$password'");
      return $result;
    }

    function fetchRequestFormUserId($userId) {
      $result = mysqli_query($this->dbh, "SELECT * FROM request_form WHERE requisitioner_id = '$userId'");
      return $result;
    }

    function requestForm($requisitionerId, $workOrderNum, $location, $space, $desc, $priority, $requestor, $requestedOn, $requestedCompletion) {
      $result = mysqli_query($this->dbh, "INSERT INTO request_form (requisitioner_id, work_order_num, location, space, description, priority, requestor, requested_on, requested_completion) VALUES ('$requisitionerId', '$workOrderNum', '$location', '$space', '$desc', '$priority', '$requestor', '$requestedOn', '$requestedCompletion')");
      return $result;
    }

  }

?>